<?php
/*
$a = $b = 2;

function add($valude){
	global $a;
	static $b;
	$b += $a;
	global $b;
	$b++;
}

add(1);
add(2);

echo $a . $b;
*/


$eis_uma_var = 'teste';


global $HTTP_POST_VARS;

echo $HTTP_POST_VARS['name'];