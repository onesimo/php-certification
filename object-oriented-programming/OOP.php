<?php  
/*
Creating Classes
*/
// keyword class
class MyClass{
	public $member = null;

	function __construct($s = null){
		if($s != null){
			$this->member = $e;
		}
	}

	function __destroy(){
		echo 'bye...';
	}

	function showMember(){
		echo $this->member;
	}

	function doSomething(){
		echo '...';
	}
}
//instantiation with new
//$c = new myClass();

//Properties 
/*
Create a variable with the class 
keyword var is PHP 4 style! 

*/
// keyword class
 
//instantiation with new
//echo $c->member;

/*
Methods 

like functions
Accessing properties or methods of the current instance using #this
*/
//$c->showMember(); // or 
//$a = (new myClass())->showMember();
/*
Visibility
PPP: public, protected, private 

	public: Any code may access a property or method
	Protected: Only the class itself and derived classes may access a property or method
	Private: Only the class itself may access a property or method

Constructor
__constructor() Is a reserved method name for the class constructor

Destructor 
__destructor() is a resered method name for the class destructor

to destroy a class use unset($c); // bye

Statict Properties / Methods

Keyword static 

Operator is :: (Paamayim Nekudotayim)

Requires declarations (E_STRICT o thserwise)

No instantiation required

Use self to call static properties/methos from within the class

Inheritance

Derived classes(using extends) inherit properties and methods from on class

The parent constructor is not called automatically

You can overwrite properties and methods

Acess methos of the parent class using the parent keyword(non-statically!)

Prevent Overwriting 
Classes and methods marked with final cannot be overwritten


*/

class myOtherClass extends myClass{
	public $member = "DEF";
	function __construct(){
		parent::__construct();
		//parent::showMember();
	}

	final function doSomething(){
		echo 'DEF';
	}
 
}

$c = new myOtherClass();
//$c->showMember();

/*
Prevent Overwriting 
Classes and methods marked with final cannot be overwritten

*/
class myOther2Class extends myOtherClass{
	public $member = "DEF";
	
	/*
	Fatal error: Cannot override final method MyClass::doSomething() in D:\xampp\htdocs\PHPCertificacao\OrientaþÒo a Objetos\OOP.php on line 104
	
	function doSomething(){
		echo "I Can't do this ";
	}
	*/
}

/*
Abstract classes 

Provides a skeleton for a class 
May contain implementations 
Abstract methods must be implemented in derived classes
Keyword: abstract

Visibility may become weaker (see bellow) byt not strong
*/

abstract class myBaseClass{
	abstract protected function doSomething();
	function threeDots(){
		return '...';
	}
}

class myClassA extends myBaseClass{
	public function doSomething(){
		echo $this->threeDots();
	}
}

/*
Interfaces 

An interface privees the methods to implement

Does not contain any implementation itseit

Derived classes may implement more than one interface 

Interfaces may inherit from other interfaces using the extends keyword

All methods are assumed to be public in the interface definition can be defined explicity as public, or implicity

When a class implements multiple interfaces there cannot be any naming collision between methods defined in the different interfaces

Keyword: interface, implements
*/
interface myBaseClass1{
	public function doSomething();
	public function specialFuntion1();
}
interface myBaseClass2{
	public function specialFuntion2();
}
 
class myClassB implements myBaseClass1, myBaseClass2{
	public function doSomething(){}
	public function specialFuntion1(){}
	public function specialFuntion2(){}
}
$a = new myClassA();
$a->doSomething();

/*
Converting Objects into Strings

The special metrod __toString() is called, if available, and its return valude used
*/

class myclassC{
	function __toString(){
		return 'ABC';
	}
}

$c = new myclassC();
//echo $c; //ABC

/*
Autoloading
If a non-existing class is instantiated, PHP executes the __autoload() function, if available

*Parameter: Name of the missing class

*/
function __autoload($classe){
	include_once "./classes/class_$c.php";
}
$c = new myClass(); // loads ./classes/class_myClass.php


/*
Magic Methods(that are not already covered elsewhere)

__callStatic allways the calling of non-existent static methods must be public

__invoke called when a script attempts to call an obeject as a funciont

__set_state: static method: called for classes exported by var_exporte

When acceing non-existing properties, PHP executes special magic methods(if available)
__get () reads a property	__isset() checks is the property is set
__set () writes a property  __unset() Unsets / destroys a property
*/
class myClassD{
	private $a = array();

	function __get($x){
		return (!isset($this->a[$x])) ? $this->a[$x] : null;
	}

	function __set($name, $valu){
		$this->a[$name] = $value;
	}
}
 
 
/*
When accessing non-existant methods, PHP executes the special
__call() functions (if available)

*/

class myClassE{
	private $member = "ABC";

	function __call($name, $params){
		if($name == 'showMember'){
			echo $this->member;
		}
	}
} 
$a = new myClassE();
//$a->showMember();

/*
Type Hinting 

Data types may be proviede for functions and method parameters 

Objets
Arrays 
callable (to represent callback)

if the data type does matchs a fatal error occurs 

When dealing with objects the data type could be a class that extends another class
	As long as the type-hinted class exists somewhere below the passed class hierarchy, it will be allowed	
*/
class myclass1{}
class myclass2{}

function doSomething(myclass1 $c){}

$c1 = new myclass1();
$c2 = new myclass2();

doSomething($c1); //ok
//doSomething($c2); //fatal error

class myclass3{}
class myclass4 extends myclass3{} //a myclass1 foi extendida
function doSomething2(myclass3 $c){}

$c3 = new myclass3();
$c4 = new myclass4();

doSomething2($c3); //ok
doSomething2($c4); //ok

/*
Copying Objets

Ojects are always passed by reference

Cloning object causes the object itself to be copied instead of passing the reference

Keyword clone

$c1 = new myClasse();
$c2 = clone $c1;

PHP executes the special method _clone(), if defined in the class and object clone is attempted with the clone keyword
*Magic Method

Serializing Objects
Serialing objects and arrays with  serialize()
$s = serialize([1,2,3]);
//$s == 'a:3:'{i:0;i:1;i:1;i:2;i:2;i:3}
De-serializing strings with unserialize()
$a = unserialize('a:3:'{i:0;i:1;i:1;i:2;i:2;i:3}');
%a == [1,2,3]

Upon serialization, the magic method __sleep() is executed (if defined in the class); returns names of all properties to be serialized Magic Method

Upon de=serialization, the magic method __wakeup() is executed (if defined in the class) * Magic Method

Reflecion 
	The Reflection API allows for code introspection

	Objects
	Classes
	Methods
	Properties
	Functions
	Parameters
	Exceptions
	Extensions

Helper Classes:
	ReflectionObject
	ReflectionClass
	ReflectionMethod
	ReflectionPreperty
	ReflectionFunction
	ReflectionParameter
	ReflectionException
	ReflectionExtension 
Ex:

Reflection::export( new ReflectionClass('Reflection'));
*/
/*
Class [<internal> class Reflection]{
	- Constatns [0]{
	
	}
	Static properties [0] {
	}
	Static methods[2]{
		Method [<internal> static public method getModifierNames]{}
		Method [<internal> static public method expoer]{}
	}

	Properties [0]{
	
	}
	Methods[0]{
	
	}
}
*/

/*
SPL 

Standard PHP library
ArrayIterator
	Class that allows value modification while iterating over arrays and objects 
		Ex: current element, next element
	Allows foreach access

Arraybject
	Class that allows objects to function like arrays
		Ex: number of elements read/write access

	Allows access to the object using array functinos 

	...and many, many more

	
ArrayObject Class
	
	Class allows objects to function as arrys
	ArrayObject::STD_PROP_LIST properties are reatined when accessed as a list (Ex: var_dump, foreach)
	
	ArrayObject::ARRAY_AS_PROPS entries can be accessed as properties (Ex: READ/WRITE)

	Related ArrayObjects(example)?

	ArrayObject::appernd Appends a value
	ArrayObject::asort Sorts the entries by value
	ArrayObject::natsort Sorts according to a "natural order"

*/

/*
Generators

Feature to easily implement iterators without the SPL inteface

The yield keyword can be use to return multiple values during the execution of a function

We may then use foreach to iterate over the return value of the generator function  
*/
/*
pode cair na prova - ver um video

function oneTo($n){
	for($i = 0; $i <= $n; $i++){
		yield $i;
	}
}

foreach (oneTo(10) as $j) {
	echo "$j ";
}
*/
/*
Late Static Binding 
Keyword 

Term "late static" refers to fact that static:: is determined at runtime rather than usin the class where the method was defined
	introduces a keyword that references class called at runtime

Store the class designate in the las non-forwarding call
	Static method calls: class is one named(class::$X)
	non-static method calls: calls of object


*/

/*
Exceptions

Fire on with  throw

Catch one with try ... catch... finally

try{
	throw new Exception('oops');
} catch(Exception $ex){
	echo 'Error: '. $e->
}finally{
	echo 'Everybody see this (optinal)'
}

catch may also wait for specific excepations 
	Provides the type in your catch
Specific exceptions need to extend the base PHP Exceptions class

Custom Exceptions 

Just extend the Exception class:
*/
class myException extends Exception{
	function __construct($message = '', $code = 0){
		parent::__construct($message, $code);
	}

	function __toString(){
		return "Exception Custom Error #($this->code) ($this->message)";
	}
}

try{
	throw new MyException('unknown',42);
}catch(MyException $x){
	echo $x; //Error #42: unknow error
}



?>