<?php 
require "example01.php";
use \foo\strlen;

//echo  strlen("len");

//fully-qualified name

$string = new \Ds\String\Unicode("asdf as asdfdasdf ass asdfdsa");

use Ds\String\Unicode;

$string = new Unicode("asdf as asdfdasdf ass asdfdsa");


use Ds\String 

$string = new String\Unicode("asdfdasdf assdfa asdfasdf");

// Dynamic Usage 

$class  = "\Ds\String\Unicode";
$string = new $class("qwerq werlk jasd");


//magic class construct

namespace Ds\String;
$class = Unicode::CLASS; // \Ds\String\Unicode

/*
The constant name CLASS is case=insentiive, and can also be written Unicode::Class or Unicode::class

Aliasing
*/
Use Ds\String\Unicode as String;

$string = new String("asdfasdf asdfa sdfasdf");

/*
Importing functions and Constants
*/
namespace Unicode\Tools;
const CHARSET = 'UTF-8';

public function strlen(){
	if(extension_loaded('iconv')){
		return \iconv_strlen($this->string);
	} elseif (extension_loaded('mbstring')) {
		return \mb_strlen($this->string);
	}

	return 'teste';
}

/*
Accessing a namespaced functions 
*/

use Unicode\Tools as UT;

$charset = UT\CHARSET;

UT\strlen("ASDFASDFASDFASDF");

//or, fully-qualified 
$charset = \Unicode\Tools\CHARSET;
\Unicode\Tools\strlen();