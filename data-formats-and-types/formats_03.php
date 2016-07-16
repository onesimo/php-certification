<?php
$xml = "<root/>";

class className extends SimpleXMLElement{

}
/*
E possivel utilizar uma classe propria no objeto extendos SimpleXMLElement para sua class
*/
$dt = simplexml_load_string($xml, 'className', LIBXML_NOERROR,'somenamespace');

/*
O segundo paramentro é um contrutor e o terceiro um nome space
*/
 
$xml02 = <<<FOOBAR
<zce>
 	<basico>
 		<sintaxe>
PHP tags, bitwise
 		</sintaxe>
 	</basico>
</zce>
FOOBAR;
/*
No final do heredoc é necessario um espaco um continuacao do script, a tag final não pode ser o ultimo dado do script
*/

$xml = new simpleXMLElement($xml02);

/*print_r($xml->basico);
SimpleXMLElement Object                    
(                                          
    [sintaxe] =>                           
                        PHP tags, bitwise  
                                           
)                                          
 
print_r($xml->basico->children());
 
SimpleXMLElement Object
(
    [sintaxe] =>
                        PHP tags, bitwise

) 
print_r($xml->basico->sintaxe);
 
SimpleXMLElement Object                        
(                                              
    [0] =>                                     
                        PHP tags, bitwise      
                                               
)                                              

echo ($xml->basico->sintaxe); PHP tags, bitwise

DOM - DOCUMENT OBJECT MODEL
*/

$LoadHtml = new DOMDocument();
/*$LoadHtml->load('/dir/para/arquivo.xml');
$LoadHtml->loadHTML('/dir/para/arquivo.xml');
$LoadHtml->loadHTMLFile('/dir/para/arquivo.html');*/
$data = $LoadHtml->loadXML($xml02);

 
Class NovaClasse extends SimpleXMLElement{}

$handle = simplexml_import_dom($LoadHtml, 'NovaClasse');
$xml = new simpleXMLElement($xml02);

$dom = dom_import_simplexml($xml);
//var_dump($dom);

/*
XPATH e DOMDOCUMENT
*/
 
$xml02 = <<<FOOBAR
<zce>
 	<capitulo id='1'>
 		<language>PHP</language>
 		<op id='1'>windows</op>
 	</capitulo >
 	<capitulo id='2'>
 		<language>PHP 2</language>
 		<op id='2'>windows</op>
 	</capitulo>
 	<capitulo id='3'>
 		<language>PHP 3</language>
 		<op id='3'>windows</op>
 	</capitulo>
</zce>
FOOBAR;
$document = new DOMDocument();
$document->LoadXML($xml02);

$xpath = new DOMXpath($document);
$element = $xpath->query('/zce/basico');
/*
print_r($element);
DOMNodeList Object
(
    [length] => 1
)
Conta os elementos a partir do no

iterando elementos
//print_r($element);
foreach ($element as $no) {
	print $no->nodeValue; // PHP Windows
}
/  começa a busca a partir do no
//  busca elemento, não importa onde esteja
@  Usado para para achar atributos
*/
$elements = $xpath->query('//language');
/*
print_r($elements);
DOMNodeList Object
(
    [length] => 3
)
*/

$elements = $xpath->query('/zce/capitulo[@id="3"]');
/*
print_r($elements);

DOMNodeList Object
(
    [length] => 1
)

XPATH E SIMPLE_XML
*/

$XML = simplexml_load_string($xml02);
$element = $XML->xpath('//capitulo');

/*print_r($element);
Array
(
    [0] => SimpleXMLElement Object
        (
            [@attributes] => Array
                (
                    [id] => 1
                )

            [language] => PHP
            [op] => windows
        )

    [1] => SimpleXMLElement Object
        (
            [@attributes] => Array
                (
                    [id] => 2
                )

            [language] => PHP 2
            [op] => windows
        )

    [2] => SimpleXMLElement Object
        (
            [@attributes] => Array
                (
                    [id] => 3
                )

            [language] => PHP 3
            [op] => windows
        )

)

JSON 

json_encode() transforma dado PHP em JSON
json_decode() transforma PHP em JSON

 
print json_encode([
	'zcpe' =>[
		'basico', 
		'avan"cado'
		]
	], JSON_HEX_QUOT);

 
bitmask
JSON_HEX_QUOT tranforma aspas (") em \u0022
JSON_HEX_TAG tranforma <  > em \u003E e \u003E

o ultimo parametro podemos restringir o tamanho recursivo da pronfundidade

deserializar um objeto JSON
*/
$json = '{"zcpe":["basico","avancado"]}';

/*
print_r(json_decode($json));

stdClass Object
(
    [zcpe] => Array
        (
            [0] => basico
            [1] => avancado
        )

)


SOAP - protocolo de troca de mensagens independente de tecnologia
WSDL - Web Service Description Language
SOAP utiliza apenas XML

para consumir
$cliente = new SoapClient('http://servico.com?wsdl');


Segundo parametro:
style - quando não wsdl não é informado
soap_version - especifica a versão
compression - permite utilizar compressão nas requisições
etc...

__getFunctions retorna lista completa dos metodos disponíveis.

$cliente->__getFunctions();

duas formas de chamar metódos

$cliente->meuMetodo(['param1', 'param2']);
ou
$parametros = [
	'param1' => 'valor1',
	'param2' => 'valor2'
];
$cliente->_soapCall('meuMetodo',[$parametros])
-- é necessário encapsular duas vezes os parametros

Para fornecer o serviço

duas formas de instanciar o servidor
$servidor = new SoapServer('servico.wsdl');
$servidor = new SoapServer(null,['uri' => 'http://local/wsdl']);

Class MeuServico{
	public function ola(){
	
	}
}

$servidor->setClass("MeuServico");
$servidor->handle();

PHP.INI e SOAP

soap.wsdl_cache_enable=1  // habilita cache soap
soap.wsdl_cache_dir='/tmp'  //local que a cache sera armazenada
soap.wsdl_cache_ttl=86400 // quanto utiliza cache no lugar do wsdl
soap.wsdl_cache_limit= 5 //tamanho maximo do cache


REST

Pode utilizar XML ou JSON,

verbos
	GET - leitura
	POST - criar novo serviço
	PUT - atualiza registro
	PATCH - atualiza apenas uma parte do recurso
	DELETE - deleta registros

STATUS 

	1XX - informativos
	2XX - informar sucesso
	3XX - informar redirecionamento
	4XX - erros na requisição
	5XX - erros internos no servidor

REST E PHP

no apache é preciso ativar modo RewriteEngine On

λ curl -X PUT -H "Content-Type: application/x-www-form-urlencoded" -d 'meu_parametro=meu_valor' http://localhost/8989/php-certification/data-formats-and-types/rest.php


DATE

*/

//print date('d/m/Y', time() + 86400); //add um dia na data

$data = new DateTime();

/*
Constantes para padrões

ATOM 	= 'Y-m-d\TH:I:sP'
COOKIE  = 'l, d-m-Y H:i:s'
ISO8601 = 'Y-m-d\TH:i:sO'
RFC822  = 'D, d M y H:i:s 0'
RFC850  = 'l. d-m-y H:i:s T'
RFC1036 = 'D, d M y H:i:s 0'
RFC1123 = 'D, d M Y H:i:s O'
RFC2822 = 'D, d M Y H:i:s 0'
RFC3339 = 'Y-m-d\TH:i:sP'
RSS = 'D, d M Y H:i:sP'
W3C = 'Y-m-d\TH:i:sP'


Adicionar intervalos 
*/

$today = new \DateTime('now');

//função add - soma intervalos
$tomorrow = $today->add(new \DateInterval('P1D'));

/*
ao usar a função add altera tambem o valor do objeto $today

P = periodo (obrigatorio)
Y anos
M Meses
D dias
W semanas - convertidas internamentes para dias
H horas
M Minutos
S Segundos


DATETIMEIMMUTABLE

Utiliza a Class DateTimeImmutable para não alterar o valor inicial do objeto, a classe tem os mesmos metodos com comportamento diferente do DateTime


*/
$today = new \DateTimeImmutable('2016-07-14');
$tomorrow = $today->add(new DateInterval('P1D'));
/*
Definir data

setDate(1997,1,1) funcao para definir data
setTime(10,12,12) funcao para definir horas

*/

$birthDay = new DateTime();

$birthDay->setDate(1990,05,26);
//print $birthDay->format('d/m/Y'); //26/05/1990

$birthDay->setTime(12,05,26);
//print ' - '.$birthDay->format('h:i:s');  // 12:05:26

/*
função sub = para subtrair intervalos
*/
$birthDay->sub(new DateInterval('P26Y'));

//echo $birthDay->format('d/m/Y'); - 26/05/1964

/*
modify perfimite modificar datas de diversas formas
*/

$data = new DateTimeImmutable();
$ontem = $data->modify('-1 day');

$amanha = $data->modify('+1 day');

/*
TIME ZONE
*/

$saoPaulo = new DateTime('now', new DateTimeZone('America/Sao_Paulo'));

$auckland = new DateTime('now', new DateTimeZone('pacific/Auckland'));
 
/*
Descobrir o TimeZone da instancia
*/

$saoPaulo->getTimeZone()->getName(); // America/Sao_Paulo

/*
Se nenhum fuso horario é especificado assume o fuso horario do php.ini
*/

$meuformato = \DateTime::createFromFormat('d/m/Y', '02/07/2016');

//print $meuformato->format('Y-m-d'); //2016-07-02


echo date('F');