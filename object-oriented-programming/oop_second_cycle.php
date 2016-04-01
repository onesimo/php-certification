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
*/


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
/*
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
class foo{

	static $bar = 'bat';

	public static function baz(){
		echo "hello world";
	}
}

$foo = new foo();
$foo::baz();