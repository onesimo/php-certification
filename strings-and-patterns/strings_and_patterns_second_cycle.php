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

//echo "There cannot be more than two {$me}s".PHP_EOL;

//echo "Citation: {$names[1]}[1997]";

$echo = <<<TEXT
Eu sou $me sou heredoc

TEXT;


$echo = <<<'TEXT'
Eu sou $me sou nowdoc

TEXT;


class hello{
	public $greeting = <<<'HELLO'
hello from the other side
HELLO;
}

//echo (new hello())->greeting;

//Escaping Literal Values
/*
echo 'this is \'my\' string'.PHP_EOL;

echo "The value of \$me is \"$me\".".PHP_EOL;

echo "Here's an escaped blackslash: = \\ - ".PHP_EOL;

echo "here's a literal brace + dollar sing: {\$ ";

Determinig the Length of a String
*/

//echo strlen("ç");  = 2

//Transforming a String

//echo strtr('abc', 'cba','123'); // 321

$subst = array('1' => 'one',
			   '2' => 'two',
			   '3' => 'eusoutres');

//echo strtr('123a', $subst); //onetwoeusoutres


//Using String as Arrays

$string = 'onesimo';

//echo $string[4]; // = i 


$s = 'abcdef';
 
for($i = 0; $i < strlen($s); $i ++){
	if($s[$i] > 'c'){
		//echo $s[$i]; //def
	}
}

//echo "abcdef"[1]; // = b

//Comparing Searching and Replacing Strings

$string = 'aa123';

if($string == 123){
	//echo "we are equals";		
	//The string equals 123 unless we use === to compare
}

//Comparing strings with strcmp and strcasecmp

if(strcmp($string, '123AA') === 0 ){
	//false, because of the case sensitivy
	echo "it is false ";
}

if(strcasecmp($string, '123AA') === 0){
	// true, because it is case-insensitivy
	//echo "strcasecmp is case-insensitivy";
}


//variant of strcasecmp, strncasecmp()
if(strncasecmp($string,'123BB', 3) === 0){
	//true, because it will test only the firt three caracteres
	//echo "strcasecmp is case-insensitivy";
}

//return the position found, this could be 0 if it is the first match
//echo strpos($string, '123');
 

if(strpos($string, 'aa') !== false){
	//echo "ok";
}

$haystack = '123456123456';
$needle = '123';

strpos($haystack, $needle).PHP_EOL; //0

strpos($haystack, $needle,1); //9


// strstr($haystack, $needle); returns the portion of the haystack

//strstr is slower than strpos
strstr($haystack, "34"); //3456123456

//Case-insensitive serach
stripos("Hello World", 'hello'); // outputs 0
stristr("Hello My World", 'my'); // outputs "My World"

//reverse search
strrpos("aaa123123", '123'); // outputs 6



