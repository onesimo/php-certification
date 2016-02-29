<?php  
/*
Consider the following snippet of code... What does it mean?


$fp = fopen("compress.zlib;//foo-bar.txt.gz", "wb");

A - This statement is able to open zipped files and read their contents 

B - Any data that is written to $fp afterwards will be zlib compressed and stored in the foo-bar.txt.gz file 

C - An error will occur, specifying a compresssion stream handler is illegal in binay write (wb) mode 
*/


?>