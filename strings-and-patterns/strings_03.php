<?php 

/*
NOWDOC - as simples, não interpreta variaveis
HEREDOC - as duplas, interpreta variais

Strings
*/

//retorna a posição do caracter encontrado
//print strpos("abcde", 'b'); // 1



if(strpos("abcde",'a')){
	print ("a existe mas não exibe");
}

if(false === strpos("abcde",'a')){
//print("eis a solução compara usando === com false");
}
/*
terceiro parametro, qual ponto da string começa a busca
se utilizar valor negativo é exibo um WARNING e a função retorna false*/
if(false === strpos("abcde",'a',1)){
//print("eis a solução compara usando === com false");
}

/*
stripos = é strpos com case-insensitive

Strings como arrays
*/

$nome  = 'Onesimo Batista';

for ($i = 0 ; $i < strlen($nome); $i++){
	//echo $nome[$i]; // Onesimo Batista
}

/*
Strstr
retorna parte de uma string
*/

$email = 'php@php.net';
/*print strstr($email, '@'); //@php.net
print strstr($email, '@',true);//php*/

/*
substr
extrai parte de uma string, primeiro parametro, string,
segundo inicio e terceiro TAMANHO do retorno


start negativo começa da direita
lenght negativo subtrair os caracteres da direta


echo substr('onesimo',4,1); // i
echo substr('onesimo',-4,-2); // si

trim, ltrim, rtrim

Remove espaços em branco
echo trim(" PHP "); //php

echo trim("bPHPa", "a"); // bPHP

remove caracter da esquerda
echo ltrim('aPHPa','a'); //PHPa;

remove caracter da direita
echo rtrim('aPHPa','a'); //aPHP;

chop é um atalho para trim

Str_replace
*/

$texto = "O carro e preto e branco";

//echo str_replace('preto','azul', $texto); // o carro é azul e branco

//echo str_replace(array('preto','branco'),'azul', $texto); // O carro e azul e azul

str_replace(array('preto','branc'),['amarelo','azul'], $texto, $substituicoes); // O carro e amarelo e azul

//echo $substituicoes; = 2

/*
Strcasecmp - comparações binarias
independente de letras maiúsculas ou minúsculas

O mesmo comportamento levando em consideração maiúsculas e minúsculas utilize: strcmp

$string1 = 'olá';
$string2 = 'OLá';

echo strcasecmp($string1, $string2); //0

Similadirade entre strings
*/

$str1 = 'Rua Pedro da Silva';
$str2 = 'Rua Pedro da Costa';

//Retornar o número de caracteres em ambas strings
similar_text($str1, $str2, $porcentagem); // 11

levenshtein($str1, $str2); // returna o numero de caracteres que é preciso altera para ficarem iguais


/*
Contanto caracteres

strlen
*/

strlen('1\n2'); // aspas simples não impreta = 4
strlen("1\n2"); // aspas compostas impreta = 3
strlen("1\n2\t"); // aspas compostas impreta = 4

/*
Contando as palavras
str_word_count

echo str_word_count('Zend Certificied Engineer'); = 3

Funções Fonetica
soundex 
verifica strings com sons parecidos, retorna uma chave
*/
$str1 = 'Rua Pedro da Silva';
$str2 = 'Pedro Joao Pereira da Otaviano';

if (soundex($str1)  == soundex($str2)){
	//echo soundex($str1)."iguais".soundex($str2);
}

/*
Metaphone - 
uma função mais precisa que a soundex
*/

$str1 = metaphone('Jhon snow');
$str2 = metaphone('jhon is now');


if ($str1 == $str2){
	//echo "sao iguais";
}

/*
Transformando strings
*/
$nums = '1.2.3.4.5';

//Terceiro parametro - quantidade de elementos
$ar_num = explode('.',$nums,3);
/*print_r($ar_num);
Array
(
    [0] => 1
    [1] => 2
    [2] => 3.4.5
)

Implode - transforma array em string
-as chaves são desconsideradas
-não tem terceiro parametro
*/

$array  = array('azul','vermelho','preto');
$string = implode('-',$array);

//echo $string; // azul-vermelho-preto
/*
Transformando as saídas com printf
d = decimal
s = string
f = float


printf = para especificar a posição é necessario utilizar aspas simples.


printf('O %2$s vai tirar certificacao %1$s versao %3$.1f ', 'Zend','Joao',5.5); // = O Joao vai tirar certificacao Zend versao 5.5

//printf("%d", "17,999"); // 17

*/
sprintf('Essa funcao %s nao %s', 'retorna','imprimi'); // para imprimir é preciso de um print echo etc..

/*
vprintf

mesmo comportamento que printf, porém as variáveis são passadas por array



vprintf("eu tenho um %s de cor %s", array('carro','preta')); // eu tenho um carro de cor preta


fprintf = mesmo comportamento que printf, porém envia um string formatada de resouce
*/ 
$file = fopen('arquivo.txt','w+');
fprintf($file, "Hello %s",'Word');

/*
fopen cria um aquivo e fprintf escreve nele
fprintf não aceita argumentos via array  

EXPRESSÕES REGULARES
*/

$texto = "eis aqui um texto para testes texto";
$padrao = "/texto/";

//retorna valor boleano
preg_match($padrao, $texto, $ocorrencias);

//preg_match_all percorre todo a string para bucar ocorrencias
preg_match_all($padrao, $texto, $ocorrencias);
//print_r($ocorrencias); // array com dois elemento livro

//validação de um número telefone
if(preg_match('/^\([0-9]{2}\)[0-9]{4}-[0-9]{4}$/i', 
'(11)1111-2222')){
	//print 'yes';
}else{
	//print 'no';
}

/*
preg_replace
Busca padrões e troca os valores
*/

$text = "eis um texto para um teste";

preg_replace("/um/", "1", $text); //eis 1 texto para 1 teste

//serie de padrões em um array
preg_replace(["/um/","/para/"], "1", $text);//eis 1 texto 1 1 teste

$text = "no dia 12/12 e no dia 11/01";

preg_replace('/\/\d{2}/', '${2}', $text);

/*
Questões

Qual é a saida?
*/

$str = 'abc';

strpos($str,'a'); // 0

if(!strpos($str,'a')){
	//echo '1'; // correta ou seja não 0 
}else{
	//echo '1';
}

/*
Qual a principal diferenca entre HEREDOC E NOWDOC?

 - NOWDOC não interpreta variáveis, mas HEREDOC interpreta.

Qual a saida a seguir
*/

function append($str){
	$str = $str.'append';
}
function prepend(&$str){
	$str = 'prepend'.$str;
}
$string = 'zce';
append(prepend($string));

//echo $string; // prependzce
  
/*
Qual é a saida gerada pelo código a seguir?
*/
$string = '14302';
$string[$string[2]] = '4';
$string; //14342

/*
Qual é o valor da variável $foo após executar o código a seguir?

obs: strpos retornar false se não encontrar nada

strpos - encontra a posicao da primeira ocorrencia
strrpos - encontra a posicao da ultima ocorrencia 
verifica tabela  tabela ASCII
*/
$foo = strpos("I can see two monkeys",116); 
 
/*
$foo é igual a 10 porque o 116 representa t na tabela ASCII, t esta na posicao 10

Qual a função para descobrirmos o tamanho de uma string?

- strlen()

Qual o paradrão de expressão reguar utilizado pelo PHP PCRE


O que o código a seguir faz?
*/
$var = 2;
str_replace('a','z',$str, $var);
/*
substitui a por z e colca a quantidade substições na variavel $var


Qual a função para criarmos um array a partir de um string?

R: explode
*/