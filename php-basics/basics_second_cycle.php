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
echo (int) '41sd';
