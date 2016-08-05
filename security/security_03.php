<?php
//session_start();

/*
session.use_cookies = 1; quando 0 permite visualiza o id da sessão ma URL
session.auto_start = 1; para iniciar sessão automaticamente
session.use_only_cookies = 1; obriga o PHP usar apenas cookies

FORMULÁRIOS

 

echo '<pre>';
print_r($_POST);
print_r($_FILES);
echo '</pre>';
*/
?>
<!-- 
<br>
<br>

<form method="POST" enctype='multipart/form-data'>	
	sexo f<input type="radio" name="sexo" value="feminino">
		 m<input type="radio" name="sexo" value="masculino">
		 <input type="submit" name="enviar">

	<br>

	atividades
	<br>

	<input type="checkbox" name="atividades[]" value='natacao'>natacao <br>
	<input type="checkbox" name="atividades[]" value='futebol'>futebol <br>
	<input type="checkbox" name="atividades[]" value='basquete'>basquete <br>

	nome<input type="text" name="este e um nome"><br>
	email
	<input type="text" name="email@usuario">
	<br>
  	<input type='file' name='arquivo[]' />
	<br><input type='file' name='arquivo[]' />
	<br>
	<br>
  	<input type="submit" name="enviar">
  	
</form>
 -->
<?php

/*
Campos com nome que possui ponto ou espaço é substituido por undercores

Envio de arquivos
- é necessário utilizar o atributo entype='multipart-data', senão o array $_FILES ficará vazio

- chaves do array FILES:
name 
type
tmp_name
error
size



retorno do Array file
Array
(
    [arquivo] => Array
        (
            [name] => 894646_576278109195781_4430061450895873599_o.jpg
            [type] => image/jpeg
            [tmp_name] => D:\xampp\tmp\phpEB89.tmp
            [error] => 0
            [size] => 61741
        )

)


funcao time() - returana corrent timestamp em unixtojd()
*/

//setcookie('livro3','certificacao PHP',time() + 86400,false,false, true, true);

 
//echo '<pre>';
//print_r($_COOKIE);

//unset($_COOKIE);

/*
setrawcookie is exactly




foreach ($_COOKIE as $key => $ck){
	echo $key. ' '.$ck.'<br>';
	//setCookie($key, $ck, time()-3600); 
}


clearstatcache();
setCookie('livro','certificacao PHP', time()-3600,'/diretorio'); 
*/
//unset($_COOKIE);


/*

HTTP
200 - SUCESSO
500 - FALHA NO SERVIDOR
401 - NÃO AUTORIZADO
3XX - REDIRECIONAMENTO 

*/

//header('HTTP/1.0 401 RECORD NOT FOUND');

header('Invalid-Token: meu_token', true, 200);
header('Content-Type: application/json');

print_r(headers_list());

?>
