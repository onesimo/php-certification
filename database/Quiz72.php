<?php
/**
Given the following table called "names" ...

id name email
1 ana   email@email.com
2 joao  email@email.com
3 pedro email@email.com

...What is the value of $name after the following code is executed(assume a valid PDO connections)
 *
 */

$pdo = new PDO ('');
$name = null;
$sql = "SELECT COUNT(*) FROM names WHERE name name:'";
$stmt = $pdo->prepare($sql);
$stmt->bindColumn('name',$name);

while($row = $stmt->fetch()){
    var_dump($name);
}

/*

A 'anna'

B 'betty'

C 'clara' // correct

D NULL
 */

