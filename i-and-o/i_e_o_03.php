<?php 

$handle = fopen('file2.txt','w+');

fputs($handle, '...teste novo teste');

#Lendo um arquivo de texto
/*
while (feof($handle) !== true) {
	$dt = fgets($handle);
	print $dt;
	die();
}

*/
fclose($handle);
/*

r  - apenas modo leitura, ponteiro no começo
r+ - modo leitura/escrita ponteiro no começo, se não existir gera um WANING

w  - apenas modo escrita, zera o arquivo, ponteiro no começo
w+ - modo escrita e escrita, zera arquivo, caso não exista é criado

a  - somente para escrita, ponteiro no final, se não exite tenta cria-lo
a+ - modo leitura e escrita, ponteiro no final, se não exite tenta cria-lo

x  - modo escrita, ponteiro no começo, caso exista gera um WARNING, se não exite tenta cria-lo

x+ - modo leitura e escrita, se não houver arquivo retorna FALSE e gera um WARNING, caso contrário cria um arquivo


FILE_

*/

file_put_contents('file2.txt', 'novos dados');
$content = file_get_contents('file2.txt');
//print $content; // novos dados

/*
STREAMS 
cls
WRAPPER (Protocolos)

file:// manipula arquivo local
http:// manipula conteúdo do protocolo HTTP
ftp:// arquivos ftp
php:// entrada e saida (i/o) 
zlib:// arquivos comprimidos
data:// conteúdos explicitos como strings encodadas em base64
glob:// buscar caminhos de diretorios dado um padra
phar:// manipula arquivos .phar
rar:// arquivos com extensão .rar

Adicionando contexto

-função 

$context = stram_context_creat($options, $params) para criar um contexto

print file_get_contents('ftp://servidor.ftp.com.br',false, $context)/

Utilizando contextos
print file_get_contents('http://www.google.com');

SSH

wrapper ssh2://

$ssh = ssh2_connect('192.168.1.168');

ssh2_auth_password($ssh,'zend','324234');

$ftp = ssh2_sftp($ssh);

$arquivo = fopen('ssh2.sftp://$ftp/foo/bar/teste.txt','r');

while($linha = fgets($arquivo)){
	print $linha;
}

FILTROS

print_r(stream_get_filters());
Array                               
(                                   
    [0] => convert.iconv.*          
    [1] => mcrypt.*                 
    [2] => mdecrypt.*               
    [3] => string.rot13             
    [4] => string.toupper           
    [5] => string.tolower           
    [6] => string.strip_tags        
    [7] => convert.*                
    [8] => consumed                 
    [9] => dechunk                  
    [10] => zlib.*                  
    [11] => bzip2.*                 
)                                   
          
stream_filter_append - para aplicar filtros


Qual é função podemos utilizar para ler arvquis CSV?

R: fgetcsv

Qual erro ocorre quando utiliza a funcao fwrite para um arquivo com permissão apenas de leitura?

R: será retornado um booleano FALSE

Preencha o espaço em branco com uma funcao

$dh = opendir(".");

while($file = ___ ($dh)){
	echo $file;
}

*/

$dh = opendir(".");

while($file = readdir($dh)){
	echo $file.PHP_EOL;
}
