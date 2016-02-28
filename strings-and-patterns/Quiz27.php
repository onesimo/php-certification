<?php 
/*
Which PHP function is emulated by the following piece of code?
*/
$nr = 0;
$pos = 0;

while (($pos = strpos($x, $y, $pos)) !== false) {
	$nr++;
	$pos++;
}

//substr_count()

?>