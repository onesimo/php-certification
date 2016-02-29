<?php


/*Variable Scope

*Variables declared within functions are only visible in that function 
*Variables declared outside of functions are visible everywhere outside of functions
*Variables declared outised of functions can be made visible within a function using global*/

//Variable functions 
#Variable functions work just like variable variables

function xyz(){
	echo "XYZ";
}

$d = "abc";
$abc = "xyz";
echo $$d(); // $$d() == ${"abc"}() == $abc() == xyz()


?>