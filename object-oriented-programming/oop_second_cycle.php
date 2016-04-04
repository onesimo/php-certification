<?php

/*
Object-Oriented Programming

Declaring a Class
*/
class myClass{
	//Class contents go here 
}

/*
Instantiating an Object
*/

$myClassInstance = new MyClass();

$className = 'myClass';
$myClassInstance = new $className();

/*
Duplicating Objects
*/
$myClassInstance = new MyClass();
$copyInstance = $myClassInstance; /*will reference the same object*/

$myClassInstance = new MyClass();
$cloneClass= clone $myClassInstance; /*copy of an object*/


/*
Listing Class Inheritance: 



class a{

	function test(){
		echo __METHOD__. " called \n";
	}

	function func(){
		echo __METHOD__. " called \n";
	}
}

class b extends a{

	function test(){
		echo __METHOD__. " called \n";
	}
}

class c extends b {
	function test(){
		parent::test();
	}
}

class d extends c{

	function test(){
		b::test();
	}
}

$a = new a();
$b = new b();
$c = new c();
$d = new d();
 
$a->test();//outputs "a::test called"
$b->test();//outputs "b::test called"
$b->func();//outputs "a::func called"
$c->test();//outputs "b::test called"
$d->test();//outputs "b::test called"


Class Methods and Properties
*/

class myClass2{

	function myfunction(){
		echo "i'm here";
	}
	/*reference within a class*/
	function myfunction2(){
		echo $this->myfunction();
	}
}

$obj = new myClass2();
//$obj->myfunction2();

/*
ways to call methods and classes
*/

$method = 'myfunction2';
 //$obj->{$method}(); or $obj->$method();

/*
from PHP5.6 instanciation time access
(new myClass2)->myFunction()

Constructors
 

final class foo{
	function __construct(){
		echo __METHOD__;
	}

	function foo(){
		//PHP 4 style constructor
	}
	
	//Destruct is called at the end of script execution
	
	function __destruct(){
		echo __METHOD__;
	}
}

/*
Magin Methods
__call() nonexistent or inaccessible object  method
__invoke() when a object is used as function $object()
__sleep() intercept serializing of the object
__wakeup() intercept unserializing of the object
... others

Visibility

public -  accessed from any scope
protect - only accessd from within the class and its descendents
private - only accessd from within the class
final - class declared cannot be extended, methods cannot be overridden
*/

class foo{

	public $foo = 'bar';
	protected $baz= 'baz';
	private $qux= 'bingo';

	function __construct(){
		var_dump(get_object_vars($this));
	}
 
	/*
	Destruct is called at the end of script execution
	*/
	 
}
 
class bar extends foo{
	function __construct(){
		var_dump(get_object_vars($this));
	}
}

class baz{
	function __construct(){
		$foo = new foo();
		var_dump(get_object_vars($foo));
	}
}
/*
new foo();
new bar();
new baz();
outputs:
array(3) {
  ["foo"]=>
  string(3) "bar"
  ["baz"]=>
  string(3) "baz"
  ["qux"]=>
  string(5) "bingo"
}
array(2) {
  ["foo"]=>
  string(3) "bar"
  ["baz"]=>
  string(3) "baz"
}
array(3) {
  ["foo"]=>
  string(3) "bar"
  ["baz"]=>
  string(3) "baz"
  ["qux"]=>
  string(5) "bingo"
}
array(1) {
  ["foo"]=>
  string(3) "bar"
}

Declaring and Accessing Properties

*/

class goal{

	public $foo;
	protected $baz;
	private $qux;


	public $var1 = 'Test'; //String
	public $var2= 'baz'; //numeric value
	public $var3= array(1); //array

	/*
	This will not work
	public $created = time();
	

	initializing properties with functions - only do within one of the class's methods
	*/
	public $created;
	public function __construct(){
		$this->created = time();
	}
}

/*
Constants Static Methods and Properties

listing. Static properties
*/
class way{

	static $bar = 'bat';

	public static function baz(){
		echo "hello world";
	}
}

$foo = new way();
/*
$foo->baz();
echo $foo->bar;
//echo $foo::bar;
Notice: Undefined property: way::$bar in D:\xampp\htdocs\php-certification\object-oriented-programming\oop_second_cycle.php on line 246

corret way to call

way::baz();
echo way::$bar;

Dynamic calling

$var = 'bar';
echo way::$$var;

$className='way';
$className::baz();
echo $className::$bar;


$method = 'baz';
way::$method();
way::{$method}();

Self and Late Static Binding
 
class a{

	static function test(){
		self::foo();
		self::bar();
	}

	static function  foo(){
		echo __METHOD__. " called \n";
	}
	static function  bar(){
		echo __METHOD__. " called \n";
	}
}

class b extends a{ }

class c extends a {
	public static function foo(){
		echo __METHOD__. " called \n";
	}


	public static function bar(){
		echo __METHOD__. " called \n";
	}
}

a::test();

a::foo called
a::bar called
 
b::test();
 
a::foo called
a::bar called
 
 c::test();
 
a::foo called
a::bar called
*/


class a{

	static function test(){
		static::foo();
		static::bar();
	}

	static function  foo(){
		echo __METHOD__. " called \n";
	}
	private static function  bar(){
		echo __METHOD__. " called \n";
	}
}

class b extends a{ }

class c extends a {
	public static function foo(){
		echo __METHOD__. " called \n";
	}


	private static function bar(){
		echo __METHOD__. " called \n";
	}
}
 /* 
 a::test();
 b::test();
 c::test();

 a::foo called
a::bar called
a::foo called
a::bar called
c::foo called

Fatal error: Call to private method c::bar() from context 'a' in D:\xampp\htdocs\php-certification\object-oriented-programming\oop_second_cycle.php on line 321


Class Constatnts
*/

class foolish{
	const YOUNG = 'Hello World';
}

//echo foolish::YOUNG;
/*
Interfaces and Abstract Classes
*/

abstract class DataSore_Adapter{
	private $id;

	abstract function insert();
	abstract function update();

	public function save(){
		if(!is_null($this->id)){
			$this->update();
		} else {
			$this->insert();
		}
	}
}

class PDO_DataStoreAdapter extends DataSore_Adapter{

	public function __construct($dsn){

	}

	public function __toString(){
		return  'class PDO_DataStoreAdapter';
	}

	function insert(){

	}

	function update(){

	}
}

/*
You MUST declare a classs as abstract so long as it has (or inherits without providing a body) at least on abstract method.


Interfaces
*/

interface DataSore_Adapter_interface{

	public function insert();
	public function update();
	public function save();
	public function newRecord($name = null);
 
}

class PDO_DataStoreAdapter2 implements DataSore_Adapter_interface{

	public function __construct($dsn){

	}

	function insert(){

	}

	function update(){

	}
	function save(){

	}
	function newRecord($name = null){

	}
}

/*
All the interface's methods and parameters MUST be redeclared
if you fail to declare it, you will see a fatal error

- it is possible to implement more than one interface in the same class

remember - a class can only extend one parent class, but it can implement multiple interface


Determing an Object's Class

instanceof
*/

$pdo = new PDO_DataStoreAdapter("232");

 
if($pdo instanceof PDO_DataStoreAdapter){
	//echo "$pdo is an instanceof PDO_DataStoreAdapter ";
}
/**
* Lazy loading 
* __autolod
*/

function __autoload($class){
	require_once($class.'.php');
 }
/*
$objs = new testeC();
Fatal error: require_once(): Failed opening required 'testeC.php' 

SPL

if one fails to load a class, the next one in the chain is called
*/

spl_autoload_register('spl_autoload');
if(function_exists('__autoload')){
	spl_autoload_register('__autoload');
}

/*
Reflection

Listing - using reflection
*/

/**
*
* Say Hello
* @param string $to
*/

function hello($to = "world"){
	echo "hello $to";
}

//$funcs = get_defined_functions();

echo "<h1>Documentation</h1>";


/**
*
* sky
* @param string $to
*/

function sky($bar, $baz = array()){}

$funcs = get_defined_functions();


foreach ($funcs['user'] as $func) {
	try{
		$func = new ReflectionFunction($func);
	}catch(ReflectionException $e){

	}

	$prototype = $func->name . ' ( ';
	$args = array();

	foreach ($func->getParameters() as $param) {
		$args = '';

		if($param->isPassedByReference()){
			$arg= '&';
		} else
		if($param->isOptional()){
			print_r($param->getDefaultValue());
			$arg = '['.$param->getName(). ' = '.$param->getDefaultValue(). ']';
		} else {
			$arg = $param->getName();
		}

		$args[] = $arg;
	}

	$prototype .= implode(", ", $args). ' )';

 

echo "<h2>$prototype</h2>";
echo <<<TEXT
comment: 
<pre> {$func->getDocComment()} <pre>
<p>
file: {$func->getFileName()} <br>
Lines: {$func->getStartLine()}  -  {$func->getEndLine()}
</p>
TEXT;

}

/*
Using reflections with classes


*/

/**
* Greeting Class
* 
* Extends a greeting to someone/thing
*/
class Greeting{
	
	/**
	* Say Hello
	* 
	* @param
	*/

	function hello($to = "world"){
		echo "hello $to";
	}


}

$class = new ReflectionClass("Greeting");
/*
echo "<h1>Documentation</h1>";

echo "<h2>{$class->getName()}</h2>";
echo <<<TEXT
comment:
<pre>{$class->getDocComment()} <pre>
<p>
file:{$class->getFileName()} <br>
Lines: {$class->getStartLine()}  -  {$class->getEndLine()}
</p>
TEXT;
*/

foreach ($class->getMethods() as $method) {
 

	foreach ($method->getParameters() as $param) {
		$args = '';

		if($param->isPassedByReference()){
			$arg= '&';
		} else
		if($param->isOptional()){
			print_r($param->getDefaultValue());
			$arg = '['.$param->getName(). ' = '.$param->getDefaultValue(). ']';
		} else {
			$arg = $param->getName();
		}

		$args[] = $arg;
	}

	$prototype .= implode(", ", $args). ' )';

echo <<<TEXT
<p>
comment:
<pre>{$method->getDocComment()} <pre>
<p>
file:{$method->getFileName()} <br>
Lines: {$method->getStartLine()}  -  {$class->getEndLine()}
</p>
TEXT;
}