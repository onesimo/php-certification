<?php 
/** 
* Closure
*
*/

$closure = function($who) {
	//echo "Hello $who";
};

$closure("world");
/*
Scope

Creating a closure


function createGreeter($who){
	return function () use ($who){
		//echo "hello $who";
	};
}

$greeter = createGreeter("world");
$greeter();
*/
/**
* Creating a closure with a reference
*
*/


//make sure to use referecen here also
function createGreeter(&$who){
	return function () use (&$who){
		echo "hello $who";
		$who = null;
	};
}

$who = 'world';
$greeter = createGreeter($who);
$who = ucfirst($who);
/*
$greeter();

var_dump($who);



Using $this
*/
class foo{

	public $a = 'me';
	public $b = 'you';

	public function getClosure(){
		return function () { return $this; };
	}
}

class bar{
	public function __construct(){
		$foo = new foo();
		$func = $foo->getClosure();
		$obj = $func(); // PHP 5.3: $obj == null
						// PHP 5.4: $obj == foo, not bar
		// var_dump($obj); 
	}
}

//$new = new bar();
/**
*Chaging $this dynamically
*
*
*/

class Greeter{
	public function getClosure(){
		return function(){
			echo $this->hello;
			$this->world();
		};
	}
}

class worldGreeter{
	public $hello = " hello from the other side";
	
	private function world(){
		echo " world";
	}
}

/**
*Using bindTo()
 

$greeter = new Greeter();
$closure = $greeter->getClosure();

$worldGreeter = new worldGreeter();

//Rebind $this to $worldGreeter

We can specifying a class with bindTo() as second argument to bindto()

$newClosure = $closure->bindTo($worldGreeter, 'worldGreeter');
$newClosure();


Using static bind()
we can also rebind using the static bind() method of the Closure class:
 
$greeter = new Greeter();
$closure = $greeter->getClosure();

$worldGreeter = new worldGreeter();

//Rebind $this to $worldGreeter
/*
We can specifying a class with bindTo() as second argument to bindto()
 ewClosure = closure::bindTo($closure, $worldGreeter, 'worldGreeter');
$newClosure();
*/

?>