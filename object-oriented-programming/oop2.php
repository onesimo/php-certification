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

