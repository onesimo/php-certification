<?php
/*
Traits a way to reuse code in independent classes

Unlike a class,a trait is non-instantiable

Other classes can thn use that trai

*/

trait t{
	function a(){

	}
}

class cl{
	use t;
}

class c2{
	use t;
}

/*
Trais Precedentce 

Members of the current class override trait methods
Trait methods overwrite inherited methods

*/

trait HelloTraid{
	public function sayHello(){
		echo 'Hello Trait';
	}
}

class HelloClass{
	use HelloTraid;

	public function sayHello(){
		echo 'Hello Class';
	}
}

$o = new HelloClass();
//$o->sayHello(); //Hello class!


/*
Traits Method visibility

Classes that use trais may change the visibility
Aliasing if visiility version from the trait sould remain, too

*/

trait a{
	public function method(){}
	public function method2(){}
}

class c{
	use a{
		method as protected;
		method2 as private;
	}
}

/*
Trais Conflicts

Multiple traits may be used in one class

class c { use t1, t2, t3; }

Fatal error if trais have conflicting method names 

Conflict resolution: insteadof operator
*/
trait t1{
	function method1(){}
	function method2(){}

}
trait t2{
	function method1(){}
	function method2(){}
}
trait t3{
	function method1(){}
	function method2(){}
}
class d{
	use t1, t2, t3 {
		t1::method1 insteadof t2, t3;
		t2::method2 insteadof t1, t3;
		t3::method2 as metho2_from_t3;
	}
}

?>