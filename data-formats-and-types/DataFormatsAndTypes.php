<?php 
//SimpleXML and DOM
/*
simplexml_import_dom(); // converrts a DOM node into a SimpleXML object
dom_import_simplexml(); // converts a SimpleXML object into a DOM (DOCUMENT OBJECT MODEL)

Predefined constants become available when the extension is dynamically loaded at runtime or when compiled into PHP 
Ex.: XML_ELEMENT_NODE defines node as a DOMELEMENT
XML_TEXT_NODE defines node as a DOMTEXT
*/

/*//Web Services 

Technology for machine-to-machine communication 
Standardization led to wide acceptance and use 
Based on XML 
Some special formats and protocols exit
*/

//SOAP 
//Extension used to write SOAP servers and clients
/*
Formerly: Simple Objet Access Protocol, new as SOAP 
Version 1.0 and 1.1 came out of the industry; Version 1.2 under de auspices of the W3C

Requires the LIBXML extension (enabled by default)

SOAP functions:
	is_soap_fault() checks whether a SOAP call has failed 
	use_soap_error_handler() Indicates whether to use an error handler 

Runtime configuration:
SOAP cache functions affected by php.ini settings soap.wsdl_cache_*
*/

//REST 
/* 
REpresentational State Transfer acronym
Design standard - set of 4 architectural principles
	Uses only HTTP
	Stateless 
	Exposes  URIs
	Transfer XML, JSON, or both 
Supports = lata types: ASCII strings, integers, booleans 
Uses HTTP "pg_set_error_verbosity()" GET, POST, PUT, DELETE 

REST and Request Headers Concepts:

Content-Type What is being provided
Accept What to expect in reponse

Status Codes 

1xx informational
2xx Success
3xx Redirection
4xx bad Request
5xx Server Error

Context Switching 

Refers to process of provideing different content based on criteria from the request

Analyzes the HTTP Request header / Request URI, and responds with appropriate output 

Commonly used for:
	Providing different output for requests originated via XMLHttpRequest
	Providing different output base on AccepHTTP headers(REST endpoints)

WSDL 
Web Service Description Language
XML format that contains all informatiom about a web service
* where
* Which methods 
* Data types 
* Return values 
* etc


Create a Web Service 
*/
//Class with business logic

Class WSMethod{
	function myMethod($param){
		return $param;
	}
}
//Register with server
/* 
$soap = new SoapServer('file.wsdl');
$soap->setClass('WSMethod');
// $soap->addFunction('NameOfFunction')

//Consume ma web Service

//Instance (using WSDL)
$soap = new SoapClient('file.wsdl');

//Then call methods
$soap->myMethod('Hello');
$soap->__soapCall('myMethod',array('Hello'));


//Debugging
/*
* __getLastRequest() returns the body of the last web service HTTP request 
* __getLastRequestHeaders() returns headers of the las web service HTTP request
* __getLastResponse() returns the body of the last web service HTTP response 
* __getLastReponseHeaders() returns headers of the last web service HTTP response 
*/

//Error Handling
/* 
//Using Handling
try{
	$soap = new SoapClient('file.wsdl');
	$res = $soap->myOtherMethod('Hello');
}catch(SoapFault $ex){

}

//using a function 
if(is_soap_fault($res)) {}

//JSON

JSON is acronym for JavaScript Objet Notation 
	*Data-interchange format 
	*Extension loaded by default 

Set of predefined constants available 
	
	Available when dynamically loaded at runtime or when compiled into PHP 
	PARTIAL LIST (ALL INTEGER)

	JSON_ERROR_NONE - confirms whether error occurred or not 
	JSON_ERROR_SYNTAX - indicates syntax error 
	JSON_ERROR_UTF8 - aids in detecting encoding issues
*/

//Functions 
//DECODES A JSON STRING
/*
json_decode($json, $assoc = false, $depth);

//RETURNS THE JSON REPRESENTATION OF A VALUE 
json_encode($values, $options)

//RETURNS THE LAST ERROR OCCURRED 
json_last_error()

//WHERE 
/*
$assoc: indicates whether objects should be converted into associative arrays(boolean)
$value: can be any type except a resource
$options: enconding options 
*/

/*
Date - Time 

Functions that retrieve the date and time from the PHP server 

Flexive date and time formatting due to 64-bit storage 

Function value reflect locale set on server,as well as special date adjustments (Ex: daylight saving time, leap year)

Runtime Configuration:

	date * functions are affected by PHP.INI setting 
	Ex: date.default_latitude; date.timesonepolar 


Predefined Constants 
DateTime constants provide standard date formats, in conjunction with a date function like date();

Constants format 

const string DateTime::cook 
const string DateTime::res 

Methods format 

public __construct([[string $time= 'now'[, DateTimeZone $timezone = NULL]]])

public DateTime add(DateInterval $interval)

public DateTime setDate(int $year, int $month, int $day);

Staitc Methods format(OOP-style examples)

ADD A SPECIFIED AMOUNT OF TIME TO A DATETIME OBJECT 
public DateTime DateTime::add(DateInterval $interval)

RETURN A NEW DATETIME OBJECT (INSTANTIATION)
public DateTime::__construct([[string $time= 'now'[, DateTimeZone $timezone = NULL]]])

RETURN A DATETIME OBJECT IN A SPECIFIC FORMAT 
public static DateTime::createFromFormat(String $format, string $time[, DateTimeZone $timezone])

RETURN A DATE FORMATTED ACCORDING TO A GIVEN FORMAT
public string DateTime::format(string format)
*/

$date = new DateTime('now', new DateTimeZone("America/Sao_Paulo"));
//$date->format('d/m/Y');

print_r($date);

