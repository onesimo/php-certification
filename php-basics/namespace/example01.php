<?php 
namespace Ds\String;

class Unicode 
{
	protected $string;

	public function __construct($string){
		$this->string = $string;
	}

	public function strlen(){
		if(extension_loaded('iconv')){
			return \iconv_strlen($this->string);
		} elseif (extension_loaded('mbstring')) {
			return \mb_strlen($this->string);
		}

		return 'teste';
	}
}

namespace foo;
//use function bar\strlen;
//strlen("foo"); // falls back to \strlen()

strlen("len");

