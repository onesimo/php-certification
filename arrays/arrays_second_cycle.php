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
=======

The inequality operator only ensures that both arrays contain the same elements with the same keys, whereas the non-indenity operator also verifies their position


Array Iteration - THe array Pointer

*/
$array = array('foo' => 'bar', 'baz', 'bat' => 2);

//displayArray($array);

function displayArray($array){
  reset($array);

  while (key($array) !== null) {
    //echo key($array). " : ".current($array).PHP_EOL;
    next($array);
  }
}

$array  = array (1,2,3);
end($array);

//Moving pointer back wards
while (key($array) !== null) {
  //echo key($array). " : ".current($array).PHP_EOL;
  prev($array);
}

/*
An Easier Way To Iterate
With foreach
*/
$array = array('foo', 'bar', 'baz');

foreach ($array as $key => $value) {
  //echo "$key: $value ".PHP_EOL;
}

/*
Modifying array elements by reference 
*/
$a = array('x' => 'a',10 => 'b','c');
//var_dump(array_reverse($a));
/*

*/



$array  = array (1,2,3);

foreach ($array as $key => &$value) {
  $value += 1;
}

//var_dump($array); // 2,3,4



$array  = array ('zero','one','two');
/*
Beware when modifying array elements by reference
*/

foreach ($array as &$value) {
  # code...
}

foreach ($array as $value) {
  # code...
} 
/*
print_r($array); 
Array
(
    [0] => zero
    [1] => one
    [2] => one
)
this is not a but, there is a logical explanation

- The list construct can also be used with foreach loops 

Passive Iteration

array_walk nad array_walk_recursive used to iterate an array with uder-defined function
*/

function setCase(&$value, &$key){
  $value = strtoupper($value);
}

$type = array('internal', 'custom');
$output_formats[] = array('rss', 'html', 'xml');
$output_formats[] = array('csv', 'json');

$map = array_combine($type, $output_formats);

array_walk_recursive($map, 'setCase');

/*
var_dump($map); 


results:
array(2) {
  ["internal"]=>
  array(3) {
    [0]=>
    string(3) "RSS"
    [1]=>
    string(4) "HTML"
    [2]=>
    string(3) "XML"
  }
  ["custom"]=>
  array(2) {
    [0]=>
    string(3) "CSV"
    [1]=>
    string(4) "JSON"
  }
}


SORTING ARRAYS

sort() - from the lowest to highest based on its values. destroy o all the keys
asort() - same as sort keeping the keys

*/
$array = array('a'=>'foo', 'b'=>'bar', 'c'=>'baz');
sort($array);
/*
array(3) {
  [0]=>
  string(3) "bar"
  [1]=>
  string(3) "baz"
  [2]=>
  string(3) "foo"
}

*/

$array = array('a'=>'foo', 'b'=>'bar', 'c'=>'baz');
sort($array);
/*
array(3) {
  ["b"]=>
  string(3) "bar"
  ["c"]=>
  string(3) "baz"
  ["a"]=>
  string(3) "foo"
}


sort and asort accpet a secon, optional paramenter

SORT_REGULAR - Default behaviour
SORT_NUMERIC - convert each element to a numeric
SORT_STRING  - compare all element as string
SORT_LOCALE_STRING - all element as string based on current locale
SORT_NATURAL - "natural ordering" like natsort funct
SORT_FLAG_cASE - combined with SORT_STRING OR SORT_NATURAL, compare all elements as case-insensitive strings.


sort and asort are ascending order, to sort in descending order
youse rsort and sort()

natsort() - unlike sort(), maintain all the key-value associations in the array. A case-insensitive version of the function, natcasesort() also exists, but there is not reverse-sorting equivalent of rsort().
*/
$array = array('10t','2t','3t');
natsort($array);
/*results:
var_dump($array);

array(3) {
  [1]=>
  string(2) "2t"
  [2]=>
  string(2) "3t"
  [0]=>
  string(3) "10t"
}
Other Sorting Options
sort by key

ksort and krsort - analogously to sort() and rsort()

*/
$a = array('a' => 30, 'b' => 10, 'c' => 22);
krsort($a);
/*
var_dump($a);

array(3) {
  ["c"]=>
  int(22)
  ["b"]=>
  int(10)
  ["a"]=>
  int(30)
}

User-defined comparison

usort - lost all keys
*/

function myComp($left, $right){
  //Sort according to the lenght of the value
  //If the length is the same, sort normally

  $diff = strlen($left) - strlen($right);

  if(!$diff){
    return strcmp($left, $right);
  }

  return $diff;
}

$a = array('three','2two','one','two');
usort($a, 'myComp');

/*
var_dump($a);


Key the key you can use uasort(), and sort by key using uksort()

array(4) {
  [0]=>
  string(3) "one"
  [1]=>
  string(3) "two"
  [2]=>
  string(4) "2two"
  [3]=>
  string(5) "three"
}

*/


function myComp2($left, $right){
  //Sort according to the lenght of the value
  //If the length is the same, sort normally

  $diff = strlen($left) - strlen($right);

  if(!$diff){
    return strcmp($left, $right);
  }

  return $diff;
}

$a = array('three','2two','one','two');
uasort($a, 'myComp2');

/*
var_dump($a);

array(4) {
  [2]=>
  string(3) "one"
  [3]=>
  string(3) "two"
  [1]=>
  string(4) "2two"
  [0]=>
  string(5) "three"
}

The Anti-Sort
To scramble its contents so that the keys are randomized.

suflle();

*/

$cards = array(1,2,3,4);
shuffle($cards);
/*
var_dump($cards);

The results will be different every time:
an example:
array(4) {
  [0]=>
  int(2)
  [1]=>
  int(3)
  [2]=>
  int(1)
  [3]=>
  int(4)
}
The key assciation is lost

array_keys() - returns an array whose values are the keys of the array passed to it.
*/

$cards = array('a' => 10, 'b' => 12, 'c' => 13);
$keys = array_keys($cards);

shuffle($keys);

foreach ($keys as $value) {
    //echo $value. ' - '.$cards[$value].PHP_EOL;
}
/*

array_rand() extract individual elements from the array at random, which returns one or more random keys from an array
*/

$cards = array('a' => 10, 'b' => 12, 'c' => 13);
$keys = array_rand($cards,2);
/*
var_dump($keys);
results or something like this:

array(2) {
  [0]=>
  string(1) "a"
  [1]=>
  string(1) "b"
}

Arrays as Stacks, Queus and Sets
as stack
*/


$stack = array();
// array_push() add elements in array
array_push($stack,'bar', 'baz');

var_dump($stack);

//extract the last element
$last_in = array_pop($stack);
var_dump($last_in);

/*
as queue (FIFO)
add elements at the beginning using array_unshift() and remove them again using array_shift();
*/

$queue = array('qux', 'bar', 'too');
$first_element = array_shift($queue);
var_dump($queue);