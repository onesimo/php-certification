<?php  
/*
What is the output of this code?
*/

interface myBaseClass1{
	public function doSomething();
	public function specialFunction1();
}

interface myBaseClass2{
	public function doSomething();
	public function specialFunction2();
}

class myClass implements myBaseClass1, myBaseClass2{

	function mySpecialFunctions1(){
		return '...';
	}
	function mySpecialFunctions2(){
		return '...';
	}
}

$a = new myClass();
$a->doSomething();

/*

A ...

B Parser error

C Fatal error // correct 

D None of the above

*/

#explicacaoincorreta


?>