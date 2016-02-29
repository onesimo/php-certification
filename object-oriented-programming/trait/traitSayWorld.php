<?php 
/* 
*/
class Base{
	public function sayHello(){
		echo "\n Hello ";
	}
}

trait SayWorld{
	public function sayHello(){
		parent::sayHello();
		echo "World\n";
	}
}

class MyHelloWord extends Base{
	use SayWorld;
}

$o = new MyHelloWord();
$o->sayHello();