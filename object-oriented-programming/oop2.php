<?php 
/**
* Elements of Object-Oriented Design
*
*
*

Traits */

namespace Ds\Util;


trait SecureDebugInfo{
	public function __debugInfo(){
		$info = (array) $this;

		foreach ($info as $key => $value) {
			if($key[0] == '_'){
				unset($info[$key]);
			}
		}
	}
}

namespace Ds;

class Myclass{
	use Util\SecureDebugInfo;
}


trait One{
	public function one(){}
}

trait Two{
	public function two(){}
}

trait Three{
	use One, Two; // trait three now comprise of all three traits.
	public function Three(){}
}

/*
Trait inheritance
*/

class Numbers{
	use One; // adds One->one();

	public function two(){}
	public function three(){}
}

class MoreNumbers extends Numbers
{
	use Two; //Two->two() overrides  Numbers->two()

	public function one(){ } // Overrides Number->one()
	//
}

class EvenMoreNumbers extends MoreNumbers{
	use Three;
	/*
	Three->one() Overrides MoreNumbers->one()
	Three->two() Overrides MoreNumbers->two()

	Three->three() Overrides inherited Numbers->three()
	*/

	public function three(){} // Overrides Three->three()
}

/*
Trait Requirements

*/