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

*/

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

echo "there has been $counter hits to this site";

?>