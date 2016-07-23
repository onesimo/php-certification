<?php


/*
Definir valores padrão
- sempre devem ser os os últimos para permitir utilizar a função somente com os obrigatórios.

Passagem de valores por referência
*/

function somarValor(&$a){
	$a += 2;
}

$b = 2;
somarValor($b);

//$b = 4 


function adicionarElemento(array &$colecao, $elemento = null){
	if($elemento !== null){
		$colecao[] = $elemento;
	}
}
 


/*
Fatal error: Only variables can be passed by reference 
adicionarElemento([],'abacaxi');
*/
$frutas = [];
adicionarElemento($frutas = array(),'abacaxi');
/*
print_r($frutas);
Array
(
)
*/
$frutas = [];
adicionarElemento($frutas,'abacaxi');

/*
print_r($frutas);
Array
(
    [0] => abacaxi
)


Retornar valores por referência
*/


class Casa{
	private $luz = 'on';

	public function &retornoPorReferencia(){
		return $this->luz;
	}
}

 
$casa = new casa();

$luz = $casa->retornoPorReferencia();
/*
print $luz; //on

*/

$luz = 'off';

/*
echo $casa->retornoPorReferencia(); //off

Funções Nativas do PHP
*/

function somar(){
	$argumentos = func_num_args();

	if($argumentos > 2){
		throw new \InvalidArgumentException();
		
	}
	$a = func_get_arg(0);	
	$b = func_get_arg(1);

	print $a.'-'.$b.' - '.$argumentos;
}

/*
somar(10,3);
*/

function somarItera(){
	$total = 0;

	foreach (func_get_args() as $params) {
		$total += $params;
	}

	print $total;
}

/*
somarItera(12,12,12,'32');
call_user_func
permite callback
*/
function exibeMsg($nome){
	//print 'hello_'.$nome;
}
call_user_func('exibeMsg','onesimo');

/*
Closures
- funções anônimas 
- geralmente usadas como callback
- podem ser utilizadas como valores de variáveis
- Tem seu próprio escopo
*/

$genMusicais=['pop','rock','blues'];

array_map(function($item){
	//print $item; // poprockblues
}, $genMusicais);

$closure = function(){
	return 'hello';
};

//echo $closure //hello

function saudacao(){
	return function(){
		return 'Bom dia!';
	};
}

$closure = saudacao();

/*print_r($closure)
Closure Object     
(                  
)                  ;
*/

//print $closure(); // bom dia


$nome = 'Teste';

$saudacao = function (){
	//gera um notice - variavel nome fora do escoppo
	return 'Bom dia' . $nome;
};

/*print $saudacao();

Notice: Undefined variable: nome in D:\xampp\htdocs\php-certification\functions\functions_03.php on line 158
Bom dia*/


$nome = 'joao';

$saudacao = function () use ($nome){
	//gera um notice - variavel nome fora do escoppo
	return 'Bom dia ' . $nome;
};

/*
print $saudacao();
Bom dia joao


Forçando um tipo de valor
*/

function prepararAlmoco(array $panela, array $ingredientes){
	foreach ($ingredientes as $ingrediente) {
		$panela[] = $ingrediente;
	}

	return $panela;
}