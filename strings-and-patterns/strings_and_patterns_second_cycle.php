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


//Matching Against mask

$string = '1l3b3445abcdef';


//returns the initial mask of allowed characters - whitelist
strspn($string, '12345');

//
//returns the length of the initial segment of the string that does not contain any of the characters from mask - blacklist
strcspn($string, 'yf');

//strcspn and strspn, have two optinal parameters that define the starting position and the lenght of the string
$string = '1abc234';

strcspn($string, 'c',0,10);

//Simple Search and Replace Operations - case sentive
str_replace("ola", "oi", "ola pessoas");

//case-insensitive
str_ireplace("Ola", "Oi", 'ola mundo');

// the third parameter return the number of substitutions made.
$count= 0;
str_replace("a", "x", "apapap", $count); // $count = 3


str_replace(array("ola", "mundo"), 
		    array("hello", "world"), "ola mundo"); //hello world

str_replace(array("ola", "mundo"), "tchau", "ola mundo"); // tchau tchau

//third argument is starting point 
substr_replace("hello world", "reader", 6); // hello world

// the fourth parameters define the end of the substring
substr_replace("canned tomatoes are good", "corns", 7, 8);

//powerfull tool
$user = "jhon@email.com";
$name = substr_replace($user, "", strpos($user, '@')); //jhon


//Extracting substrings

$string = "1234567";

//first paramater - starting, if negative start from the end

substr($string, 1); //234567
substr($string, 0, 3); // 123
substr($string, -1); //7
substr($string, -3, 2); //56
substr($string, 2, 2); // 34

//FORMATTING NUMBERS

number_format('100000.698'); //100,001 nearest integer

//accepts 1,2 or 4 args but not 3
//second paramater number of decimal, third separates decimal, fourth thousand  
number_format("100000.698",2, ",", ".");//100.000,69

//Formatting Currency Values

setlocale(LC_MONETARY, "en_US");

//money_format('%.2n',"100000.698"); // this is not work on windows

//Generic Formatting

/*
b - integer as binary number
c - character as its ASCII
d - signed decimal number
e - scientific notation
u - unsigned decimal number
f - locale aware float number
F - non-locale aware float number
o - octal representation
s - string
x - number as hexadecimal with lowercase letters
X - number as hexadecimal with uppercase letters

printf()  = writes it to script
sprintf() = return it
fprinf()  = print it out to file
 
Using printf
*/




$n = 123;
$f = 123.45;
$s = 'A String';

//printf("%d", $n); // prints 123
//printf("%f", $f); // prints 123.450000

//printf("the string is a %s", $s);

//printf("%3.3f", $f); // 123.450

//complex formating

function showError($msg, $line, $file){
	return sprintf("An error occured in %s on line %d: %s", $file, $line, $msg);
}
showError("invalid number", __LINE__, __FILE__);

/*
Parsing formart input 
sscanf() similiar to prinf() - instead of formatting output, allows to parse formatted input.
*/

$data = '123 456 456';
$format = '%d %d %d';

$array = (sscanf($data, $format));
 

//the function interprets the format string and returns an array


/*
PERL COMPATIBLE REGULAR EXPRESSIONS

Demiliter

by convention slash(/)

Metacharacters

. Match any character
^ Match the start of the string
$ Match the end of the string
\s Match any whitespace character
\d Match any digit
\w Match any "word" character

using grouping expression

/ab[cd]e/  can be match  abce and acde 

provide range

/ab[c-e\d]/ can be match abc, abd, abe and any combination of ab followed by a digit

Quantifiers

* zero or more times
+ apper one or more times
? zero or one time
{n,m} at least n times and no more than m
 

Greedliness
/`(.*)`/ will match the blocks individually

Modifiers

i - case insensitive expression
m - indicates that you are matching against a multi line string
s - the . (any) metacharacter will also match newlines
x - ignore regular whispace
e - only used in preg_replace(), deprecated
U - inverts the behavior of "greedliness"
u - theats the patterns and subject as UTF-8

Sub-Expressions

/a(bc.)e/ this will match the letter a, followed by b and c, followed by any character and, finally the letter e.

/a(ac.)+e/ this will match the letter a, followed by the expression bc. repeated one or more times, followed by the letter r.

Matching and extracting Strings 
*/
$name = "Davey Shafik";

$regex = "/[a-zA-Z\s]/";

if(preg_match($regex, $name)){
	//echo "valid";
}

$regex = '/^(\w+)\s(\w+)/';
$matches = array();

//the third parameter return all the captured subpatterns in an array
if(preg_match($regex,$name, $matches)){
//var_dump($matches); results:

/*array(3) {                  
  [0]=>                     
  string(12) "Davey Shafik" 
  [1]=>                     
  string(5) "Davey"         
  [2]=>                     
  string(6) "Shafik"        
}                           
  */                          
}

//Named Matches

$regex = '/^(?<firstname>\w+)\s(?<lastname>\w+)/';

if(preg_match($regex,$name, $matches)){
 //var_dump($matches);// results:

/*
array(5) {
  [0]=>
  string(12) "Davey Shafik"
  ["firstname"]=>
  string(5) "Davey"
  [1]=>
  string(5) "Davey"
  ["lastname"]=>
  string(6) "Shafik"
  [2]=>
  string(6) "Shafik"
}*/
}

$string  = "a1bb b2cc c2dd";
$regex 	 = "#([abc])\d#";
$matches = array();

if(preg_match_all($regex, $string, $matches)){
	//var_dump($matches); //results: 
/*
	array(2) {            
  [0]=>               
  array(3) {          
    [0]=>             
    string(2) "a1"    
    [1]=>             
    string(2) "b2"    
    [2]=>             
    string(2) "c2"    
  }                   
  [1]=>               
  array(3) {          
    [0]=>             
    string(1) "a"     
    [1]=>             
    string(1) "b"     
    [2]=>             
    string(1) "c"     
  }                   
}                     
*/
}

// Using PCRE to replace strings

$body  = "[b]Make me Bold![/b]";
$regex = "@\[b\](.*?)\[/b\]@i";
$replacement = '<b>$1</b>';
$body = preg_replace($regex, $replacement, $body);

//echo $body; //results <b>Make me Bold!</b>


//Multiple arguments with preg_replace

$subjects['body'] = "[b]Make me Bold[/b]";
$subjects['subject'] = "[i]Make me italics[/i]";

$reg[] = "@\[b\](.*?)\[/b\]@i";
$reg[] = "@\[i\](.*?)\[/i\]@i";

$replacement[0] = "<b>$1</b>";
$replacement[1] = "<i>$1</i>";

$results = preg_replace($regex, $replacement, $subjects);

/* 

var_dump($results);

results:

array(2) {
  ["body"]=>
  string(19) "<<>Make me Bold</b>"
  ["subject"]=>
  string(22) "[i]Make me italics[/i]"
}

*/

