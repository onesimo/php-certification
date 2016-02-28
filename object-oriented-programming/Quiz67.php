<?php  
/*
What is the output of this code?
*/

class myException extends Exception{
	function __construct($value){
		if($value == 'specialError')
			throw new Expeption('oops: special error');
		else
			throw new Exception('oops: generic error');
	}
		 
}

try{
	$e = new MyException('unknownError');
}catch(MyException $x){
	echo 'Error '.$ex->getMessage();
}


/*

A Error: oops: special error

B Error: oops: generic error

C No output at all

D Fatal error // fatal error

*/

?>