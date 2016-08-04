<?php

$user 	  = 'root';
$password = '';
$dsn 	  = 'mysql:dbname=certification;host=localhost';


$pdo   = new PDO($dsn, $user, $password);
$pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

$drive = \PDO::getAvailableDrivers();

//print_r($drive);
$pdo->getAttribute(\PDO::ATTR_ERRMODE);
/*
constantes 
ERRMODE_SILENT = 0
ERRMODE_WARNING = 1 
ERRMODE_EXCEPTION = 2
*/
/*
$pdo->query('
	CREATE TABLE `usuarios`(
	`id` INT NOT NULL AUTO_INCREMENT,
	`nome` VARCHAR(45) NOT NULL,
	`email` VARCHAR(45) NOT NULL,
	PRIMARY KEY(`ID`) 
	);');*/


/*$linhasAfetadas = $pdo->exec("INSERT INTO usuarios (nome, email)
	VALUES ('pdo', 'php@php.net');");


$linhasAfetadas = $pdo->exec("
	UPDATE usuarios SET nome = 'PHP';");

if($pdo->errorCode()){
	$detalhes = $pdo->errorInfo();
	print sprintf(
		'codigo: %s, drive %s, msg: %s',
		$detalhes[0],
		$detalhes[1],
		$detalhes[2]
	);
}
*/
//print $linhasAfetadas. ' linhas afetadas ';


$email ='joao@gmail.com';
/*
Escapando dados
print 'DELETE FROM usuarios where email = '.$pdo->quote($email);

DELETE FROM usuarios where email = 'joao@gmail.com'


Transações
*/


try{
	$pdo->beginTransaction();

	$pdo->exec("INSERT INTO usuarios (nome, email)
		VALUES ('joao', 'jose@email')");

	$pdo->exec("INSERT INTO usuarios (nome, email)
		VALUES ('jose',)"); //erro

	$pdo->commit();

}catch (Exception $e){
	$pdo->rollback();
}

/*
Retornando Dados
*/

$sql = $pdo->query('SELECT * FROM usuarios');
$dados = $sql->fetchAll(PDO::FETCH_ASSOC);
//print_r($dados);

/*
Escapando argumentos
*/

$nome = 'joao';

$query = $pdo->prepare('SELECT * FROM usuarios ');

$query->execute([':nome' => $nome]);

$query->bindColumn(1, $id);
$query->bindColumn(2, $nome);
$query->bindColumn(3, $email);
 
//$dados = $query->fetch(PDO::FETCH_BOUND);

while ($query->fetch(\PDO::FETCH_BOUND)) {
	//print sprintf(PHP_EOL.'%d %s %s', $id, $nome, $email);
}



$query = $pdo->prepare('SELECT * FROM usuarios WHERE email = :email ');

$query->bindValue(':email', 'jose@email'); 

$query->execute();
//$dados = $query->fetch(PDO::FETCH_BOUND);

while ($query->fetch(\PDO::FETCH_BOUND)) {
	//print sprintf(PHP_EOL.'%d %s %s', $id, $nome, $email);
}


/*
FETCH_OBJ

*/

$query = $pdo->prepare('SELECT * FROM usuarios ');
 
$query->execute();
//$dados = $query->fetch(PDO::FETCH_BOUND);
/*
while ($dt = $query->fetch(\PDO::FETCH_OBJ)) {
print $dt->id. ' - '. $dt->email. PHP_EOL;
}


OU
*/

foreach ($query->fetchAll(\PDO::FETCH_OBJ) as $dt){
	//print $dt->id. ' - '. $dt->email. PHP_EOL;
}

/*
FETCH CLASS
*/

class Usuario{
	public $id;
	public $nome;
	public $email;
}

$query = $pdo->prepare('SELECT * FROM usuarios ');
$query->execute();
//print_r($query->fetchAll(\PDO::FETCH_CLASS,'Usuario'));

/*
FETCH_INTO
*/

$query = $pdo->prepare('SELECT id, nome, email FROM usuarios ');
$query->setFetchMode(\PDO::FETCH_INTO, new Usuario() );
$query->execute();

//print_r($query->fetchAll());
//print_r($query->fetchAll(\PDO::FETCH_CLASS,'Usuario'));

/*
FETCH_LAZ - não podemos utiliza fetchALL, caso utilizer gerará um FATAL ERROR
*/

$query = $pdo->prepare('SELECT id, nome, email FROM usuarios ');
 
$query->execute();

/*print_r($query->fetch(\PDO::FETCH_LAZY));

PDORow Object
(
    [queryString] => SELECT id, nome, email FROM usuarios
    [id] => 1
    [nome] => PHP
    [email] => php@php.net
)


FETCH_NAMED
*/



$query = $pdo->prepare('SELECT u.id, u.nome,p.nome, email FROM usuarios as u INNER JOIN permissao as p on p.id = u.id ');
 
$query->execute();

/*print_r($query->fetch(\PDO::FETCH_NAMED));

Array
(
    [id] => 1
    [nome] => Array
        (
            [0] => PHP
            [1] => Modulo Adm
        )

    [email] => php@php.net
)

FETCH_NUM 


*/



$query = $pdo->prepare('SELECT u.id, u.nome,p.nome, email 
	FROM usuarios as u 
	INNER JOIN permissao as p on p.id = u.id ');
 
$query->execute();

//print_r($query->fetchAll(\PDO::FETCH_NUM));