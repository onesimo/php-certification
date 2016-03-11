<?php
/*
Web Features

Sessions 

A sessions is way of preserving data across a series of web site accesses by the user
	Session support is enabled by default
	Configuration options set in php.ini
	SID is a pre-defined constant for this extension (returns SessionName=SessionID as a string)

Session ID is a unique indetifier assigned to a user 
	Stored in a cookie on the client or in the URL
		Enable session.use_only_cookies for data protection
	A user accessing the site triggers a session ID check, either automatically 
	with session.auto_start = 1, or upon request with session_start()

$_SESSION is available as a super-global variable 

Session functions include:
	session_cache_expire returns current cache expire
	session_destroy Destroys all data registers to a session
	session_id GET / SET currrent session ID
	session_start initialize session data

FORMS (PHP and HTML)
Forms are used to collect data online from a user accessing a site 
	Form Elements:
		Automatically available to PHP scripts
		Dots and spaces in variable names are converted to underscores
		Form data can be made into an array using the following syntax
		<input name="formArray[]">

	Superglobal Arrays:
		$_POST superglobal contains all POST data: paired with POST method
		$_GET superglobal contains all GET data
		$_REQUEST is independent of data source, and merges information from GET, POST, and cookies;
		usage is not recommended, however, since you do not know where the information comes from.

Accessing Form Data

Form fiel 								   |  value in $_GET/$_POST

Text field, password field, hidden field   - value in the field
Radio button 							   - value of the selected radion button
Checkbox 								   - value if checkbox is activated(or: on)
Single select list 						   - value of the selected element
Multi select list 						   - Array with the values of all selected elements 
Submit buttom 							   - Caption of the submit button used
Image buttom 							   - Coordinates of the mouse click (field_x, fiel_y)

Forms Encoding / Decoding
Implemented at key stages in the form submission process 

HTML interpretation: htmlspecialchars() function encodes special characters in data, as a security measure
URL: encode data with urlencode() to interpret as on item

HTTP POST
HTTP GET

File Uploads
	HTML element: <input type='file' />
	Required attribute in the <form> element? enctyoe="multipart/form-data"

	Then: access via $_FILES
	Array keys:
		name: original filename(dangerous!)
		type: MIME type
		size: file size
		tmp_name:Temporary file name on the server
		error: Error fromthe upload

	Uploads will be deleted after script execution

	Therefore: move away using move_uploaded_file()
	Check using is_uploaded_file()
		Integrated in the former function 

	Restrictions (MAX_FILE_SIZE, ext.) only apply on the server-side

Cookies with PHP
	bool setcookie(name)
	Cookie value is encoded automatically

	bool setrawcookie(name)
	Cookie value is not encoded

Cookies with HTTP
	set a cookie
		Set-Cookie: NAME=VALUE; expires=DATE;
		path=path; domain=DOMAIN; secure; http_only
	Send a cookie back:
		Cookie: NAME-VALUE

HTTP Functions 
	header()Sends a raw HTTP header
	First paramater is the header string

		Ex: header('location:http://example.com/xp.php'); 
		Ex: header('HTTP/1.0 404 Not Found');

	Second parameter: indicates whether the header should replace a previous similar header, or add a second header 
	of the same type default:TRUE)
	
	Third Parameter: HTTP response code (defaul:200)

	headers_list() list of headers to send or that have been sent
	headers_sent() Whether ot not headers have been sent

HTTP Authentication
	Specific hooks only available when running the Apache module
	Can use header() function to send a message to hte client browser to cause a username & password window to display
	
	Upon enty, a PHP script runs with set variables in the $_SERVER
	array
		PHP_AUTH_USER User
		PHP_AUTH_PW Password
		AUTH_TYPE Authentication type

	To protect passwords PHP_AUTH variables are not set if external authentication is enabled for a page, and with
	Safe Mode in general
 
*/ 
?>