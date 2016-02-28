<?php
//What is the result of this code?

function test($one, &$two, &$three = "3"){
	echo "[$one, $two, $three] \n";
	$three +=3;
	$two++;
}

$one = 21;
$two = 22;

test($one,$two, 23);
test($one, $two);

echo "[$one, $two, $three] \n";

/*
A[21,22,23]
 [21,23,3]
 [21,24,26]

b[21,22,23]
 [21,23,3]
 [21,24,6]

C FATAL ERROR // CORRETA, não é possível apontar para o valor 23, somente variaveis podem receber valor por referencia	
*/