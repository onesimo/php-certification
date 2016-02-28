<?php  
/*
What is the output of this code?
*/

Class myClass{
	public $member = "ABC";
	static function showMember(){
		var_dump($this->member);
	}
}

myClass::showMember();

/*
A NULL

B string(3) "ABC"

C string(0)""

D None of the above


The static method has his own context, so it is not possible to acess the attribute member with this.

*/


?>