<?php

// namespace helloworld\lib;
// const HWCONST = 'Constant value with no expressions';

// function MyFunc(){
// 	return __FUNCTION__;
// }

// class MyClass{
// 	static function World(){
// 		return __METHOD__;
// 	}
// }

// print __NAMESPACE__;
/**/

namespace my\name;

class MyClass{}
function myfunction(){}
const MYCONST = 1;
$a = new MyClass;

$c = new \my\name\MyClass; //see "Global space" section

$a = strlen('hi'); // see "using namespace: fallback to global // function/constant" section

$d = namespace\MYCONST;


$d = __NAMESPACE__.'\MYCONST';

echo constant($d);
/*
namespace app\a{
	class one {
		public static function _1(){
			echo ' a one _ 1';
		}
	}
}

namespace app\b{
	class one{
		public static function _2(){
			echo ' b one _2 \n ';
		}
	}
}

namespace app{
	echo a\one::_1();
	echo b\one::_2();
	echo a\two::_1();
}

namespace app\a{
	class two{
		public static function _1(){
			echo 'a two _1 \n';
		}
	}
}
*/

