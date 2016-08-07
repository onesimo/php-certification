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

//print_r(headers_list());

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
*/

/*
Como inicializar o uso de sessões em PHP automaticamente?

C: Definindo the 'session.start_session' = 1

Função que utilizamos para verificar se algum cabeçalho HTTP já foi enviado?

R: headers_sent()


Atributo para enviar arquivos ao servidos definido no formulário

enctype='multipart/form-data'
*/


//print_r($_POST['my_account']);

/*
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


Ambiente de produção

allow_url_fopon = off
allow_url_include = off
Essas diretivas devem ficar off no ambiente de produção

max_execution_time = tempo de execução do script
max_input_time = tempo máximo para interpretar GET e POST

memory_limit = maximo em bytes que um script pode alocar

upload_max_filesize = memoria disponivel para carregar arquivos

post_max_size = tamanho maximo bytes enviados

max_input_nesting_level = profundidade maxima GET e POST


Configuração de ERRO


display_erros - determina se erros serão mostrados na tela
log_errros - determina se erros deverão ser gravados no arquivo de log do servido
error_reporting = determina o nivel que desejamos que nosso relatório de erros exiba

(error_reporting(-1))  = irá mostar todo tipo de erro possivel
| ou ^ exceto

*/

error_reporting(-1);
ini_set('display_errors',1);
ini_set('display_startup_errors',1);

/*
Criptografia 

*/

$senha = 'minha_senha';

$md5_senha = md5($senha);

if($md5_senha = md5($senha)){
	//echo 'senha correta';
}

/*
SSL - Secure socket layer, cria um cana criptografado entre o servidor web e o navegador, garantindo que todos os dados transmitidos sejam sigilosos e seguros  entre a sua aplicação e o cliente

SESSÕES E SEGURANÇA

session_regenerate_id = previni fixação de sessão, a cadas requisição enviada no servidor, um novo ID é atribuido a sessão.


Tempo para expirara sessão

session.cache_expire = 180 valor padrão no php.in

com a a funcao session_cache_expire() é possivel configurar um novo valor ou exibilo


session.use_trans_id = 0, vem desabilitado por padrao, quando o habilitado não permite o usuario gerencie o valor da sessão via URL

echo session_cache_expire();


session_cache_expire(50);
*/
/*
Verificação de sessão por IP

*/
session_start();
$_SESSION['teste'] = 123;
 
/*print_r($_SERVER['REMOTE_ADDR']); // IP DO USUARIO
print_r($_SERVER['SERVER_ADDR']); // IP DO SERVIDOR 
print_r($_SERVER['REQUEST_METHOD']); // METHODO UTILIZADO NA REQUISIÇÃ*/

$cookie = substr((strstr($_SERVER['HTTP_COOKIE'], '=')), 1);
if($cookie == $_COOKIE['PHPSESSID']){
	//echo "iguais";
}

/*
htmlentities - Converte todos os caracteres aplicaveis em entidades html
*/

$user 		= htmlentities(filter_input(INPUT_POST,'cpf'));
$password 	= htmlentities(filter_input(INPUT_POST,'senha'));
$AccessCode = htmlentities(filter_input(INPUT_POST,'cod_acesso'));


//echo htmlspecialchars("<script>alert(document.cookie)</script>");
/*

if(!array_key_exists('usuario', $_SESSION)){
	if($user && $senha) {
		$userDefault = '321654';
		$passwordDefault = md5('789456');

		if($user == $userDefault){
			if(md5($password) == $passwordDefault){
				$_SESSION['usuario'] = $user;

				echo "hello $user your access code is $AccessCode";
			}
		} else {
			echo "some problem";
		}
	}

?>

<html>
<body>
<form method='post'>
cpf:<input type='text' name='cpf'>
<br>
senha:<input type='password' name='senha'>
<br>
cod<input type='text' name='cod_acesso'>
<br>
<input type='submit' name='teste'>
</form>
</body>
</html>

<?php

} else { 
?>

<html>
 <body>

 Olá bem vindo <?php echo $_SESSION['usuario']; ?>
 seu codigo de acesso é <?php echo $AccessCode; ?>
 
 </body>
 </html>

<?php
}


htmlentities — Converte todos os caracteres aplicáveis em entidades
 
echo "<pre>"; 

echo  htmlentities('https://mail.google.com/', ENT_QUOTES); 
 
Cross Site Request Forgeries

SQL INJECTION

*/


$dados = array (
			'nome' => 'joao',
			'email'=>'joao@contato.com'
		);

$campos  = array_keys($dados);
$valores = array_values($dados);

$sql = "INSERT INTO usuarios (".implode(',',$campos). ") 
	VALUES ('".str_replace(',',"','",implode(',',$valores))."')";


ini_set('display_errors',1); 
$page = 'phpinfo();';
 
/*
eval("$page;");
eval = executa uma string como código PHP


INPUT FILTERING

filter var = filtrar dados em nossas aplicações
terceiro parametro, um array associativo com flags

FILTER_VALIDATE_EMAIL = valida email
FILTER_VALIDATE_INT = filtra inteiro
*/

$email = 'onesimobatista@gmail.com';

$mailFilter = filter_var($email, FILTER_VALIDATE_EMAIL);


/*
filter_input

INPUT_GET
INPUT_POST
INPUT_COOKIE
INPUT_SERVER
INPUT_ENV
INPUT_SESSION 
 
*/

$clean = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);


 