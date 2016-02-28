<?php

namespace helloworld\lib;
const HWCONST = 'Constant value with no expressions';

function MyFunc(){
	return __FUNCTION__;
}

class MyClass{
	static function World(){
		return __METHOD__;
	}
}

print __NAMESPACE__;