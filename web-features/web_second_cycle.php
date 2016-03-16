<?php 
/*
Web

*/

?>
<!---using Method GET -->
<form action="" method="GET">
List: <input type="text" name="list"></input> <br/>
Order by:
<select name="orderby">
	<option value="name">Name</option>
	<option value="city">City</option>
	<option value="zip">Zip</option>

</select> <br/>
Sort order:
<select name="direction">
	<option value="name">Ascendind</option>
	<option value="city">Descendin</option> 
</select> <br/>
<input type="submit" > 
</form>

<br/><br/><br/>

<!---using Method POST -->
<form action="" method="POST">
	Choose all languagues you would like to learn <br>

	<label>
		<input type="checkbox" name="languages[]" value="PHP" />
		PHP
	</label>
	<label>
		<input type="checkbox" name="languages[]" value="Perl" />
		Perl
	</label>
	<label>
		<input type="checkbox" name="languages[]" value="Ruby" />
		Ruby
	</label>
<input type="submit" > 
</form>

<!--  -->

<?php

if(isset($_POST['languages'])){
	foreach ($_POST['languages'] as $languages) {
		echo $languages.PHP_EOL.'<br>';
	}
}

/*
When you don't know how data is sent
you can use $_REQUEST

Manging File Uploads

A file can be uploaded through a "multi-part" HTTP POST transaction, you need to declare it in a slightly different way.
*/
?>
<br>

<form enctype='multipart/form-data' action="" method="POST">
<input type="hidden" name="MAX_FILE_SIZE" value="5000">
	<input name="filedata" type="file">
	<input type="submit" value="Send filee">
</input>

<!-- 
You can limit amount of data in configuration of directives such as
post_max_size
max_input_time
upload_max_filesize

Once the file uploaded to the server PHP stores it in a temporary location - the temporary copy is autmatically destroyed when the script ends.
-->

<?php 

if(!empty($_FILES)){
 
	if(move_uploaded_file($_FILES['filedata']['tmp_name'],'../')){
		echo 'ok';
	}
	print_r(error_get_last());
 	//echo "<pre>";
	//print_r($_FILES);

}

/*
redirection
*/
//header("location: http://www.google.com");

/*
to be safe use exit.

Compression

//ob_start("ob_gzhandler");

Cliente Side Caching


not to cache the item of headers at all
*/
header("Cache-Control: no-cache, must-revalidate");
header("Expires: Thu, 31 May 1984 04:35:00 GMT");

/*
To keep the in its cache for 30 days
*/

$date = gmdate("D, j M Y H:i:s", time() + 2592000);
header("Expires: ".$date." UTC"); 
header("Cache-Control: Public");
header("Pragma: Public");

/*
COOKIES 

function to set cookie

setcookie('hide_menu',"1");

cookie hide_menu, value 1

*/
setcookie("hide_menu","1",time() +86400);

/*
This will instruct the browser to (try to) hang on to the cookie for a day;

Arguments you can pass to setcookie() in order

path = the path where the cookie will be accessible
domain = the domain you can set a cookie, you cannot set the domain to others pages
secure = only send this cookie when communicating under HTTPS

Acessing Cookie Data
*/
if($_COOKIE['hide_menu'] == 1){
	//hide menu
}

setcookie('menu[0]',"foo");
setcookie('menu[1]',"bar");
setcookie('menu[2]',"bar");

/*
You will contain an array $_COOKIE

the setting cookies is a two-stage progress:
first you send the cooke to the client and client sends it back to you at the next request, the $_COOKIE array will not be populate until the next request comes along

A way to delete a cookie
*/
setcookie("hide_menu", false, -3000);


/*
SESSIONS

*/
