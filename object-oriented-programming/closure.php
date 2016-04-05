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

$greeter();

var_dump($who);

/*

Using $this
*/

class foo{
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
	}
}

?>