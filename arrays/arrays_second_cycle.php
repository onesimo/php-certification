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

/*
var_dump($a == $b); // True
var_dump($a === $b); // false
var_dump($a == $c); // False
var_dump($a === $c); // False

var_dump($a != $b); //False
var_dump($a !== $b); //True

The inequality operator only ensures that both arrays contain the same elements with the same keys, whereas the non-indenity operator also verifies their position


Counting, Searching and Deleting Elements
*/

$a = array(1,2,4);
$b = array();
$c = 10;
/*
echo count($a); //outputs 3
echo count($b); //outputs 0
echo count($c); //outputs 1
*/
is_array($b); //1 

$a = array('a' => 1, 'b' => 2, 'c' => NULL);
/*
var_dump(isset($a['a'])); // true
var_dump(isset($a['c'])); // false

The correct way to determine whether an array element exists is to use array_key_exists() intead.
var_dump(array_key_exists('c', $a)); //true
 
echo in_array('2', $a); //true

An element can be deleted from an array by unsetting it

unset($a['b']);
echo in_array(2, $a); //true

Flipping and Reversing

array_flip() swaps the value of each element of an array wth its keys
*/
$a = array('a','b','c');
//var_dump(array_flip($a));
/*
On the other hand, array_reverse() reverse the order of the array's elements, so that the last one appears first. keeping the keys
*/
$a = array('x' => 'a',10 => 'b','c');
var_dump(array_reverse($a));
/*

*/



