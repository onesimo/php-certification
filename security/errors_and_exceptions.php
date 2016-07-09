<?php
/*
Error Reporting
error_reporting=E_ALL & ~E_NOTICE


Constantes de nível e valores de bit de error_reporting().
Valor	Constante
1		E_ERROR
2		E_WARNING
4		E_PARSE
8		E_NOTICE
16		E_CORE_ERROR
32		E_CORE_WARNING
64		E_COMPILE_ERROR
128		E_COMPILE_WARNING
256		E_USER_ERROR
512		E_USER_WARNING
1024	E_USER_NOTICE
6143	E_ALL
2048	E_STRICT
4096	E_RECOVERABLE_ERROR

*/

error_reporting(6143 & ~8);


/*
Handling erros
*/

$oldErrrorHandler = '';

function myErrorHandler($ano, $str, $file, $line, $context){
	global $oldErrrorHandler;

	//logToFile("Error $str in $file at line $line ");

	//call the old errror handler
	if($oldErrrorHandler){
		$oldErrrorHandler($no, $str, $file, $line, $context);
	}
}

$oldErrrorHandler = set_error_handler('myErrorHandler');

/*
Exceptions

Trowing Exceptions
*/
 
try{

	if(!$error){
		throw new Exception("Error Processing Request");	
	}
} catch(\Exception $e){ 
	//handle 
}

/*
namespace myCode;

class Exception extends \Exception { }

try{
	try{
		try{
			new PDO("mysql:dbname");
		}catch(\PDOException $e){
			echo $e->getMessage(); 
		}
	} catch (\myCode\Execption $e){
		echo $e->getMessage(); 
	}
}catch (\Exeception $e){
	echo $e->getMessage();
}

catching different exceptions
*/

try{
	new PDO("mysql:dbname=zce");
	throw new Exception("An unknown error occurred");
} catch(\PDOException $e){
	echo $e->getMessage();
}catch(\myCode\PDOException $e){
	echo $e->getMessage();
}catch(\Exception $e){
	echo $e->getMessage();
}


/*
Finally - Is always executed an exception, even if it has been thrown or not
*/
