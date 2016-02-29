<?php
//What will be echoed in th last line?

$a = 2;
$b = 3;

function test(){
	global $b;
	static $a;

	$a++;

	$b+= $a;

  	//echo "a= $a; b= $b \n";

	global $a;

	$a += 2;
	//echo "a= $a; b= $b \n";
	//echo "_______\n";
}

test();
test();
test();

//echo "$a; $b";


/*
A Cannot have static variables in a function

B Defining $a in the function as global and static is not allowed

C 8, 9 //CORETA

D 8, 6
 

a= 1; b= 4 // "b" usa o valor da global // "a" inicia com 1 pois é incremenatado static sem valor
a= 4; b= 4 // "a" passa a ser global para 4 
_______
a= 2; b= 6 // "a" utiliza o valor estatico e incrementa 6 utiliza o valor global
a= 6; b= 6 // "a" seta o incrementa 2 no valor global == 6
_______
a= 3; b= 9 // "a" incrementa no valor estático == 3
a= 8; b= 9 // "a" incremeta o valor global e finaliza com 8
_______

*/


echo __FILE__;