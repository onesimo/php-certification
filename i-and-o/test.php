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


