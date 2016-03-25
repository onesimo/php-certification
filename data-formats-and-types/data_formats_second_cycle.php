<?php 
/*
JSON - JavaScript Object Notation

Enconding Data
*/
$array = ['foo', 'bar', 'baz'];

//echo json_encode($array); //["foo","bar","baz"]

//String keys

$array =  ['one' => 'foo', 'two' => 'bar', 'three' => 'baz'];

//echo json_encode($array);  // {"one":"foo","two":"bar","three":"baz"}

/*
json_encode suports numerous options, most of which were added in php 5.3

JSON_HEX_TAG - convert all &lt, to their hx equivalent
JSON_HEX_AMP - convert all &amp to their hex equivalent
JSON_HEX_APOS - convert all apostrophes
JSON_HEX_QUOT - convert all straight double quotes
JSON_FORCE_OBJECT - outpus an objects intead of an array
JSON_NUMERIC_CHECK - encodes numeric strings as numbers
JSON_BIGINT_AS_STRING - encodes large integer as string
JSON_PRETTY_PRINT - use whitespace to make it easier  to read
JSON_UNESCAPED_SLASHES - don't escape /
JSON_UNESCAPED_UNICEDE - Do not convert unicode characteres to escape sequences (\uXXXX)

JSON OPTIONS
*/

$array =  [
		'name' => 'David Smith', 
		'age' => '26',
	];

$options = JSON_PRETTY_PRINT | 
		   JSON_NUMERIC_CHECK | 
		   JSON_FORCE_OBJECT;
/*ECHO "<PRE>";
echo json_encode($array, $options);  // 
output:

{
    "name": "David Smith",
    "age": 26
}

Enconding Objects
*/
class User implements JsonSerializable
{
	public $first_name;
	public $last_name;
	public $email;
	public $password;

	function jsonSerialize(){
		return [
			"name" => $this->first_name. ' '.$this->last_name,
			"email_hash" => md5($this->email),
		];
	}
}

/*
Now, when we call json_encode() on instance of your User class, we get our custom back, given a user instance that looks, like this.
*/


//print_r(json_encode(new User())); //{"name":" ","email_hash":"d41d8cd98f00b204e9800998ecf8427e"}

/*
Decoding Data
*/

$json = '{ "name": "Jhon", "age": 25}';
$data = json_decode($json);
/*
var_dump($data);
outpus:
object(stdClass)#1 (2) { ["name"]=> string(4) "Jhon" ["age"]=> int(25) }

If you want to force json_encode to return an array, just pass true for the second argument assoc
*/

$data = json_decode($json, true);
/*
outups
var_dump($data);
array(2) { ["name"]=> string(4) "Jhon" ["age"]=> int(25) }

Dates and Times

*/

$date = new \DateTime();
/*echo '<pre>';
print_r($date);

DateTime Object
(
    [date] => 2016-03-22 03:54:18.000000
    [timezone_type] => 3
    [timezone] => Europe/Berlin
)*/
$date = new \DateTime('now');
/*echo '<pre>';
print_r($date);
DateTime Object
(
    [date] => 2016-03-22 03:54:18.000000
    [timezone_type] => 3
    [timezone] => Europe/Berlin
)*/

//current time yesterdat
$date = new \DateTime('yesterday');

//current time, two days ago
$date = new \DateTime('-2 days');

//current time, same day last week
$date = new \DateTime('last week');

//current time, same day 3 weeks ago
$date = new \DateTime('-3 week');

$timezone = new \DateTimeZone("America/Sao_Paulo");

//Specified timezone
$date = new \DateTime('3 week ago', $timezone);


//changing the current date
//$date->setDate('2016', '01','01');
//$date->setTime('01','02','03');
//$date->setTimestmp(''); unitimstamp
$date->setTimeZone(new \DateTimeZone("America/Sao_Paulo"));

/*
Retrieving Date/Time
*/

/*
$date->format() - acceps the same values as the date()
*/

 
$date->format('Y-D/m');
//echo ($date->format('Y-d-m')); //2016-01-03

date(DateTime::ATOM); //2016-03-23T03:44:15+01:00
date(DateTime::COOKIE); //Wednesday, 23-Mar-2016 03:44:55 CET
date(DateTime::RSS); //Wed, 23 Mar 2016 03:46:10 +0100
date(DateTime::W3C); //2016-03-23T03:46:43+01:00

/*
Handling Custom Format
*/
$ambiguousDate = '10/11/12';
$date = \DateTime::createFromFormat("d/m/y", $ambiguousDate);

/*
DateTime Comparing 
*/
$date = new \DateTime("2014-05-31 1:30pm EST");

$tz = new \DateTimeZone("Europe/Amsterdam");
$date2 = new \DateTime("2014-05-31 8:30pm", $tz);

if($date == $date2){
	//echo "these dates are the same date/time"
}

/*
DateTime Math
*/
$date = new \DateTime();
//$date->modify("+1 month"); //more one month from now
/*
Working with intervals
$date->add(); $date->sub();


$interval = new \DateInterval('PiY3M4DT45M');
// Add 1 year, 3 mothns, 4 days, 45 minutes
//$a = $date->add($interval);

// subtract 1 year, 3 mothns, 4 days, 45 minutes
//$a = $date->sub($interval);


/*
Difference between Dates
DateTime->diff();

*/
$joao = new \DateTime("1984-05-31 00:00", new \DateTimeZone("Europe/London"));
$maria = new \DateTime("2014-04-07 00:00", new \DateTimeZone("America/New_York"));

$diff = $joao->diff($maria);
/*
var_dump($diff);
object(DateInterval)#7 (15) {
  ["y"]=>
  int(29)
  ["m"]=>
  int(10)
  ["d"]=>
  int(7)
  ["h"]=>
  int(5)
  ["i"]=>
  int(0)
  ["s"]=>
  int(0)
  ["weekday"]=>
  int(0)
  ["weekday_behavior"]=>
  int(0)
  ["first_last_day_of"]=>
  int(0)
  ["invert"]=>
  int(0)
  ["days"]=>
  int(10903)
  ["special_type"]=>
  int(0)
  ["special_amount"]=>
  int(0)
  ["have_weekday_relative"]=>
  int(0)
  ["have_special_relative"]=>
  int(0)
}

Extensible Markup Language(XML)

*An XML document can be well-formed an not valid, but it can never be valid and not well-formed.

A well-formed XML document can be as simple as 

<?xml version="1.0"?>
<message> Hello, World! </message>


A valid document xml 
<?xml version="1.0"?>
<!DOCTYPE message SYSTEM "message.dtd">
<message> Hello, World! </message>


Procedural Code
Load an XML string

*/
$xmlstr  = file_get_contents("library.xml");
$library = simplexml_load_string($xmlstr);
//Load an XML file
$library = simplexml_load_file("library.xml");

/*

Object-oriented (OOP) environment
Load an XML string 
*/
$xmlstr  = file_get_contents("library.xml");
$library = new SimpleXMLElement($xmlstr);

//Load an XML file
$library = new SimpleXMLElement("library.xml", NULL, true);
 
/*
Acessing Children Atribute
*/
foreach ($library as $book) {	
/*	echo $book['isbn'] . "\n";
	echo $book->title . "\n";
	echo $book->author . "\n";
	echo $book->publisher . "\n\n";
*/
}

/*
Iterating wit SimpleXML
SimpleXMLElement::children()

*/
foreach ($library->children() as $child) {
	//echo $child->getName(). ": \n";

	//Get attributes of this element
	foreach ($child->attributes() as $attr) {
		//echo ' '.$attr->getName(). ': '.$attr. "\n";
	}

	//Get children
	foreach ($child->children() as $subchild) {
		//echo ' '.$subchild->getName(). ': '.$subchild. "\n";
	}
}
/*
XPath Queries



*/