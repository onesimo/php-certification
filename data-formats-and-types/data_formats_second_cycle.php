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

Enconding Data
*/
class User implements JsonSerializable
{
	public $first_name;
	public $last_name;
	public $email;
	public $password;

	function jsonSerializer(){
		return [
			"name" => $this->first_name. ' '.$this->last_name,
			"email_hash" => md5($this->email),
		];
	}
}

/*
Now, when we call json_encode() on instance of your User class, we get our custom back, given a user instance that looks, like this.
*/
