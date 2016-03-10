<?php 
/*
Strings and Patterns

\ blackslash to escape

echo "\x2a"; //asterix hex
echo "\052"; //asterix hex

Variable Interpolation
*/

$me = "Joao";
$names = array('Maria','Jose', 'Paulo');

echo "There cannot be more than two {$me}s".PHP_EOL;

echo "Citation: {$names[1]}[1997]";