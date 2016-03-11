<?php  
/*
What will happen when the following code is executed, given that fact that allow_url_fopen is set to On and /tmp is writable directory?
*/

$fp = fopen('http://www.google.com','r');
$file = file_get_contents('/tmp/content.txt', $fp);
stream_get_contents('/tmp/content.txt');


/*
A The content of the zend.com webpage results

B Error: stream_get_contents is accepting a file handler, not a file name // correct

C Fatal error: Whitout an additional context argument, it is not possible to use fopen for http URLs 
*/
?>