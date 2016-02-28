<?php  
/*
author:Onésimo Batista;  http://php.net/
*/
trait ezcReflectionReturnInfo{
	function getReturnType() { print 'trait - ezcReflectionReturnInfo'; }
	function getReturnDescription(){}
}

class ezeReflectionMethod {
	use ezcReflectionReturnInfo;

	public function __construct(){
		return $this->getReturnType();
	}
}

class ezcReflectionFunction extends ReflectionFunction{
	use ezcReflectionReturnInfo;
}


$classe = new ezeReflectionMethod;