<?php

$a = 'String and Patterns'; 
/*
$a ? print('verdade'): print('mentira');
*/

//String and Patterns

//String 
/*
Using 'Single' quotes
Using "Double" quotes

Using HEREDOC syntax

 */ 
$heredoc = <<<HEREDOC
$a
Uses <<< operator, followed by an identifier (nothing eles)
Identifier contains only alphanumeric char or _; and starts with non-digit or_
Closin identifier must appear at the beginning of a line(firt column)
HEREDOC;

//Using NOWDOC syntax
$nowdoc = <<<'NOWDOC'
no parsing done inside $a
Also uses <<< operator, but identifier is placed in single quotes, 'EXEMPLE0'
Shares same rules around identifiers as with heredoc
NOWDOC;

//Quiz25

var_dump($heredoc);
