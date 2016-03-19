<?php

 
$f = fopen("my_file.txt", "a+");


$txt = '';

while(!feof($f)){
	$txt .= fread($f,1);
}
fclose($f);

//echo "there have been $txt hist to this directory";


/*
fseek 
SEEK_SET, start from the beginning of the file
SEEK_CUR, start from the current position
SEEK_END, start from the end of the file
*/

$of = fopen('file2.txt', 'r+');

//echo fseek($of, 1, SEEK_SET);

fclose($of);

/*
fputcsv() writes the elements of an array in CSV
fgetcsv() reads a row from a CSV file
*/

$csv_file = fopen('filecsv.csv', 'a+');

while($row = fgetcsv($csv_file)){
 //print_r($row);
}

$values = array('Jhon', 'jhonphp@server.com', rand(100000,4000000));

//fputcsv($csv_file, $values);

fclose($csv_file);

/*
Simple File Functions
*/

//header("content-type: image/jpeg");
//readfile("m_5.jpg");

/*
Old way
file() will let you rea a file into a array of lines
*/
$file = implode ("\r\n", file('file2.txt'));
 
/*
new way 
file_get_contents()
you can specify the amount of data read by file_get_contents() by an parameters to the function

file_put_contents("") allows you to write the contentso f PHP string file in on pass
*/
$data = "Database";
file_put_contents('file2.txt', $data, FILE_APPEND);

$data = array(" Queries "," Language ", " Script ");
file_put_contents('file2.txt', $data, FILE_USE_INCLUDE_PATH);


/*

FILE_USE_INCLUDE_PATH - use include_path to find the file
FILE_APPEND - appends the data to the file
lOCK_EX - lock before accessing

Working with Directories

chdir() - chanage the current directory
getcwd() - returns the current directory
*/
//chdir('../web-features'); 
//echo getcwd();


if(!is_dir('new_dir2')){
	if(!mkdir('new_dir2',0666, true)){
		throw new Exception("Error Processing Request", 1);
	}
}


/*
Controlling File Access

is_dir() checks if the path is a directory 
is_executable() checks if the path is executable
is_file() checks if the path exists and is a regular file
is_link() checks if the path exists and is a symlink
is_readable() checks if the path exists and is readable
is_writable() ckecks if the path exists and is writable
is_uploaded_file() checks if the path is an uploaded file

File permission UNIX sytems can be changed using a number of funcions, includind chmod(), chgrp() and chown. for example
*/

chmod('file2.txt', 0666);

/*

Simple Network Access

*/
/*
$f = fopen('http://www.phparch.com','r');
$p = '';

if($f){
	while($s = fread($f, 1000)){
		$p .= $s;
	}
}else{
	throw new Exception("Error Processing Request", 1);
	
}
*/

/*
include 'http://www.google.com';
warning, allw_url_include =0
allow_url_fopen = 0
it is possible to disable this function in PHP.in

Stream Contexts 

*/

$http_options = stream_context_create([
	'http' => [
		'user_agent' => 'Jhon',
		'max_redirects' => 3
	]
]);

$file = file_get_contents("http://localhost/php-certification/i-and-o/", false, $http_options);

/*
Avanced Strem Functionality


*/

$socket = stream_socket_server("tcp://0.0.0.0:8000");
while($conn = stream_socket_accept($socket)){
	fwrite($conn, 'Hello World');
	fclose($conn);
}
fclose($socket);


