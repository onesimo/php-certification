<?php 
/** 
* Closure
*
*/

$closure = function($who) {
	echo "Hello $who";
};

$closure("world");
/*
Scope

Creating a closure
*/

function createGreeter($who){
	return function () use ($who){
		echo "hello $who";
	};
}

$greeter = createGreeter("world");
$greeter();


?>