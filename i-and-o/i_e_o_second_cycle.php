<?php

/*
PHP includes a number of default streams

file:// standard file access
http:// acces to remote resources via HTTP
ftp:// access to remote resources via FTP
php:/
compress.zlib://
and
compress.bzip2:// access to  compressed files
zip:// access to compressed zip files(requires the zip extension)
data:// RFC 2397 access to data in strings
glob:// find pathnames by matching pattern
phar:// PHP Archives(also shown as PHAR) stream wrapper 

if no protocol is specified th file:// is implied


Accessing Files

 
$file = fopen("my_file.txt",'a+');

if($file == false){
	die('unable to open/create file');
}

if(filesize("my_file.txt") == 0 ){
	$counter = 0;
}else{
	$counter = (int) fgets($file);
}

//limpa o arquivo
ftruncate($file, 0);

$counter ++;

fwrite($file, $counter);

//echo "there has been $counter hits to this site";


/*


r  - reading only, places the file pointer at the beginning of the file
r+ - reading and writing, place the file pointer at the begginning of the file
w  - writing only, places the file pointer at the beginning of the file and truncate it to zero length.
a  - writing only, places the file pointer at the end of the file
a+ - writing and writing, places the file pointer at the end of file
x  - Creates a new file for writing only
x+ - Creates a new file for reading and writing

w, w+, and. a+ will create a file it it doesn't yet exist

*/


// $file2 = fopen('file2.txt','a+');
// fwrite($file2, " A new number ".rand(1,3).' - '); // write something

/*
	Common C-like File functions

if(!file_exists('file2.txt')){
	throw new Exception("Error Processing Request", 1);	
}

 
$f = fopen("file2.txt", "a+");

$txt = '';

while(!feof($f)){
	$txt .= fread($f,1);
} */

echo 'test';

$socket = stream_socket_client('tcp://0.0.0.0:1037');

	while(!feof($socket)){
		echo fgets($socket,100);
	}
fclose($socket);

?>