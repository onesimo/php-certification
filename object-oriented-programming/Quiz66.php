<?php  
/*
What is the output of this code?
*/

class A{
	static function who(){ echo __CLASS__;}
	static function test(){
		echo  __CLASS__.
		static::who(); //Calling who by B, the class in execution
		self::who();
	}
}

class B extends A{
	static function who() { echo __CLASS__}
}

B::test(); 

/*

A ABA //correct

B AAA

C BBB

D ABB

*/

?>