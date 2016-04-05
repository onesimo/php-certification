<?php

/**
*Internal Functions
*/

$callback = 'myFunction';
usort($array, $callback);

/*
You can also use arrays to denote object or static class method calls: 

Listing 10.8: Using arrays ti soecify callbacks

*/


//objet method call
$callback = [$obj, 'method']; // $obj->method()
usort($array, $callback);

//or static method
$callback = ['SomeClass','method']; //SomeClass::method()
usort($array, $callback);

/*
Using a class as a callback
*/

class Sorter{

	public function __invoke($a, $b){
		//sort
	}
}

$sorter = new Sorter();
usort($sorter);

/*

Userland Function

Variable functions
*/
$callback = 'myFunction';
$callback();

//object method call;
$callback  = [$obj, 'method']; //$obj->method() callbak
$callback();


//static method ;
$callback  = ['SomeClass', 'method']; //SomeClass::method() callbak
$callback();

//closures
$callback = function(){};
$callback();

class invokeCallback{

	public function __invoke($a, $b){
		//sort
	}
}

$callback = new invokeCallback();
$callback();
