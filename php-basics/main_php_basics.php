<?php
/*
Embedding PHP
There are several options to embed PHP code in an HTML document
<?php
<?
<%
<script language="php">
<?php
*/
//Variables 

/*
Names
	First : a dollar sign
	Second : a letter or an underscore character
	Then (option): letter, digit, underscore
*/
//Variables Variables

$d 	 = "abc";
$abc = "xyz";

//é possível referenciar uma varial com usando $$d ou ${"abc"} ou com $ e colchetes
//echo $$d; // $d == ${"abc"} == $abc == "xyz"

/*
$onesimo = 'false';
$name = "";

if ($onesimo == true){
	echo 'vdd '. gettype($onesimo);
}else{
	echo 'mentira - '.gettype($onesimo);
}
*/


define('myPHPVER', '5.5.0');

myPHPVER; // 5.5.0
//MyPHPVER; //E_NOTICE output: MyPHPVER

define('myPHPVER2', '5.5.0', true); // the terceiro parametro é para utilizar case insensitive
myPHPVER2; // 5.5.0
MyPHPVER2; // 5.5.0

/*


/*
Data Types

String - Integer - float - double - boolean - arrays - objects - resources - NULL

Strings

Delimited by single or double magic_quotes_runtime()
Double quotes offer more options
*/

//Specials characters
$x = "1\n2\n3";
//String variables
//$x = "1$y2";

//What is the output of the followwing code?
strlen('1\n2') * strlen("1\n3"); // 12


//heredoc syntax?

$y = <<<ABC
1
2
3
$x
ABC;

//Importan: variables and special character work just like double quotes
//What is the output of the followwing code?
$b = "B";

//fechamaento da tag heredoc XYZ precisar ser na primeira linha
/*
echo <<<XYZ
a
$b
c
XYZ;
*/

//NAMESPACES

//Way to group related PHP code elements withn a library or app
/*
Affects functions, classes, and constants only
	classes and functinos contained with global spaces unless namespaces defined
	Use "\" to indicate that a name from the global space is to be used  

Two main roles
	avoid accidentally renaming elements and
	avoid use of long, descriptive class names 

Must declare the use of namespaces with keyword "namespaces" at the immediate start of your code file

	* "declare" only construct can procede the namespace delcaration
	* Only use one namespaces per code file
	* Can sub-divide livrary using "\" Ex: app\libi
	//Exemple file NAmespace.php


What instance will be instantiate?

namespace w;
use S\T, X\Y as Z;

new Z();
*/

//An instance of class Y from namespaces X

/*There are two ways to abstractly access elements contained within a namespace
	Using the magic constant __NAMESPACES__
	Usion the keyword namespace

Aliasion / Importing 
	Can refer to an external, fully-qualified name using an alias (example: use L1 for app\lib1)

Two tyes of aliasing/Imporing?
	Can alias a class name or a namespace name (not functions or constants)
		Namespaced names must be Fully fully-qualified
	Alias with the use operator
*/


//TYPE CONVERSIONS
/*
PHP is not strongly Types
A variable can change its data Types
*/
$x = "ABC";
$x = 1;
$x = false;
/*
Consequence: A high potential for hard questions!

PHP tries to convert automatically, as  well as it can..
*/
$x = 47;
$x .= "11"; // $x == "4711"
/*
What is the output of the following code 
*/
$x = "08";  $x +=15;   // = 23 PHP converte a string na operação
$y = 018; 	$y += "15";// = 15 Oito é octal
$z = " 47"; $z += 11;  // = 58 PHP ignora espços

/*
Converting strings into numbers

PHP scans the string from left to right until an invalid character is encountered
*/

$x =  "12x" * 1; 	// (int) 12
$x =  "1.2x" * 1;	// float (1.2)
$x =  "12E-1x" * 1; // float (1.2)
$x =  "08x" * 1; 	// (int) 8
$x =  "E1x" * 1; 	// (int) 0 
/*
*Pre-pending a data type makes PHP convert into this data type
*/
$x = (int) "12E-1x"; // $x == 12
$x = (int) "float"; // $x == 1.2

/*
Exceptions for booleans
(bool) $x is always true, unless
$x == 0
$x == "0"
$x == ""
$x == null
(int) true is 1, (int) false is 0
(string) true is "1", (string) false is ""
*/

//What is the value $x after running this code?
$x = (bool)" "*(int)(string)12E-1; //1
/*
(string)12E-1 == 1.2
(int) 1.2 == 1
(bool) " " == 1
=> 1*1 == 1 
A 0
B 1 CORRETA
C 1.2
D 12
E A syntax error
*/

//ASSIGNMENT OPERATOR
//Use th equal sign (=)

$a = 1;
$b = $a;
$b = 2;
//$a == 1

//Working with references
$a = 1;
$b = & $a;
$b = 123;
 
//$a ==2

//Aithmetic Operator
/*
Basic calculations

+(adding)
-(substracting)
*(multiplying)
/(dividing)

Modulus (remainder  where dividing)
*/
$m = 5 % 2;  // $m == 1

//Biwise Operator
/*
* Integral numbers are internally converted into bits 
Ex: 10 -> 1010 = 1*8+0*4+1*2+0*1
Ex: 5 -> 0101 = 0*8+1*4+0*2+1*1

Operators can change bits
Hint: Use scratch paper or eraseable borad for this type of question 


Logical AND: &

looking for matching 1s
/*
echo 10 & 5;  //00
//1010 and 0101 - no matcging 1s
echo 5 & 6; //4 
// 0101 and 0110 - matching 1s 0100
echo 5 & 9;// 1
// 0101 and 1001 = mathing 1s 0001
*/
/*
Logical AND: |
at least a 1 in one of the operands

echo 10 | 5;  //15
//1010 and 0101 - yields 1111!
echo "\n";
echo 5 | 6; //7 
// 0101 and 0110 - yields 0111!
echo "\n";
echo 5 & 9;// 13
// 0101 and 1001 = yields 1101


Logical EITHER: |
A 1, either in the left or in the right operands

echo 10 ^ 5;  //15
//1010 and 0101 - yields 1111!
echo "\n";
echo 5 ^ 6; // 3 
// 0101 and 0110 - yields 0111!
echo "\n";
echo 5 ^ 9;// 12
// 0101 and 1001 = yields 1101
*/

// Shift bits  <<,>>

// left shift << 
// 	Multiply by 2, x times (x is the operand after <<)
// 	3 << 4 == 18 (3* 2 ^ 4  = 3 * 16)
// right shift >>
// 	Divide by 2, x times (x is the operand after >>)
// 	4 >> 2 == 1 (4 / 2^2 = 4/4)

// Negate bits: ~
// 	turns 0s into 1s  into 0s


//--------------------------------REVISAR
/*
Given that E_Error = 1, E_WARNING = 2, E_PARSE = 3, and E_NOTICE = 8,
which of the followwing would not set the error reporting level to all except E_NOTICE?


A error_reporting((E_ALL | E_STRICT) ^ E_NOTICE);

B error_reporting(E_ALL & E_STRICT & E_WARNING & E_PARSE & ~E_NOTICE); // correta

C error_reporting(~(E_ALL & E_NOTICE) & E_ALL | E_STRICT);

D error_reporting(E_ALL & ~E_NOTICE | E_STRICT | E_WARNING | E_PARSE); 
 
 */

//SHORT FORMS

//Instead of
$a = $a + 1;

//you can also use
$a += 1;

//lso works woth these operators: - * / & | ^ >> <<
/*
Two operators for increasing and decreasing by 1

$a++ and ++$a
$a-- and --$a

THe positions decides where the value gets increased/decreased
	In front of expression: increased / decreased First
	After expression: increased / decreased afterwards
*/
$a = 1;
++$a; 
 
// Comparison Operator
//== valors iguais === valores e tipos iguais.

//Does the following code assing a TRUE value to $a?

$a = 123 !== 1230E-1;
/*
A Yes correta
B Noe
*/

// Operators
/*
greater than >
less than <
greater equal >=

Also works  with strings
	Position in the charset matters


What is the oupt of the following code?
*/
$p = "PHP";
$P = "php";

// Os valores das minusculas são menores que as maiusculas
//echo ($p < $P) + 2 * ($p > $P) + 3 * ($p == $P);

//STRING OPERATOR
// concatenating strings with '.'
// "Hello"." " ."World" == "Hello World"

//Other important string funcintos

$a =  "Hello World";

//strlen("Hello World"); // = 11 retornar o tamanho da string
strpos($a, "w"); // = 2 retornar a posicao numerica da primeira ocorerncia
/*
//Controle Structures
*Conditions
*Loops
*/
if($a){

} else if($a ==1){

}else{

}

//Alternative Syntax (From old PHP times)
/*
if($a):
	//do something
elseif:
	// do something else
else:
	// do something different
endif;
*/
//Ternary Opertor
$a = ($a>1) ? true: false;

//Short form
$a = true ?: false;
//Switch

switch ($a) {
	case 'value':
		# code...
		break;
	case 'value2':
		# code...
		break;
	
	default:
		# code...
		break;
}

//What is the result of following code?

$name = 'tAtIaNa';

switch (strtolower($name)) {
	case 'tat'.'ia'.'na';
		//echo 'tat';
	case 'angela';
		//echo 'ang';
	case array(1);
		//echo 'Arr';
	case 'bard';
		//echo 'Bar';
		break;
	default:
		# code...
		break;
}

//result = 'tatangArrbar';

//LOOPS
/*
for
while
do-while
continue
break
*/
//Configuration
//php.ini - confi file for PHP

//inclues [HOST] & [PATH=], and directives (ex: allow_url_fopen)

//error_reporting(); // php.ini directive escolhe o nivem de exibição de erros
//display_erros();// php.ini  directives se vai exibir ou não o erro
/*
What is the difference between using the E_ALL error constant and using numerical representation, 32767?

A Only using E_ALL is backward and forward compatible // correta
B Only using 32767 is backward and forward compatible
C Using E_ALL does not work with CLI version of PHP
D There is no difference */


//Extensions
// to instal with PECL or PEAR

//Common extensions include those for
/*
Apache ex: apache_get_modules()
Erro handling, ex: error_log()
JSON ex: json_encode();
*/
/*
Which php.ini setting is most commonly used tto load a PHP extension in php.ini?

A extesion correta
B extension_ts
C zend_extension
d zend_extension_ts
*/
/*
Performance & bytecode caching
bytecoding caching is a technique utilized to improve PHP performance (PHP accelaration)
	*Compiled  bytecode is cached instead of  the more memory intensive
technique of parsin + compiling code with each request.
	*Bytecode coaching often stored in shared memory.

Factors affecting performance - two major aereas:
	*Reduce memory usage 
	*Runtime delays 

Garbage collection affects both - the clean-up overall frees up  memory usage,
but causes delays in running while this process is executed 
	*Longer ruunning scripts benefit most from this technique
	*Triggered where root buffer full, or when gc_collect_cycles() is called

OpChache in PHP 5.5

PHP 5.5+ comes with an out of the box bytecode cache
Based on ZendOptimizer+, donated to the PHP project by Zend 
Part of the PHP distribution, however, disabled by default.
ACtivate using zend_extension directive in php.ini 
OpCache may also be used in PHP 5.2 - 5.4 using the PECL version   


What is the bytecode cache doing?

A It caches commonly used functinos so they can run faster
B It caches data from external resouces like databases and webservices so they can be accessed faster
C It caches the machine-readable code created after PHP code has been parese // correct
D It caches the HTML output of the PHP script

*/
 