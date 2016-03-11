<?php  
/*
Looking at the following code, which classes shoud be declared as abstract?
*/

class A{
	abstract function x();
}

interface B{
	function Y();
}

class C extends A implements B{
	function Y(){} 
}

class D extends A{
	function Y(){} 

}

class E extends D implements B{
	function x(){}
}


/*

A A,B,C,D,E

B A,C,D,E

C A,C,D // correct

D C,D


#explicacaoincorreta

*/

?>