<?php

/*
SQL Data types

Numeric
int or integer - integer number, 32 bits
smallint - integer, 16 bits
real - floating point number, 32 bits 
float - floating point number, 64 bits


Strings
char - fixed-lenght string
varchar - variable-lenght string

Creating Databases and Tables

CREATE DATASE <dbname>;
CREATE SCHEMA <dbname>;

this two forms are equivalent each other.

tables

CREATE TABLE <tablename>
	<coliname> <colitype> [<colnatributes>],
	[...
	<coliname> <colitype> [<colnatributes>],

CREATE TABLE book (
	id INT NOT NULL PRIMARY KEY,
	isbn VARCHAR(13),
	tible VARCHAR(255),
	author VARCHAR(255),
	public VARCHAR(255)
   );

Creating index and Relationships

CREATE INDEX <indexname>
ON <tablename> (<column1>[,... <column>]);

unique index on the isbn table

CREATE INDEX book_isbn ON book (isbn);


Relationship

CREATE TABLE book_chapter(
	isbn VARCHAR(13) REFERENCES book(id),
	chapter_number INT NOT NULL,
	chapter_title VARCHAR(255)
);

Dropping Objects

DROP TABLE book_chapter

To drop an entire schema

DROP SCHEMA my_book_database 

Adding and Manipulatin Data

INSERT INTO <tablename> VALUES (<fieldsValues>,[,..., <fieldvalues>])

INSERT INTO <tablename>
(<fieldN1>[,...,<fieldN12])
VALUES
(<field1Value>[,..., <fieldvalues])

SQL JOINS

Inner joins - returns rows from both tables only if keys from both can be found that satisfy the join conditions


SELECT * FROM book
INNER JOIN book_chapter on book.isbn = book_chapter.isbn;

Joins only work well with assertive conditions - negative conditions often return bizarre results

SELECT *
	FROM book
	INNER JOIN book_chapter ON book.isbn <> book_chapter.isbn


OUTER JOINS -
All data from both table with NULL values

LEFT JOIN
All data from left table, likely NULL data in right table

RIGHT JOIN
All data from right table, likely NULL data in left table


Advanced Database Topics

Transactions
 
START TRANSACTION
DELETE FROM book WHERE isbn LIKE '0655%';
UPDATE book_chapter SET chapter_number = chapter_numer + 1;
ROLLBACK;

Prepared Statements

*/
ini_set("display_erros", 1);

try{
	$dsn = 'mysql:host=localhost;dbname=certification';
	$dbh = new PDO ($dsn, 'me','JsKM39UVDvYTyCep');
	$dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES,TRUE);
	$dbh->setAttribute(PDO::ATTR_ERRMODE, 
		PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e){
	echo 'Failed: '. $e->getMessage();
}

/*
To retrieve data from data base use PDO::query()
to escape a value included in a query use PDO::quote()

*/

$author =  ("Professor João");
//$author = (ctype_alpha($author)) ? $author : '';

//Escape the value of $author with quote - $abh->quote('$author')
$sql = "SELECT * FROM book ";

//Execute the statement and echo the results
$results = $dbh->query($sql);

//var_dump($results);

foreach ($results as $value) {
	//echo "Book : $value[title] <br>";
}

// use as objet

$results = $dbh->query($sql);
$results->setFetchMode(PDO::FETCH_OBJ);
foreach ($results as $value) {
	//echo "Book : $value->title <br>";
}

/*
INSERT, UPDATE OR DELETE, provides the PDO::exec()
*/

$sql2 = "INSERT INTO book (isbn, title, id) VALUES('123456','The Lord of the Rings','10')";
//$affected = $dbh->exec($sql);

//echo " Records affected: ($affected)";

/*
Prepared Staments
*/

$stmt = $dbh->prepare($sql);
$stmt->setFetchMode(PDO::FETCH_OBJ);
$stmt->execute();

$results = $stmt->fetchAll();

foreach ($results as $value) {
	//echo "{$value->title} author: {$value->author} <br>";
}

/*
A prepared statement with named placeholeders
*/

$author1 = "Professor Joao"; 
$author2 = "Jhon"; 
$author3 = "Smith"; 


$sql = "SELECT * FROM book WHERE author = :author ";

$stmt = $dbh->prepare($sql);
$stmt->setFetchMode(PDO::FETCH_OBJ);

//first author
$stmt->bindParam(':author', $author1);
$stmt->execute();

$results = $stmt->fetchAll(); 
foreach ($results as $value) {
	//echo "{$value->title}, author : {$value->author} <br>";
}

//second author
$stmt->bindParam(':author', $author2);
$stmt->execute();

$results = $stmt->fetchAll(); 
foreach ($results as $value) {
	//echo "{$value->title}, author : {$value->author} <br>";
}

/*
question mark placeholders instead of named placeholders

*/

//second author

$sql = "SELECT * FROM book WHERE author = ? ";
$stmt = $dbh->prepare($sql);
$stmt->setFetchMode(PDO::FETCH_OBJ);

$stmt->bindParam(1, $author3, PDO::PARAM_STR, 20);
$stmt->execute();
 
$results = $stmt->fetchAll(); 
foreach ($results as $value) {
	 //echo "{$value->title}, author : {$value->author} <br>";
}
/*
Prepared statements with bounds parameteres are perphaps among the most useful powerful features of PDO

Transactions With PDO
*/

try{
	$dbh->beginTransaction();
	$dbh->exec("INSERT INTO book (isbn, title, id) 
		VALUES('12324523','The Love is Blind','12')");

	$dbh->exec("INSERT INTO book (isbn, title, id) 
		VALUES('1232456','Titanic','11')");
	$dbh->commit();

}catch(PDOException $e){
	$dbh->rollback();
	///echo 'Failed: '.$e->getMessage();
}

/*
MySQL Improved Extension (mysqli)

Connecting to a database with mysql's object-oriented interface
*/

$mysqli = new mysqli('localhost', 'me','JsKM39UVDvYTyCep','certification');

if(mysqli_connect_errno()){
	echo "failed".mysqli_connect_errno();
}

$sql = "SELECT * FROM book 
		WHERE author = '".$mysqli->real_escape_string("Smith")."'";

if(!$mysqli->real_query($sql)){
	echo "error ".$mysqli->error;
}

if($results = $mysqli->store_result()){
	while($row = $results->fetch_assoc()){
		//echo "{$row['title']}, author: {$row['author']} ";
	}
}
 
/*
Prepared Statemend and bound paramaters with pmysqli
*/

$author = 'Jhon';

$sql = "SELECT author, title FROM book WHERE author = ? ";
if($stmt = $mysqli->prepare($sql)){
	$stmt->bind_param('s', $author);
	$stmt->execute();
	$stmt->bind_result($author, $title);

	while ($data = $stmt->fetch()) {
		// echo "{$title}, {$author}";
	}
}

/*
Transactions with mysqli

*/
$mysqli->autocommit(FALSE);
$mysqli->query("INSERT INTO book (isbn, title, id) 
			VALUES('1232456','Titanic 2','13')");
$mysqli->query("INSERT INTO book (isbn, title, id) 
			VALUES('1232456','Titanic 2','11')");

if(!$mysqli->commit()){
	$mysqli->rollback();
	// echo 'error';
}

 

$mysqli->close();


/*
query methods
*/


/*
Connceting with mysqli procedural functions
*/

$dbh =  mysqli_connect('localhost', 'me','JsKM39UVDvYTyCep','certification');

if(!$dbh){
	echo "failed".mysqli_connect_errno();
}


$sql = "SELECT * FROM book 
		WHERE author = '".mysqli_real_escape_string($dbh, "Smith")."'";

if(!mysqli_real_query($dbh,$sql)){
	//echo "error ".mysqli_error();
}

if($results = mysqli_store_result($dbh)){
	while($row = mysqli_fetch_assoc($results)){
		//echo "{$row['title']}, author: {$row['author']} ";
	}
}


/*
  bound paramaters with pmysqli, procedural approach
*/

$author = 'Jhon';

$sql = "SELECT author, title FROM book WHERE author = ? ";
if($stmt = mysqli_prepare($dbh, $sql)){
	mysqli_stmt_bind_param($stmt, 's', $author);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_bind_result($stmt,$author, $title);

	while (mysqli_stmt_fetch($stmt)){
		//echo "{$title}, {$author}";
	}
}

/*
handling transactions with mysqli, procedural approach
*/
mysqli_autocommit($dbh, FALSE);

 mysqli_query($dbh,"INSERT INTO book (isbn, title, id) 
			VALUES('1232456','Titanic','11')");
mysqli_query($dbh,"INSERT INTO book (isbn, title, id) 
			VALUES('1232456','Titanic','11')");

if(!mysqli_commit($dbh)){
	mysqli_rollback($dbh);
	//echo 'error';
} 
mysqli_close($dbh);

 