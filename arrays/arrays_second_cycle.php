<?php
//Array Basics

$x = array(10,30,10);
$x = array('a'=> 45,'b'=> 23, 'c'=> 2, 'd'=> 12,);

$x[] = 789;
$x['aa'] = 65;


//Short ARray Syntax

$b = [10,54,65];
$b = ['a'=>10,'b'=>12, 'c'=>45, 'd'=>32];


$a = array(2 => 5);
$a[] = 'a';// will have a key of 3

$a = array('4' => 5, 'a' => 'b');
$a[] = 44; //this will have a key of 5

//Multi-dimensional Arrays

$array = array();

$array[] = array('Alves','Oliveira');
$array[] = array('Joao', 'Maria');

$name = $array[1][0] . ' '. $array[0][0]; // Joao Alves


$data = array('Jose', '21', 'M');

//List()
list($name, $age, $sex) = $data;

$a = array(1,2,3);
$b = array('a' => 1, 'b' => 2, 'c' => 3);
/*
var_dump($a + $b);
array(6) {       
  [0]=>          
  int(1)         
  [1]=>          
  int(2)         
  [2]=>          
  int(3)         
  ["a"]=>        
  int(1)         
  ["b"]=>        
  int(2)         
  ["c"]=>        
  int(3)         
}                
*/
$a = array(1,2,3);
$b = array('a' => 1, 'b', 'c');

/*
var_dump($a + $b);
array(4) {
  [0]=>
  int(1)
  [1]=>
  int(2)
  [2]=>
  int(3)
  ["a"]=>
  int(1)
}

Comparing Arrays

Array-to-array
*/

$a = array(1,2,3);
$b = array(1 => 2, 2 =>3, 0=>1);
$c = array('a' => 1, 'b' => 2, 'c' => 3);

var_dump($a == $b); // True
var_dump($a === $b); // false
var_dump($a == $c); // False
var_dump($a === $c); // False

var_dump($a != $b); //False
var_dump($a !== $b); //True

/*
The inequality operator only ensures that both arrays contain the same elements with the same keys, whereas the non-indenity operator also verifies their position


Array Iteration
*/




