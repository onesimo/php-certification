<?php 
//echo "<hr><font size='25'><b><pre>";
//ARRAYS - formas criar um array

// Numbers as index
$array = array('a','b','c' );
$array_keys = array(0 => 'a', 1 =>'b' ,3 => 'c' );

//String as index
$array = array(
	'MARIA' => 'PROFESSORA',
	'JOÃO' => 'ENGENHEIRO'
 );

//Short syntax
$array = ['a','b','c'];
$array = [0 => 'a', 1 => 'b', 2 => 'c'];

//What is th output of the following code?

$array = array('three' => 3, "Two" =>2, "One" => 1);

//importante sort em array assiciativo perde as chaves
sort($array); 
$keys = array_keys($array); // um array com novas chaves


//Given the following array, to acess element angela in array

$array = array('john', 4=>'peter', 'angela');
/*
A echo $a[3];
B echo $array_values($a,3);
C echo $a[5] // correta
D echo $r = array_reverse($a, true); echo $r[0];
*/

// Filling array
// range() creates an array with values from an interval

$array = range (5,7); // array (5,6,7)
$array = range (5.1,7.3); // array (5.1, 6.1, 7.1)
$array = range (5,7,0.5); // array (5.0, 5.5, 6.5, 7.0)
/*
What is the output of the following code?

echo count(range(5.0, 3.0,1.7)); //Quando o primeiro parametro for maior ele decrementa

A 0
B 3
C 12 correta
D 13
E A runtime error, since 5.0 > 3.0

*/

/*
Splitting Arrays 
array_slice(array, offset) returns part of an array 
third parameter(optional): length
fourth parameter(option): indices are maintained
*/

$array  = array(1,2,3,4,5);

$array1 = array_slice($array, 2); //array(3,4,5);
$array2 = array_slice($array, 1, 3); //array(2,3,4);
$array3 = array_slice($array, 2, 3, true); //array(3,4,5); // terceiro paramentro somente para maenter os índices
/*
Negative offset (1st param): counting starts at end of the array 
Negative length (2nd param): Sequence will start $! elements from de end of the array 
*/

$array  = array(1,2,3,4,5);
$array1 = array_slice($array, -3); //array(3,4,5);
$array2 = array_slice($array, -4, -2); //array(2,3);

//Adding Elements 
//array_push() adds one or more elements at the end of the array 
//return value is the new number of the elemnts in array
$array  = array(1,2,3,4,5);
$array1 = array_push($array, 1, 5); //array(1,2,3,4,5,1,5);
 
// More efficiente $array $array[] = 4, $array[] = 5

//array_unshift adds or more elements at the begging of an array
//Existing elements are moved to the back
//Return value is the new number of elements in array

$array  = array(1,2,3,4,5);
$array1 = array_unshift($array, 1, 2); //$array = array(1,2,1,2,3,4,5) $array = 7

/*
Removing Elements

array_pop() removes the elements at the end of an array at the end of an array 
Array is provided by reference
return value is the remode element
*/

$array  = array(1,2,3,4,5);
$array1 = array_pop($array); //$array1 = 5, $array = (1,2,3,4)
// array_shift() removes the element at the beginging of an array 
// Existing elements are "moved to the front"
// Return value is the removed element

$array  = array(1,2,3,4,5);
$array1 = array_shift($array); //$array1 = 1 $array = (2,3,4,5)

//print_r($array);


//What is the output of the following code?
$myArray = array(7 => 1, 2, 3);
 	
 	$myArray[] = 4;
	$myArray[2] = 5;
	array_unshift($myArray, 6);

	//echo $myArray[7]; // null 

//loop and indices
for($i = 0; $i < 6; $i++){
	//print $myArray[$i];
}

//foreach with keys
foreach($myArray as $keys =>$values){
	//print $keys.":\n";
}

foreach ($myArray as $value) {
 //print $value.":\n";
}

$a = array();

//which code could be put into line 6 so that all array elements print? (choose two)
for($i = 0; $i < 10; $i++ ){
	$a[2* $i] = $i;
}

//A ira imprimi indices diferentes do array - falsa
for($i = 0; $i < (count($a)); $i++){
	//$x = $a[$i]; 
	//echo $x;
}
//B= irá imprimir todos valores do array - correta
foreach($a as $x){
	//echo $x;
}
//irá imprimis as chaves do array - falsa
foreach($a as $x => $y){
	//echo $x;
}
//irá imprimir valeres do array - counter_reset_value(	)
foreach($a as $y => $x){
	//echo $x;
}
//D all of above - falsa

//Looping Arrays

//Array walk = acess all element in an array

$GLOBALS['sum1'] = 0;
function somar($x){
	$GLOBALS['sum1'] += $x;
}

$a = array(1,2,3,4,5,6,7,8,9,10);
array_walk($a, 'somar');

//echo $GLOBALS['sum1'];


//Cheking for values
$array  = array(1,2,3,4,5);
$key = 1;
$element = 1;
//returns true or false
array_key_exists($key, $array);  //Is there an index $key in array $array?

in_array($element, $array); // IS there an $element in the array $array?

//returns keys of the array
$matriz = array_keys($array); //Array for all array indices

//returns the elements of array with numeric keys
$matriz = array_values($array); // Array of all array values
  
//print_r($matriz);
//Sorting

$array  = array(1,2,3,4,5,'a','joao', 'a');
//sort($array); // sort values aphabetically

/*
The second parameter provides the sorting mode
SORT_LOCALE_STRING: Sorting according to locale setting
SORT_NUMERIC: Numeric sorting
SORT_REGULAR: "Normal" Sorting (default)
SORT_STRING: Sorting as strings
*/
//---------------------------------------------------------REVISAR
//what is thte order now for the element in array $a?
$array = array(5,"43",2,"10");
sort($array,SORT_LOCALE_STRING);
/*A 2,5,10,43
B 2,5,"10", "43" coorreta
C 10, 2, 43, 5 
D "10",2, "43"
*/
//var_dump($array);

foreach($array as  $values){
    //echo gettype($value)."\n";
}

//---------------------------------------------------------REVISAR

// //More Sorting functinos

$array = array(6,10,8,4,5,1,7,3,9,2);
/*asort(); // Sort associative arrays (key-value relationship are maintained)
arsort(); // like asort(), but backwards 
ksort(); // Sorting by keys
krsort(); // like ksort, but backwards
rsort(); // like sort(), but backwaids
usort($array); // User-defined sortin - Related: uasort(), uksort()
*/
//print_r($array);

//Natural sorting

$array = array('script9.php', 'script10.php','script11.php',6);

// natsort($array);
// print_r($array);

//script9.php script10.php script.php
//also possible whem comparing strings strnatcmp(), strnatcasecmp();
/*
 Comparing Arrays

array_diff($array1, $array2); // compares two arrays
Returns value: an array with all elements in $array that dont appear in $b array2
*/
//related functions
//function use in uassoc and ukey
function a(){
    return -1;
}

$array1 = array(1,2,3,4,5);
$array2 = array(1,2,3,4);

//---------------------------------------------------------REVISAR funções com com callback

//não modifica as chaves
$e = array_diff($array1, $array2);
$a = array_diff_assoc($array1, $array2); // compare two values and keys
$b = array_diff_key($array1, $array2); // compare only keys
$c = array_diff_uassoc($array1, $array2,'a'); //like array_diff_assoc(), with user-defined compare funciton
$d = array_diff_ukey($array1, $array2,'a'); // like array_diff_key(), with user-defined compare funciont

//print_r($c);



//What is the output of the following code?
$array1 = array(048,057,067,047,057,067);
$array2 = array(47,57,67);

//OCTAL PARA DECIMAL 047 0*8(2) + 4*8(1) + 7*8(0) = 39

//echo count(array_diff($array1, $array2));

/*
A 0
B 2 
C 3
D 4 CORRETA
E 6
*/

//Merging Arrays

$array1 = array(1,2,3,4,5);
$array2 = array(1,2,3,4);
$array3 = array_merge($array1,$array2); 
//creates an array with the elements in $array1 and $array with new keys
//Indentical elements are replaced only with string índices


$array1 = array("e1"=>1,"e2"=>2,);
$array2 = array("e2"=>3,"e3"=>4);
$array3 = array_merge($array1, $array2);

//what is the output of the following code?
$array1 = array();
$array2 = array(1=> "data");
$result = array_merge($array1, $array2);
/*
A data
B 0 
C Array
D none of the above
*/
//Obs,: Quando você exibe ume uma índíce não existe é exibido um notice: Undefined variabçe
echo $resul;
 





