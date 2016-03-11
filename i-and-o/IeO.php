<?php
/*
//Files 
Two types of functions 
	functions that work with a file resource f*() (e.g., fopen(), ...)
	functions that work with a filename file*() (e.g, file_get_contents(), ...)


Files With Reources 

fopen()creates a file resource 

1st Parameter: File name(required)
2nd Parameter: File mode(required)

Read via fread()

$fp = fopen('files.txt','r');
while(!feof($fp)){
	echo htmlspecialchars(fread($fp, 4096));
}

fclose($fp);

Or directly
echo htmlspecialchars(fread($fp, filesize('file.txt'));


Write To Resource 

	fwrite() and fputs() write data into a reouce 
	$fp = fopen('file.txt', 'w');
	fwrite($fp, 'data...');
	fclose($fp);

	Others functins 

	fputcsv(); Writes an array in CSV format into a file 
	fprintf(); printf() for resources

Output Files 
	fpassthru() Output all data of a file handle directly
	to the output buffer (start at current file position)

	Usually better: Use fread() and escape special characters 

Read/Write at Once 
	
	Reads in the complete contents of a file
	string string file_get_contents(filename)

	Writes data in a file 
	int file_put_contents(filename, data)

	Reads a file delimited by line into an array
	array file(filename)

	Reads and outpus a file to the output buffer
	int readfile(filename)

File Operations

	copy() copies a file()
	rename() moves/renames a file
	unlink() deletes a file
	rmdir() deletes a directory // only empty directories

File Wrapper 
	Prefix in front of a file path 

	file://
	http://
	https://
	ftp://
	ftps://
	php://
	compress.zlib://
	compress.bzip2://

Custom Wrappers 
	stream_wrapper_register(protocol, classname) registers a protocol;
	implementation is part of the class 

	Class implements standard functionality like reading, writing,changing the file position
	
class wrapper{
	function stream_open($path, $mode, $options, &$opened_path){}
	function stream_read($count){}
	function stream_write($data){}
	function stream_tell(){}
	function stream_eof(){}
	function stream_seek($offset, $whence){}
}

//Sockets 
Creat a socket via fsockopen(hostname)

1st Parameter: Server
2nd Parameter: Port 
3rd Parameter: Error number(by reference)
4th Parameter: Error message(by reference)
5th Parameter: Timeout

Streams 
Part of a data stream:
	Wrapper
		Any file wrapper
	Pipeline
		Two pipelines at max:
			one for reading
			one for writing 
	Transport
		Code wrapper can communicate with
	Context
		Additional information for a stream 
		e.g., HTTP header for HTTP streams 
		$ctx= stream_context_create(array('http'=>array('method'=>'GET')));
	Metada

Streams 
	Can be determined with stream_get_meta_data()
	Array{
		[wrapper]=> plainfile
		[stream_type]=> STDIO
		[mode]=> r
		[unread_bytes]=> 0
		[seekable]=> 1 
		[uri]=> /path/to/file.php
		[timed_out]=>
		[blocked]=> 1 
		[eof]=>
	}

Strem Filter 
	Can be applied to stream data 
	stream_filter_append($fp, filtername)

	Custom filter are possible 
	stream_filter_register(filtername, classname)

	class implements the following method 
	function filter($in, $out, &consumed, $closing)
*/
?>