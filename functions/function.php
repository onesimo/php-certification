<?php

//Declar functions
//Whit (optional) parameter and (optional) return value

function myFunction($p = false){
	//do something
	return $p;
}

$x = myFunction("ABC"); // $x== "ABC"
//$x = myFunction(); //warming and notice

//function parameter
//default values

function myFunction($p = "ABC"){
	return $p;
}

$x = myFunction("DEF"); // $x == "DEF"
$x = myFunction(); // $x == "ABC"

//if no parameter is supplied, no warning message will be displayed
//acessing parameter
/*
func_num_args(); // number of parameter
func_get_arg(nr); // Parameter number nr
func_get_args() //All parameters as array
*/
function addValues(){
	$sum = 0;

	for($i = 0; $i < func_get_args(); $i++){
		$sum += func_get_arg($i);
	}
	return $sum;
}

//Referebces
/*
Parameter are supplied by value(= a copy)
Use & to supply parameter by reference 
Using call-time pass-by-reference (using & in the function call and not in the function definition) does not work any more 
*/
function myFunction(&$a){
	$a++;
}

$b = 1;

myFunction($b); //$b == 2

