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

trait SecureDebugInfo2{
	public function __debugInfo(){
		return $this->getData();
	}

	abstract public function getData();
}
/*
//Conflict Resolution

class MyClass2{
	use Ds\Util\SecureDebugInfo2, MyFramework\DebugHelper{
		Ds\Util\SecureDebugInfo2::__debugInfo insteadof My\MyFramework\DebugHelper;
	}
}

//Aliases and Method Visibility

class MyClass3{
	use Ds\Util\SecureDebugInfo2, MyFramework\DebugHelper{
		Ds\Util\SecureDebugInfo2::__debugInfo insteadof My\MyFramework\DebugHelper;

		My\MyFramework\DebugHelper::__debugInfo as DebugHelperInfo;
	}
}


//Aliases a trait to change visibility

class MyClass4{
	use Mytrait{
		Mytrait::myMethod as protected;
		MyTrait::myOtherMethod as private NewMthodName;
	}
}
*/
//Detecting Traits

/*
class Numbers2{
	use one, two;
}

var_dump(class_uses(new Numbers2));

 
array(2) {
  ["Ds\One"]=>
  string(6) "Ds\One"
  ["Ds\Two"]=>
  string(6) "Ds\Two"
}
*/

/*

Desing Pattern = 

Singleton Pattern

class DB{

	private static $_singleton;
	private $_connection;

	private function __construct($dns){
		$this->__connection = new PDO($dns);
	}

	public static function getInstance(){
		if(is_null(self::$_singleton)){
			self::$_singleton = new DB();
		}
		return self::$_singleton;
	} 
}

$db = DB::getInstance();

/*
The Factory Pattern
*/

class Configuration{
	const STORE_INI = 1;
	const STORE_DB  = 2;
	const STORE_XML = 3;

	public static function getStore($type= self::STORE_XML){

		switch ($type) {
			case self::STORE_INI:
				return new Configuration_Ini();
			case self::STORE_DB:
				return new Configuration_DB();
 			case self::STORE_XML:
				return new Configuration_XML();
  			default:
				throw new Exception("Unknown Datastore Specified.");
				
		}
	}
}

class Configuration_Ini{

}
class Configuration_DB{

}
class Configuration_XML{

}

$config = Configuration::getStore(Configuration::STORE_XML);

/*
The Registry Pattern
*/

class Registry{
	private static $_register;

	public static function add(&$item, $name = null){
		
		if(is_object($item) && is_null($name)){
			$name = get_class($item);
		}elseif(is_null($name)){
			$msg = "you must provide a name for non-objects";
			throw new Exception($msg);
		}

		$name = strtolower($name);
		self::$_register[$name] = $item;
	}

	public static function &get($name){
		$name = strtolower($name);
		if(array_key_exists($name, self::$_register)){
			return self::$_register[$name];
		} else{
			$msg = " '$name' is not registered .";
			throw new Exception($msg);
			
		}
	}

	public static function exists($name){
		$name = strtolower($name);

		if(array_key_exists($name, self::$_register)){
			return true;
		}else{
			return false;
		}
	}
}
/*
$db = new DB();
Registry::add($db);
 
// Later on 

if(Registry::exists('DB')){
	$db = Registry::get('DB');
}else{
	die(' we lost our database connection somewhere. Bear with us.');
}

/*

Accessing Objects as Arrays

*/

interface ArrayAccess
{
	function offsetSet($offset,$value);
	function offsetGet($offset);
	function offsetUnset($offset);
	function offsetExists($offset);

}

class myArray implements ArrayAccess
{
	protected $array = array();

	function offsetSet($offset, $value){
		if(!is_numeric($offset)){
			throw new Exception("Invalid key $offset");
		}
	}

	function offsetGet($offset){
		return $this->array[$offset];
	}

	function offsetUnset($offset){
		unset($this->array[$offset]);
	}

	function offsetExists($offset){
		return array_key_exists($this->array, $offset);
	}
}

$obj = new myArray();

//$obj[1]; works


$array = array(1, 2, 3, 4);

$obj = new \ArrayObject($array);

/*var_dump($obj);
object(ArrayObject)#3 (1) {
  ["storage":"ArrayObject":private]=>
  array(4) {
    [0]=>
    int(1)
    [1]=>
    int(2)
    [2]=>
    int(3)
    [3]=>
    int(4)
  }
}
 */