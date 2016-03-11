<?php 
//What will be printed when the following code is executed?

function get($a, $b, $c=4, $d){
	print "[$d, $c, $b, $a] \n";
}
get(2,3,5);
/*
A Fatal error 

B A warning

C [,5,3,2]

D [,5,3,2] and warning
*/