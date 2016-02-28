<?php
//What is the output of this code?
class A{
	protected $a = 45;
	function a(){
		echo $this->a++;
	}
}

class B extends A{
	protected $a = 10;
	function b(){
		echo $this->a++;
		$this->a();
	}
}

$b = new B(); //1011
$b->b(); //1213

/*
A 10111213

B 1011

C 101

D 12
*/