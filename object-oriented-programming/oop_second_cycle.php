<?php

/*
Object-Oriented Programming

Declaring a Class
*/
class myClass{
	//Class contents go here 
}

/*
Instantiating an Object
*/

$myClassInstance = new MyClass();

$className = 'myClass';
$myClassInstance = new $className();

/*
Duplicating Objects
*/
$myClassInstance = new MyClass();
$copyInstance = $myClassInstance; /*will reference the same object*/

$myClassInstance = new MyClass();
$cloneClass= clone $myClassInstance; /*copy of an object*/


/*
Listing Class Inheritance: 
*/


class a{

	function test(){
		echo __METHOD__. " called \n";
	}

	function func(){
		echo __METHOD__. " called \n";
	}
}

class b extends a{

	function test(){
		echo __METHOD__. " called \n";
	}
}

class c extends b {
	function test(){
		parent::test();
	}
}

class d extends c{

	function test(){
		b::test();
	}
}

$a = new a();
$b = new b();
$c = new c();
$d = new d();

$a->test();//outputs "a::test called"
$b->test();//outputs "b::test called"
$b->func();//outputs "a::func called"
$c->test();//outputs "b::test called"
$d->test();//outputs "b::test called"

/*
Class Methods and Properties
*/