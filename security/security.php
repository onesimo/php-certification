<?php 

 

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<form method="POST">
	Username: <input type="text" name='username'><br>
	Password: <input type="text" name='password'><br>
	favorite Color
	<select name="colour">
		<option>Red</option>
    	<option>Blue</option>
		<option>Yellow</option>
    	<option>Green</option>
	</select><br>
	<input type='submit'>
</form>

</body>
</html>

<?php

$clean = array();

if(ctype_alpha($_POST['username'])){
	$clean['username'] = $_POST['username'];
}


if(ctype_alnum($_POST['password'])){
	$clean['password'] = $_POST['password'];
}

$colours = array('Red','Blue','Yellow','Green');
if(in_array($_POST['colour'], $colours)){
	$clean['colour'] = $_POST['colour'];
}

print_r($clean);