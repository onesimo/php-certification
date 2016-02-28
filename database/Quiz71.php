<?php
/**
Given the following table called "names" ...

id name email
1 ana   email@email.com
2 joao  email@email.com
3 pedro email@email.com
4 ana  email@email.com
5 maria email@email.com
6 andre email@email.com

...What will COUNT values be after the following code runs?
 (assume a valid PDO connection)
*/

$pdo = new PDO ('');
$sql = "SELECT COUNT(*) FROM names WHERE name =':name'";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':name','anna');
$stmt->execute();
/*

A 2 // correct

B 4

C 6

D none - the prepared statement is invalid
 */

