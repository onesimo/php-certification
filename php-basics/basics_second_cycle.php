<?php

/*
Syntax 

PHP's sytanx derived from C.

Standar Tags
<?php ... ?>

Echo Tags - print the result
<?= $variableEchoed; ?>

Sort Tags
<? ... ?>

Script Tags
<script language="php"> </script>

ASP Tags
<% ... ...  %>//  considered deprecated 


Comments 
It is a good practise to comment ervery element in your code

//Single line comment
#Single line comment 

/*
Multi 
line
*\/


Whitespace
*/

//Code Blocks 
{
	/*
		calling a method
	*/ 
	(new person())->teste();
}

class person{
	function teste(){
		return (__METHOD__); //will print person::teste
	}
}

/*
Magic constants

__LINE__ the current line number of the file
__FILE__ full path
__DIR__	 The directory of the file
__FUNCTION__ the function name
__CLASS__ the class name
__TRIT__ thait name, with namespace it was declared (foo\bar) 
__METHOD__ the class method name
__NAMESPACE__ the name of the current namespace

Language Construct

"echo" is not a function and it does not have a return value
"print()" behaves like a function, as it has a return value(which is always 1) 


cho "String 1", "String 2"; // no return
echo (print "string"); // return 1 then will print string1

Data Types

Scalar
Boolean - A value that ca only be either true or false
int - numeric integer value
float - floating-point value
string - a collection of binary data

Numeric Values - interger or floating-point

DECIMAL	
10;-11;1452 Standard decimal notation. Note that no thousand separator is needed(or, indeed, allowed).

OCTAL
0666,0100 Octal notation - identified by leading zero

HEXADECIMAL 
0x123;0XFF;-0X100 - Base 16 notation; note that the hexadecimal digits the leading 0x prefix are both case-insensitive.

BINARY
0B011; 0B010101;-0b200 - Base 2 notation, zero is followed by a case-insesitive B, and, of course, only 0s and 1s are allowed

NOTE: All non-decimal numbers are converted to dcimal when output with echo or print

floating-point numbers - 
Decimal 0.12; 1234.43; -.123 - tradiciontal decimal notation

Exponential 2E7,1.2e20 followed by the case-insensitive

echo (int)((0.1 + 0.7) * 10); //  = 7, the arithmetic expression 7.9999, when converted to int PHP


STRINGS
Collections of the binary data - this could be text, but it could be also contents of an image file, a spreadsheet, or even a music recordin.

Booleans
Only contain true or false
	Converting data to boolean
		- a number converted into a boolean becomes false if the original value is zero, or true otherwise.
		- A String is converted to false only if it is empty or if it contains the single character 0, if it contains any other data-even multiple zeros=it is converted to true
		- When converted to a number or a string a boolean becomes 1 if it is true, or 0 otherwise.

Exceptions for booleans
(bool) $x is always true, unless
$x == 0
$x == "0"
$x == ""
$x == null
(int) true is 1, (int) false is 0
(string) true is "1", (string) false is ""
 
Compound Data Types
	Array are containers of ordered data elements
	Object are containers of both data and code
	NULL indicates that a variable has no value.

Converting Between Data Types

$d = 10.88;
echo (int) $x; outputs 10

Variables
$name = valid
$1name = invalid
$_1var = valid

Type casting
*/

$obj = (Object) ["foo"=> "bar", "baz" => "bat"];
//var_dump($obj);

$var = '123';
/*
intval() cast the given variable to an integer
floatval() cast the given variable to a float
strval() cast the given variable to a string
boolval() cast the given variable to a boolean. Added in PHP 5.5.
settype() cast the given variable to a given typ

Detecting Types
is_int() checks for integers
is_float() checks for floats
is_string() checks for strings
is_bool() checks for booleans
is_null() checks for nulls
is_array() checks for arrays
is_object() checks for objects

*/

if(is_numeric($var))
//echo "sou numerico";


/*
Variable Variables 
*/

$name = "box";
$$name = "chair";

//echo $box; // chair

//listing
$name = "789";  // 123 variable name would normally invalid
$$name = '456';
//echo ${'789'}; // finally using curly braces you can output '456'

/*
Inspectiong Variables

Using print_r();
Better option var_dump()
debug_zval_dump()
*/

//var_export(array(1,2,3,5)); // to create a the same variable value

/*
Determing if a Variable Exists
*/

if(isset($name)){ //return true if a variable exists
	/*do somethin*/
}else if(!isset($name)){
	/*this variable does not exists*/
}

$true = "0";
if(empty($true)){ //return true if the value is NULL or false, empty string, array, integer 0 and string "0"
//true
}

//PHP 5.5 accpet any valid expression
function oneFunction(){}
if(empty(oneFunction())){
  //true
}

/*
Constants

*/ 
define('EMAIL', 'joao@mail.com');
define('2EMAIL', 'joao@mail.com'); // invalid name
const PHONE = 12345; //also you can use const
 

/*
Operatos 

Arithmetic Operators
+ Addition 
- Subtraction
+ Multiplication
/ Division
% Modulus 
Power ** PHP 5.6

Incrementing/Decrementing operators

$a = 1;
echo $a++; outputs 1, $a is now equal to 2
echo ++$a; outputs 3, $a is now equal to 3
echo --$a; output2 2, $a is now equal to 2
echo $a--; outputs 2, $a is now equal to 1

$a = (int) 'Test'; // $a == 0
echo ++$a; // outputs  1

String Concatenation Operator

$string = "foo" . "bar"; // = foobar
String2 = "baz";
String .= $string2; // outpus foobarbaz // the same of $string = $string . $string2

Bitwise Operators
To manipulate bits of data.
Only to work with integer numbers

Simplest bitwise is NOT, ~
*/

$x = -2;
echo ~$x; // -1

/*

& AND 
| OR
^ bitwise XOR (exclusive OR)

<< Bitwise left shift  - shifts the left-hand operand's bits to the left by a number of positions equal to the right operand, inserting unset bit in the shifted position

>> Bitwise right shift - This operation shifts the left-hand operand's bits to the right by a number of positions equal to the right operand, inserting unset in the shifted positions.

easy way of multiplication
 
#x = 1;

echo $x << 1; //outputs 2
echo $x << 2; //outputs 4

$x = 8;

echo $x >> 1; //outputs 4
echo $x >> 2; //outputs 2


on a 32-bits machine
$x = 1;
echo $x << 32; // 0 
echo $x 8 pow(2,32); // 4,297,967,296

Assignment Operators

$variable = "value";
Addition
$variable = 1; 
$variable +=3; // contains the integer 4

//In this example

Referencing Variables
$a = 10;
$b = $a;
$b = 20;

echo $a; // outputs 10

By references 

$a = 10;
$b = &$a;
$b = 20;

echo $a; // Outputs 20

The assignment operator works by value for all data types excepts objects, which are always passed by refernce, regardless of whether the & operator is used or not.

By-reference activity is often slower that its by-value counterpart, because PHP use a clever "deferred-copy"

Comparasion operators
The result of a comparison operation is alwways a boolean value.

== equivalence, evaluates to true
=== Identity, evaluates to true if operands are of the same data type and have the same value
!= Not equivalent operator
!== Not-identical operator.

echo $a == 10;
you could write 
echo 10 == $a; 
The parser would have a thrown an error

Inequality Operators

< and <= less than, or less than or equal
> and >= greater than, greater than or equal to


