<?php  
/*
What is the output of this code?
*/

function test(MyClass $foo = null){
	echo empty($foo) ? "empty":"not empty";
}

test();

/*

A Fatal error

B Parse error

C empty

D not empty

*/

?>