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
echo '<pre>';

var_dump($date); 