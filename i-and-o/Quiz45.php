<?php  
/*
Assuming a file 'bad_file.txt' has been opened in read mode, and $fh is the file handle, which of the following will output the contents of the file without HTML markup? (Choose two)

A fpassthru($f);

B while (!feof($fh)) {
	$a = fgets($h, 4096);
	echo $a;
} // Correct

C ob_start();
readfile('bad_file.txt');
echo strip_tags(ob_get_clean()); // Correct

D strip_tags(file_get_contents($fh));
*/


?>