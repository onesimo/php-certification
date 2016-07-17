<?php

$array = ['a' => 'casa','b' => 'carro','c'=>'roupas'];
$array[] = 'sapato';

/*print_r($array);
Array
(
    [a] => casa
    [b] => carro
    [c] => roupas
    [0] => sapato
)


Chaves
não é possivel utilizar objetos e arrays como chaves
floats vão sr convertidos para inteiros
-no caso de chaves iguais, é utilizado o ultimo elemento e descartado os outros
*/

$livros = [ 1.2 => 'PHP', 1.3 => 'PHP2' ];

/*print_r($livros);

Array
(
    [1] => PHP2
)
*/

$matriz=[
		'cat1' => [ 
			'sub1',
			'sub2' => [
				'subsub1'
			]
	],
		'cat2' => [ 
			'sub1',
			'sub2'
	]
];
 
/*
echo count($matriz,1); //7
echo count($matriz); //2

a funcão cont tem como o valor 0 padrão no segundo parametro,
caso coloque o valor (1 ou COUNT_RECURSIVE) ira contar toda profundidade do array
*/

$array = [
	1 => 'a',
	"1" =>'b',
	1.5 => 'c',
	true => 'd',];

/*
a virgula no ultimo elemento é opcional

print_r($array);


unset($array[$posicao]) = remove um elemento do array
unset($array) = apaga todo o array

Ordeção de arrays

*/
$carros = [
'gol',
'fiesta',
'uno',
];
sort($carros); // retornar verdadeiro em caso de sucesso, falso se não conseguir orderna

/*
sort($carros);
sort($carros, SORT_REGULAR); // parametro padrao
 Array
(
    [0] => fiesta
    [1] => gol
    [2] => uno
)
*/ 

$num = ['29','112','14'];

sort($num, SORT_NUMERIC);
/*
Array
(
    [0] => 14
    [1] => 29
    [2] => 112
)
*/
sort($num, SORT_STRING);
/*
Array
(
    [0] => 112
    [1] => 14
    [2] => 29
)
*/
$string =[
'PHP', 'php','abc','olá'];
sort($string, SORT_STRING);
/*

Array
(
    [0] => PHP
    [1] => abc
    [2] => ol├í
    [3] => php
)*/


sort($string,SORT_LOCALE_STRING);

/*print_r($string);
Array           
(               
    [0] => PHP  
    [1] => abc  
    [2] => ol├í 
    [3] => php  
)               
*/

$alpha = ['b','x','v','a'];
sort($alpha,SORT_NATURAL);

/*print_r($alpha);
SORT_NATURAL - ordena alfabeticamente
Array
(
    [0] => a
    [1] => b
    [2] => v
    [3] => x
)

RSORT - reverse sort
*/

$alpha = ['b','x','v','a'];
rsort($alpha);
/*print_r($alpha);

Array
(
    [0] => x
    [1] => v
    [2] => b
    [3] => a
)

asort = mantem relação entre as chaves
*/

$alpha = ['b','x','v','a'];
asort($alpha);
/*
print_r($alpha);
(
    [3] => a
    [0] => b
    [2] => v
    [1] => x
)

arsort = igual a rsort porem mantem a relação das chaves
*/
$alpha = ['b','x','v','a'];
arsort($alpha);

/*
print_r($alpha);

Array
(
    [1] => x
    [2] => v
    [0] => b
    [3] => a
)

ksort - ordena os arrays pelas chaves
*/
$produtos = [
	'a' => 'sabao', 
	'A'=>'detergente',
	'c' => 'sabonte',
	'1'=> 'vassoura'];


ksort($produtos);
/*print_r($produtos);
Array
(
    [A] => detergente
    [a] => sabao
    [c] => sabonte
    [1] => vassoura
)

krsort - igual a ksort, porém com a ordem inverdita
*/

krsort($produtos);
/*
print_r($produtos);
Array
(
    [1] => vassoura
    [c] => sabonte
    [a] => sabao
    [A] => detergente
)

usort = user funcão, ou seja, ordena por uma função definda pelo usuário


*/
$produtos = [
	'a' => 'sabao', 
	'A'=>'detergente',
	'c' => 'sabonte',
	'1'=> 'vassoura'];

usort($produtos, function($a, $b){
	//echo($a. ' - '.$b.PHP_EOL);
	//return ($a > $b) ? -1 : 1;
});

/*
natsort - ordena de forma natuaral para os seres humanos

*/

$imagens = [
'img12.png',
'img10.png',
'img2.png',
'img1.png',
];

sort($imagens);
/*
print_r($imagens);
Array
(
    [0] => img1.png
    [1] => img10.png
    [2] => img12.png
    [3] => img2.png
)
*/
$imagens = [
'img12.png',
'img10.png',
'img2.png',
'img1.png',
];
natsort($imagens);
/*
print_r($imagens);
Array
(
    [3] => img1.png
    [2] => img2.png
    [1] => img10.png
    [0] => img12.png
)


funções, dicas para decorar
A - sempre mantém relação em chaves
R - reverse, ordem contrária
U - função definida pelo usuário
K - ordena pelas chaves

Adicionado e removendo elementos

array_push - adiciona elemento no final e retornar o numero total de elemntos, a função passa o array por referência.
*/
$nomes = ['joao','maria','madalena','paulo'];
 
array_push($nomes, 'onesimo'); // retornar um numero total de elementos, como os novos valores inseridos
 

/*
print_r($nomes);
Array
(
    [0] => joao
    [1] => maria
    [2] => madalena
    [3] => paulo
    [4] => onesimo
)

array_unshift - adiciona elementos no inicio do array e retorna o numero total de elementos no array
*/

array_unshift($nomes,'mateus'); // retorna o total de elementos

/*
Removendo elementos

array_shift - remove elementos no inicio do array e retonar o elemento removido
array_pop  - remove elementos no final do array e retonar o elemento removido
*/
array_pop($nomes); // onesimo
array_shift($nomes); // joao

/*

array_walk - percorre o array chamando um uma função callback

*/
$versoes = [
	'PHP 5.2',
	'PHP 5.3',
	'PHP 5.4',];


array_walk($versoes, function($item){
	//printf('%s', $item.PHP_EOL);
});
/*
PHP 5.2
PHP 5.3
PHP 5.4
*/


//no segundo parametro podemos passar a chave
array_walk($versoes, function($item, $chave){
	//printf('%s - %s', $item,$chave.PHP_EOL);
});
/*
PHP 5.2 - 0
PHP 5.3 - 1
PHP 5.4 - 2
*/
$dataLancamento = [
'01/02/1990',
'01/02/2000',
'01/02/2020',];

//no segundo parametro podemos passar a chave
array_walk($versoes, function($item, $chave, $dadoExtra){
	//printf('%s - %s lancamento - %s', $item,$chave, $dadoExtra[$chave].PHP_EOL);
}, $dataLancamento);
/*
resultado do array walk
PHP 5.2 - 0 lancamento - 01/02/1990
PHP 5.3 - 1 lancamento - 01/02/2000
PHP 5.4 - 2 lancamento - 01/02/2020
*/
//print_r($versoes);

$total = 0;

$versoes = [
	'PHP 5.2',
	'PHP 5.3',
	'PHP 5.4',];

array_walk($versoes, function ($item, $chave) use (&$total){
	$total++;
});

//print $total; //3

/*
Unindo e comparando arrays

array_merge - passa parametros por valor e não referencia, elementos com o mesmo valor não sao sobrescritos 
*/
$animais = [];

$unir = array_merge($animais,['gato'],['cachorro']);

/*
print_r($animais);
Array
(
)
*/

/*
print_r($unir);
Array
(
    [0] => gato
    [1] => cachorro
)

*/

$unir = array_merge($unir,['tigre'],['tigre'],['leao']);

/*print_r($unir);

Array
(
    [0] => gato
    [1] => cachorro
    [2] => tigre
    [3] => tigre
    [4] => leao
)

array_merge - elementos com a mesma chave associativa(chaves do tipo string sao sobrescritas, já numericas não) são sobrescritos e o valor do ultimo elemento é o que prevalece
*/
$uniao = array_merge($unir, 
	['gato'], 
	['c' => 'cachorro'], 
	['c' => 'cachooro grande']
	);

/*
no array_merge as chaves numericas sao reordenadas
*/

$array1 = [
	'l' => 'laravel',
	  1 => 'silex',
	  2 => 'symfony'
];

$array2 = [
	'd' => 'doctrine',
	  1 => 'eloquent',
	'd' => 'zend' 
];


/*
print_r(array_merge($array1,$array2));

Array
(
    [l] => laravel
    [0] => silex
    [1] => symfony
    [d] => zend
    [2] => eloquent
)

Array_Diff diferença de A pra B
*/

$a = ['pedra','papel'];
$b = ['tesoura'];

/*print_r(array_diff($a,$b));
Array
(
    [0] => pedra
    [1] => papel
)

array_diff compara apenas valores não levando em consideração suas chaves, para considerar as chaves de um array usa-se a função array_diff_assoc
*/
$a = ['p'=>'pedra','papel'];
$b = ['tesoura','pedra'];

/*print_r(array_diff_assoc($a, $b));

Array
(
    [p] => pedra
    [0] => papel
)

array_diff_keys - compara apenas as chaves
*/

$a = ['a' => 'arroz',  'f' => 'feijao'];
$b = ['c' => 'camarao','z' => 'arroz'];

/*
print_r(array_diff_key($a, $b));
Array
(
    [a] => arroz
    [f] => feijao
)

array_diff_uassoc - 
*/
$a = [1, 2, 'c' => 'carro'];
$b = ['a' => 'carro', 3, 5];
/*
print_r(array_diff_uassoc($a,$b, function($a, $b){
	return 0;
}));


Array
(
    [0] => 1
    [1] => 2
    [c] => carro
)

array_diff_ukey = mesmo comportamento que array_diff_uassoc, só que compara as chaves              
*/

$a = [
	'b' => 1, 
	'a' => 'carro',
	'c' => 3,
	];

$b = [
	'c' => 'carro',
	'a' => 'nada',
	5
	];
/*
print_r(array_diff_ukey($a,$b, function($a_chave, $b_chave){
	
	if($a_chave === $b_chave){
		return 0;
	} else if($a_chave > $b_chave){
		return 1;
	} else{
		return -1;
	}

}));


λ php arrays_03.php
Array
(
    [b] => 1
)

Vericando um valor de um array
*/

if(empty($a)){
	echo 'vazio';
}


if(!isset($a)){
	echo 'vazio';
}

if(array_key_exists('chave', $a)){
	echo 'a chave existe';
}
/*
Geradores
Podemos iterar sobre o gerador
*/

function meuGerador(){
	for($i = 0; $i < 10; $i++){
		yield $i;
	}
}

foreach (meuGerador()  as $num){
	//print $num; //0123456789
}

/*
lIST
forma facil e elegante de atribuir valores ao elementos de um array

*/

$pc = [
	 'intel',
	 '8gb',
	 '1tb',
	 'widescreen'];

list($cpu, $memoria, $hd, $monitor) = $pc;
//print '  cpu '.$cpu.' memoria ram '.$memoria.' e hd '.$hd; //cpu intel memoria ram 8gb e hd 1tb

list($idade, $altura, $nome) = ['26', 'onesimo','1,70'];

//print '  idade '.$idade.' altura '.$altura.' nome '.$nome; //idade 26 altura onesimo nome 1,70


/*
Qual a saida?
*/

$array = [
	"1" => "A",
	1 => "B",
	"C", 
	2 => "D"
];

//print count($array); //2

/*
Que voce usaria para criar um array a partir de outros tres?

a - suffle (); mistura elementos de um array
b - array_intersect(); retornar todos elementos do primeiro array qye esta no outros
c - array_merge() - correta
d - list
e - implode
f - array_combine - cria um array usando um array para chaves e outro para valores
d - array_splice - remove parete de um array

Qual a saída gerada pelo código a seguir?
*/

$array = array(0.1 => 'a', 0.2 => 'b');
/*
echo count($array); // resposta 2

2Array
(
    [0] => b
)

Qual a saída do código abaixo?

 
function sort_array($array){
	return sort($array);
}
$a = array(3,2,1);

var_dump(sort_array(&$a));
 
//a referencia deve estar na no parametro da funcao 

a - NULL
b - a =>1, => 2, 2=>3
c - um erro de referência invalida - correta
d - 2 => 1, 1 => 2, 0=3
c - bool(true)

Qual das funções formam um array associativo válido?
selecione 2
*/
$um = ['um','dois','três'];
$dois = [1,2,3];

/*
a - array_combine - cria um array usando um array para chaves e outro para valores

b - array_merge - cria um array a partir de outros

c - array_values - retorna todos valores num array indexado numericamente

d - array_flip - transforma os valores em chaves - somente um parametro


Qual função usada para saber se uma determinada chave de um array existe?

R: array_key_exists

Qual a saida do código a seguir?


$array =['um', 'dois', 'tres'];

print $array[3];

a - tres

b - E_NOTICE  // R: correta

c - FATAL ERROR


Qual funcao ordena um array do maior para o menor valor?

a sort
b rsort - correta
c array_Walk
d asort

Qual função utilizamoa para contar os elementos de um array ?

R: count

qual funcao utilizamos para diferenciar um array do outro independentement das chaves do array?

R: array_diff
*/



