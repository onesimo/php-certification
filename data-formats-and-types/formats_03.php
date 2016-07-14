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

*/

$cliente = new SoapClient();


