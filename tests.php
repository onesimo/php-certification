<?php
/*
echo "1" + 2 **/

$str = '////';
echo count(explode('/', $str));


/*
what is the output?

vsprint('%.2d', 120);

*/


function test($var = 4, $var2){

	echo $var, $var2;
}

test(null, 2);

/*

What is the output
*/

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


/*

what function reads on line out of a file and strip  the html and php tags?

R: fgetss


What is the outp
*/

$a = array(
	'b',
	'a',
	[1,2,3]
);

$var = count ($a);  //6

/*
what is the output 
*/

$a = [];
$a1 = [1 => 'php'];

$a2 = $a + $a1;
echo $a2[1];

echo array_merge($a, $a1)[1];


/*
convert a JSON content to an object

json_decode($sJson);


properites must maintain a transaction in a database?

R: Atomicity, Consistency, Isolation, Durability



Banco

LEFT JOINS - todos que estão na esquerda, mas não todos que estão a direita


Are correct regarding Password hashing API ?


R: the API provides a wrapper around the function crypt()


PASSWORD_DEFAULT & PASSWORD & PASSWORD_BCRYPT use the bcrpyt algotithm


What is the best protction to protect against SQL injection

R: Using prepared statements

Contermeasures againts hijacking PHP sesion?

R: define a short session timeout
and regenerate session id with session_regenerate_id upon login


Which directive configurations for a production enviroment?

display_erros = off and log_erros = on
error_reporting = E_ALL & ~E_DEPRECATED

*/

trait Solar
{
	private function timeToCharge(){
		echo 'PHP';
	}
}

class SportElectric
{
	use Solar{
		timeToCharge as public;
	}
}

/*

What will be the value of var
*/

$var = strlen("i'm in São Paulo");

/*

A: 16
B: 17 correct
C: 18
D: fatal error 
*/

$var = mb_strlen("i'm in São Paulo",'UTF-8');
//VAR serla igual a 16

/*
Verb HTTP to update the full content of a specified resource?

A PUT correct
B POST
C GET
D DELETE
E UPDATE


What the key and value pf second element of array $bar
*/

$foo = array('foo' => 7, "Bar" => 4, "Baz" =>5);
sort($foo);
$bar = array_keys($foo);

/*
A: key:5, value: Baz
B: key:1, value: Baz
C: key:1, value: Baz
D: key:1, value: 1  correct


what will be displayed with the code below?
*/

$sChaine = "Yesterday, I broke my mug.";

echo substr_count($sChaine,'I',11,16);

/*
A: FALSE
B: A warning error  //correct
C: 0
D: -1
E: 1

What is the output of the following code?
*/

function pears(Array $pears){
	if(count($pears) > 0){
		echo array_pop($pears);
		pears($pears);
	}
}


$fruit = array('Anjo',"Barlet");
pears($fruit);

/*
A: Barlet
B: Anjo
C: BarletAnjo correct
D: none / there is an Erro


The primary difference between a while loop and a do while loop is:

R: A while loop is pre test loop and a do while loop is a post test loop

Which instance will be be instantieated in the code below

namespace Rumo;
use Foo\Date, Security\SQLInjection as Z;

R: An instance of class SQLInjection of namespace Security


What will be displayed with the code below?
*/

$foo = 1;
echo $foo ?:3; //$foo ?$foo:3;

/*
A: Fatal Error
B: 3
C: 1 correct
D: 1 ? 3;

Which modification do you need to do for display the value 2610?
*/

function foo(array &$args){
	foreach ($args as $arg) {
		$arg *=2;
	}
}

$a = 1;
$b = 3;
$c = 5;

/*
A Line 1: réplace $args with &args
B Line 2: replace $arg with &args // correct
C All of the above
D line 3: replace ++$arg with $arg++

What will be the output of the code below?
*/

final class Car{
	public function name()
	{
		return 'Foo';
	}
}

class Sport extends Car{
	public function name()
	{
		return 'Bar';
	}
}

$sport = new Sport;

echo (string) $sport->name();

/*
A: Bar
B: Foo
C: FALSE
D: empty string
E: A Fatal Error  // correct



Which is the value of $result[3]?
*/

$array = [1,2,3,4];

$result = array_map(
	function($valor){
		return ++$valor;
	},$array
);
/*
A: 0
B: false
C: 4
D: Error Faltal
E: 5 correct

What is the output of the following code?
*/
$str1 = 'apple';
$str2 = 'Apple';

echo (int)($str1>$str2);
/*
obs: na tabela ASCI as letras maiusculas vem primeiro

A: true
B: false
C: 1
D: 0
E: null
*/