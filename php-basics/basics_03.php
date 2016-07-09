<?php 

/*
// valor por referencia

$a =  "joao";
//$b =  &$a;

$b = "maria";


//print $b; //maria

// CAIXA ALTA OU BAIXA

if(EMPTY($a)){
	//echo "sintaxe aceita";
}

//sintaxe valida
$maçã = "gala";

//print $maçã;


//Operadores short forms


$var1 = 1;
$var2 = 1;
/*
print $var1++; //1
print ++$var2; //2


GERA UM NOTICE - é necessário atribuir valor primeiro a variavel
$value +=10;
print $value;*/



//OPERADORES BITWISE

//print (7 << 9); //5128

/*
bit a esquerda 2 * ^ bit a direta =  7 * 2 ^ 9

7 * 2 ^ 9
2 ^ 9 = 2 * 2 * 2 * 2 * 2 * 2 * 2 * 2 * 2 = 512
7 * 5128


bit a esquerda 2 / ^ bit a direta

print (4 >> 6); //0,0625
*/

//Operador de negação
/*
~7
~x = ~x -1
~7 = -8

NAMESACES

namespace basic\php\teste{

	class classe{

		function __construct(){
			//echo ': '.__CLASS__;//: basic\php\teste\classe
			//echo ''.__METHOD__;// basic\php\teste\classe::__construct
		}

		function metodo1(){
			echo __METHOD__;//basic\php\teste\classe::metodo1
		}

	}

}
não pode haver codigo fora do name space quando definido em arquivo
*/

$data = 043;
$var =(string) $data;
//print $var;
//$classe = (new classe())->metodo1();



	