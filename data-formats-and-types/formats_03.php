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
$LoadHtml->loadXML($xml02);

print_r($LoadHtml);
