<?php 

/*
Iterators  - allow you to iterate, or loop, over data structures

Simple Iterator


interface Iterator
{
	function current();
	function next();
	function rewind();
	function key();
	function valid();
}

Implementing the Iterator interface
*/ 
class myData implements Iterator
{
	private $myData = array(
		"foo",
		"bar",
		"baz",
		"bat");
	private $current = 0;

	function current(){
		return $this->myData[$this->current];
	}

	function next(){
		$this->current += 1;
	}

	function rewind(){
		$this->current = 0;
	}

	function key(){
		return $this->current;
	}

	function valid(){
		return isset($this->myData[$this->current]);
	}
}

$data = new myData();

 

foreach ($data as $key => $value) {
	//echo "$key: $value";
	//0: foo1: bar2: baz3: bat
}

/*
SeekableIterator interface



interface SeekableIterator
{
	function current();
	function next();
	function rewind();
	function key();
	function valid();
	function seek($index);
}

Recursive Iterator

Array of tree data
*/

$company = array(
	array("Acme Anvil co."),
	array(
		array(
		"Human Resourcs",
		array("Tom",
			"dick",
			"Harry"
			)
		),
		array("Accounting",
			Array("Zoe",
				"Ducan",
				"Jack",
				"Jane"
				)
			)
		)
	);

//print_r($company);


class Company_Iterator extends RecursiveIteratorIterator
{
	function beginChildren(){
		if($this->getDepth() >=3 ){
			//echo str_repeat(" \t", $this->getDepth() -1);
		}
	}

	function endChildren(){
		if($this->getDepth() >=3){
			//echo str_repeat("\t", $this->getDepth() - 1);
			//echo "</ul>".PHP_EOL;
		}
	}
}

class RecursiveArrayOBject extends ArrayObject
{
	function getIterator(){
		return new RecursiveArrayIterator($this);
	}
}

$it = new Company_Iterator (
	new RecursiveArrayOBject($company)
	);

$in_list = false;

foreach ($it as $item) {
	//echo str_repeat("\t", $it->getDepth());

	switch($it->getDepth()) {
		case 1:
			//echo "<h1> Company: $item </h1>".PHP_EOL; 
			break;
		case 2:
			//echo "<h2> Department: $item </h2>".PHP_EOL;
			break;
		default:
		//echo "<li>$item</li>".PHP_EOL;
	}

}

/*
Filtering Iterators
*/

class NumberFilter extends FilterIterator
{
	const FILTER_EVEN = 1;
	const FILTER_ODD = 2;

	private $_type;

	function __construct(
		$iterator, 
		$odd_or_even = self::FILTER_EVEN
	){
		$this->_type = $odd_or_even;
		parent::__construct($iterator);
	}

	function accept(){
		if($this->_type == self::FILTER_EVEN){
			return ($this->current() % 2 == 0);
		} else {
			return ($this->current() % 2 == 1);
		}
	}
}

$numbers = new ArrayObject(range(0,10));
$numbers_it = new ArrayIterator($numbers);

$it = new NumberFilter(
	$numbers_it, NumberFilter::FILTER_EVEN
	);

foreach ($it as $number) {
	//echo $number.PHP_EOL;
	/*
	0
	2
	4
	6
	8
	10
	*/
}

/*
Filtering with RegexIterator  
 

$dir = new DirectoryIterator("./_posts");
$it = new RegexIterator($dir,'/^.*\.(md|markdown)$/');

foreach ($it as $file) {
	# only files ending in .md or markdown
	# will be returned
}
 
Filtering with callbackFilterIterator
 

$dir = new DirectoryIterator("./_posts");
$it = new CallbackFilterIterator(
	$dir,
	function($value, $key, $iterator){
		$ext = pathinfo($value, PATHINFO_EXTENSION);
		return in_array($ext,['md','markdown']);
	}
);

foreach ($it as $file) {
	# only files ending in .md or markdown
	# will be returned
}
*/
function gen(){
	echo "one";
	yield "two";
	echo "three";
	yield "four";
	echo "five";
}

$generator = gen();
/*
$generator->rewind();

if($generator->valid()){
	//echo $generator->current(); //onetwo
}

foreach ($generator as $value) {
	//echo $value; //onetwothreefourfive
}
 
Generator for HTML tables
*/

function tableGenerator($data){
	if(!is_object($data) && !is_array($data)){
		return; //bail
	}

	yield '<table>'.PHP_EOL;

	foreach($data as $values){
		$return = '<tr>'.PHP_EOL;
		foreach ($values as $value) {
			$return .='<td>'.$value.'</td>'.PHP_EOL;
		}

		yield $return;
	}

	yield "</table>".PHP_EOL;
}

/*
Calling a generatr to output an HTML table
*/

$table = tableGenerator([
	['One','Two', 'Three'],
	[1,2,3],
	["I","II","III"],
	["a","b","c"]
]);

foreach ($table as $row) {
	echo $row;
}