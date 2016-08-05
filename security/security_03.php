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
1xx - INFORMACIONAL
2xx - SUCESSO
3xx - REDIRECIONAMENTO
4xx - ERRO NO CLIENTE
5xx - ERRO NO SERVIOR

header - envia cabeçalho
header_remove - remove cabeçalho enviado
headers_list - retorna um array com os cabeçalhos
headers_sent() - verifica se já foi enviado um cabeçalho 
*/

//header('HTTP/1.0 401 RECORD NOT FOUND');

header('Invalid-Token: meu_token', true, 200);
//header('Content-Type: application/json');

header_remove('Invalid-Token');

print_r(headers_list());

foreach (headers_list() as $value) {
	//print $value.'<br>';
}

if(headers_sent()){
	header('Location: http://www.casadocodigo.com');
}

/*
Qual o valor padrão de um cookie de sessão do PHP?

R: Até o navegador ser fechado

Método HTTP é utiliado para upload de arquivos?

R: POST
*/

session_start();

//echo session_regenerate_id();

if(!array_key_exists('counter', $_SESSION)){
	$_SESSION['counter'] = 0;
}else{
	$_SESSION['counter'] ++;
}

// session_id(); retorna id da sessão atual 

// session_regenerate_id(); atualiza id da sessao atual PHPSESSID

session_destroy();

/*
Como inicializar o uso de sessões em PHP automaticamente?

C: Definindo the 'session.start_session' = 1

Função que utilizamos para verificar se algum cabeçalho HTTP já foi enviado?

R: headers_sent()


Atributo para enviar arquivos ao servidos definido no formulário

enctype='multipart/form-data'
*/


print_r($_POST['my_account']);
?>
<!DOCTYPE html>
<html>
<head>
	<title>

	</title>
</head>
<body>
		<form method="post">
			<input type="text" name="my account">
			<input type="submit" name="submit">
		</form>
</body>
</html>

