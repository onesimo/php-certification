<?php 
/*
Which of the following equivalence operations evaluates to true if the two operands are not of the same data type or do not have the same value? 



A !==  //correct

B ===

C !=

D ==

  You work as a Web Developer for Remote Inc. What will be the output when you try to run the script below? 


$b = false;
if($b = true)
	print("true");
else
	print("false");




A false

B true //correct

C The script will throw an error message.

D true false


Which of the following options is/are correct regarding variable scopes in PHP? 



A script, function and class

B class, global and script

C global, function and class //CORRECT

D global, script and function


Explanation

Function scope = Variable scope exists within the function where was defined
Global scope = Variable scope exists everywhere in the PHP script
Class scope = Variable scope exists within a class where the variable was defined 


What is the result when the following PHP code involving a boolean cast is executed?


var_dump((bool) 5.8);


A boolean False

B 1

B boolean True

D 0

Explanation

Any number DIFFERENT  than zero when converted to a boolean becomes true. Hence, the following code will output boolean true


What will be the output of the following PHP script: 




A Array ( [0] => 3 [1] => 4 [2] => 8 )  //CORRET

B Array ( [0] => 5 [1] => 7 [2] => 9 )

C Array ( [0] => 2 [1] => 4 [2] => 6 )

D Array ( [0] => 1 [1] => 2 [2] => 3 )


function modifyArray (&$array)
{
    foreach ($array as &$value)
    {
         $value = $value + 2; // increment the value by 2 
    } 

    $value = $value + 3;//it will increment only last value of the array
}

$array = array (1, 2, 3); 
modifyArray($array);
print_r($array);

Which of the below provided options is correct regarding the below code? 

*/

$a = array (1, 2, 3);
$b = array (1 => 2, 2 => 3, 0 => 1); 
$c = array ('a' => 1, 'b' => 2, 'c' => 3);
var_dump ($a == $b); 
var_dump ($a === $b); 
var_dump ($a == $c); 