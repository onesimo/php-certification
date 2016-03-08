<?php

//Basics Sytanx

function Helloworld(){
	//code here
}

// returning
function AllReturnValue(){
	return "something";
}

$value = AllReturnValue();

//echo $value;
/*
return allows you exit of a function if you don't want to return a value
*/

function FunctionGo($option){
	
	if($option == 'exit'){
		return;//like a break
	}

	echo "the option is not exit, it is: $option";
}
/*
FunctionGo('exit'); //displays nothing
FunctionGo('room'); //displays  the option is not exit, it is: room


if you don't return a value, your function will return NULL

RETURNING BY REFERENCE
	You must return a variable
	You cannot return an expression by reference or empty return statement to force a NULL return value
*/

function &query($sql)
{
	$result = mysql_query($sql);
	return $result;
}

// Following incorret, emit a notice when called
function &getHello(){
	return "Ola mundo";
}

// also cause the warning to be issued when called
function &getHelloEcho(){
	echo "Ola mundo";
}
 
/*
VARIABLE SCOPE
	Global scope
	Function scope
	Class scope

*/
//Variavel scope

$a = "Brasil";

function Pais(){
	$a = "Argentina";
	$b = "Chile";
}

Pais();

//echo $a = // displays Brasil
//echo $b = // emit a notice

//Accessing with the global statement

$a = "Brasil";
$b = "Chile";
function Pais2(){
	global $a, $b;

	echo " $a e $b ";
}

//Pais2(); //displays Brasil e Chile

//Accessing $GLOBAL array

$a = "Brasil";
$b = "Chile";
function Pais3(){

	echo "$GLOBALS[a] e $GLOBALS[b] ";  
}

//Pais3(); //displays Brasil e Chile

//Passing Arguments

$arguments = "ok";

function ReceiveArg($arguments){
	return $arguments;
}

ReceiveArg($arguments);

//Setting arguments default


function ReceiveArg2($arguments = 'this is default'){
	return $arguments;
}

ReceiveArg2($arguments);

/*

Type-hinting

When you specifies what type of data must be passed
You may specify
	Any class or interface name
	Array - The value must be array
	Callabe - The value must be a valid callback

*/

function typeHinting(array $people = null){
	//the argument must be an array or default will be false
}

function typeHinting2(SomeObj $obj, Callable $callback){
	// $obj  must be an object
	// $callback must be a valide callback
}

/*
if you use type-hiting with defaul value, the default value must be null, if an invalid value is passed it will instead cause an error
*/

//Passing Arguments by Reference

function countAll(&$count){

	if(func_num_args() == 0){
		die("You need to specify at least one argument");
	} else {
		//Returns an array of arguments
		$args = func_get_args();

		//remove the first argument
		array_shift($args);

		foreach ($args as $value) {
			$count += strlen($value);
		}
	}
}
 
$x = 0;
countAll($x, "foo", "bar", "baz"); // $x equals 9


//NOTE: only variables can be passed as by reference

///Passing by reference with default

function directory($cmd, &$output = null){
	$output = `where is $cmd`;

	if(strpos($output, DIRECTORY_SEPARATOR) !== false){
		return true;
	}else{
		return false;
	}
}


//Variable-lenght Argument List


// you can't omit the first parameter
function Mistake($optinal = "null", $required){

}


//Built-in functions
//func_num_args (), func_get_arg() and func_get_args()
//Example:

function ExampleBuilt(){
	if(func_num_args() > 0){
		// the first argument is at position 0
		$arg = func_get_arg(0);
		echo "Hi $arg";
	}else{
		echo "no one";
	}
}

//ExampleBuilt('aasfirst');


//Counting arguments

function countAll2($arg1){
	$args = func_get_args(); // array f arguments
 
	//remove the first argument
	array_shift($args);

	$count = strlen($arg1);

	foreach ($args as $value) {
		$count += strlen($value);
	}

	return $count; 
}
 
//echo countAll2("foo", "bar", "baz"); //   equals 9

