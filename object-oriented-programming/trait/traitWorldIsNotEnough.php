<?php
 
trait HelloWorld{
	public function sayHello(){
		echo 'Hello World';
	}
}

class TheWorldIsNoEnough{
	use HelloWorld;
	public function sayHello(){
		//self::sayHello();
		echo 'Hello Universe!';
	}
}

$o = new TheWorldIsNoEnough();
$o->sayHello();