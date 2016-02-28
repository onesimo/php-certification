<?php  
/*
Given the class definition below, what is the correct way to instantiate the class below?
*/

class Person{
	function __construct($name)
	{
		$this->name = $name;
	}
}

/*

A $p = Person ("John");

B $p = new Person();

C $p = new Person("name"=>"Johon")

D $p = mew Person("John") // Correta

*/

?>