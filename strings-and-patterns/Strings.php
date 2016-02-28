<?php
$string = "Strings";

//Using 'Single' quotes
//Using "Double" quotes
//Using HEREDOC syntax

//Using NOWDOC
/*

echo "A variavel é uma {$string}";
echo 'A variavel é uma {$string}';
echo "<br><br>";

echo <<<ABC
here is a $string using HEREDOC, same that double quotes 
ABC;
//echo "<br><br>";
$ref = 5;
/*
echo <<<'END'
$$ref the only difference is the usage of single quotes in the begining
END;
echo "<br><br>";
//QUESTION 
//WHAT IS THE OUTPUT OF THE FOLLOWING CODE?
//
echo <<<'END'
$$ref
END;
//ANSWER $$ref
echo "<br><br>";

//substr()
//sinais negativos - da direita para esquerda
//what is the output of the following code?
echo substr("123456",-4,-2);
//answer 34


//strpos()
//returns the position of the first occurrence or false
//0 means that there was a match at position zero
//false means no match was made

//Which PHP function os emulated by the following piece of code?
/*
$x; $y = 0;
$pos = 0;

while(($pos = strpos($x,$y, $pos)) !==false ){
	$xs++;
	$pos++;
}*/
// = substr_count()

//substr()
//returns a substring
//negative start value = counting starts at the end of the string
//negative length = characters are cut off the end
/*
$str = 'Hello World';
echo substr($str, -1, 2);
//b = because if the second parameter is negative it starts at the end of the string and works backwards

//Comparing Strings

//Operator == Comparison including data type conversino
//Operator === Comparison includin data type check
//strcmp() case-sensitive compartison
//strcasecmp case-insensitive comparison
// 0 if equal 
// not 0 if inequal
// strcmp($a,$b) + strcmp($b + $a) == 0
// The variables $a and $b are both strings.
// what is the output of the following PHP command?
// echo ($a === $b) * strcmp($a, $b);
// answer = 0

//levenshtein() = distance between string
// similiar_text() = Similarity of two strings
// echo levenshtein('hand', 'hand'); //1
// echo similar_text("hand", "hang"); //3

// Phonetic Functions
// //only english
// //metaphone(): metaphone key of a string
// echo metaphone ("boatrace"); //BTRS
// echo metaphone ("bowtrace"); //BTRS

// //soudex(): Soundex value of a string
// echo soundex("boatrace");
// echo soundex("bowtrace");

// metaphone() uses english pronounciation rules, so often better suited the more general soundex()

//COUNTING STRINGS
//Number of characters 
//strlen
//Do not confuse with count() (array funcion)!
//Number of words
//str_word_count(string)
//str_word_count(strings, true) yields array with all single words

//Strings And Arrays
//explode(" ", "1 2 3") == array("1","2", "3")
//implode(" ", array("1","2","2")) == "1 2 3"

//What is the return value of the following code?
//echo count(explode(".","3 ... 2 ... 1 ... ignition!")); answer 10
*/
 

//Formatted Outup
/*
printf(); Prints a formatted string 
sprintf(); returns a formatted string
vprintf(); Prints a formatted string, placeholder values supplied as an array 
vsprintf(); returns a formatted string, placeholder values supplied as an array 
sprintf() Sends a formatted string to a resource 
*/

//Formatted output
/*
$sql = sprintf("INSERT INTO accesslog (timestamp) 
	values ('%s')", date('ymdhis'));

$sql2 = vsprintf("INSERT INTO accesslog (accessdate, accesstime)
	VALUES ('%')", array(date('Ymd'), date('His') );

Selected Formatting Characters 

	%b (binary)
	%d (decimal), %nd(n digits)
	%e (scientific notation)
	%f (float)¨, %.nf (n decimal numbers)
	%o (octal)
	%s (string)
	%x/%X (hexadecimal a-f/AF)
*/

// Regular Expression
/*
	A regular expression describes a pattern
	Looking for patterns is more powerful than looking for (static) strings though it comes at a cost to performance
	PHP supports PCRE(Perl-compatible regular expressions)

REGEX basics

Delimiter
	At the beginning and the end of each pattern
	Usually / or # or !
Literals
	Any character
		/abcde/ stands for "abcde"
		use the backslash for escaping /PHP\/FI/
Boundaries
	^	(start of a line, though not necessarily start of the string)
	$	(end of a line, though not necessarily en of the string)
	\A	(start of the string)
	\Z	(end of the string)	
	\b	(start or end of a word)	
	\B	(not start or end of a word)	

Character classes
	Delimited with[]
	[listofcharacters]
		Ex: [aeiou] for vowels
		Ex: [^aeiou] for no vowels
		Ex: [0-9] for digits
	You can mix and match [0-9aeiou] (digits and vowels)

Built-in character classes
	\d  (digit)
	\D  (no digit)
	\s  (whitespace)
	\S  (no whitespace)
	\w  (letter, digit, underscore)
	\W  (no lotter or digit or underscore)
	.	(any character)

	May or may not match CR|LF depending on whether PCRE_DOTALL is set

Quantifier
	*	(any number of times)
	+	(any numer of times, at least once)
	?	(0 or 1)
	{n}	(n times)
	{,m}(at max m times)
	{n,m}(at least n times, at max m times)

Alternatives 
	!(separates alternative patterns)
	/[aeoiou] \d/ (a vowel or digit)
	/a|b/ (a or b)


Regular expressions (especially *) are "greedly"
	The maximum match is returned
	Therefor, you usually need parentheses with alternatives
	/expre1(expr2|expr3)expr4/
	PHP later allows access to the contents of specific parentheses
	Non greedly quantifier *? and +?
*/

//Parttern matching

	preg_match(pattern, subject)
	Return value: Number of matches 
		but: search ends after the first match
		Therefore return value 0 or 1
	Match details: third parameter
		preg_match($pattern, $string, &$matches)
			$matches[0]: Complete match
			$matches[1]: First submatch
			...

	preg_match_all($pattern, $string, $matches): Returns all matches

	Return value is an array of matches 
		Every array element is like a return value from preg_match()

	preg_replace(pattern, replacement, subject)

	Replace pattern may contain references references to matches or submatches:

	\0 = complete match, \1 = first match...

echo preg_replace('/PHP \d.\d.\d/', 'Yet another verion', "PHP 5.5.0 was released");

echo preg_replace('/(\w+) (\w+)/', '\2, \1', 'Rasmus Lerdof'); //Lerdof, Rasmus

//replacing with a callback function 
preg_replace_callback(pattern, callback, subject)

callback function receives the match array and returns the replacement string

preg_replace_callback('/.*/', 'cb', $testInput);

function cb($match){
	return strtolower($match[0]);
}


//Encoding
/*
Some Language character set can be represented with singlebyte
encodings (based on 8-bit values, Ex: Latin-based languages)

Othes require multibyte encondings because of their complexity(Ex: Chinese logographic character set)

Operating with strings in multibyte encoding requires using special function (mbstring) or the characters will display incorrectly


Existing applications built in a singlebyte environment, utilizing functions like substr() and strlen(), will not work properly in multibyte environments 

Need to employ function Overloading to convert singlebyte function
awaereness to a multibyte equivalent(Ex: mb_substr(), mb_strlen())

mbstring Module:
	Handles character encoding conversion
	
	Designed unicode-based (UTF-8, UCS-2) and some single-byte encodings
	
	Module must be enabled using config option (not a default extension)

	mb_check_encoding() will verify whether the string is valid for the specified encoding

*/

?>