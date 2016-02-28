<?php

$xml = <<<XML
<?xml version="1.0" encoding="UTF-8" ?>
<livros>
	<livro publicacao="01/02/2015" paginas="212">
		<titulo>A história da programação</titulo>
		<isbn>978-85-7657-455-54</isbn>
		<personagens>
			<personagem>
				<nome>Joao</nome>
				<descricao>Inventor de linguagem PJC</descricao>
			</personagem>
			<personagem>
				<nome>Maria</nome>
				<descricao>Desenvolvedora</descricao>
			</personagem>
		</personagens>
		<enredo>
 			Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque commodo blandit libero sit amet pharetra. Donec id nulla vitae erat imperdiet mollis. Pellentesque in risus nec tortor egestas ultricies. Aenean sollicitudin interdum orci sit amet bibendum. Fusce risus risus, tincidunt at semper vel, tempus eget erat. Sed vitae lorem sit amet nunc bibendum cursus non at neque. Praesent maximus ligula et lorem commodo accumsan. Phasellus fringilla, lectus in sagittis ullamcorper, leo felis pharetra orci, eu vulputate est lectus et arcu. 
		</enredo>
	</livro>
</livros>
XML;

// Carregando uma string
$livros = new SimpleXMLElement($xml);


//Carregando um arquivo diretamente
//$livros = new SimpleXMLElement('texte.xml', NULL, TRUE);

//ALTERANDO DOCUMENTOS XML

//Alterando o titulo do livro
//Xml foi transformado em objeto
$livros->livro[0]->titulo = 'Melhor livro';

//O PARAMETRO DO CONSTRUTOR DO asXML, É UM NOME E EXTENÇAO PARA CRIAÇÃO DE UM ARQUIVO
//echo $livros->asXML();

//Adicionando um novo personagem
$personagem = $livros->livro[0]->personagens->addChild('personagem');
$personagem->addChild('nome', 'Paulo');
$personagem->addChild('descricao', 'Analista de Sistemas');



//Adicionando atributos
$livro = $livros->livro[0];
$livro->attributes()->paginas = 290;

$livro = $livros->livro[0];
$atributos = $livro->attributes();

foreach ($atributos as $valor){
	//echo $valor."</br>";
}
//echo "<pre>";
//Adicionado atributos
$livro = $livros->livro[0];
$livro->addAttribute('editora','Aleph');

//echo $livros->asXML();
//print_r($livros);

function elementoIncial($parser, $nome, $atributos){
	global $livros, $elemento;

	if($nome == 'LIVRO'){
		$livro[] = array();
	}

	$elemento = $nome;
}

function elementoFinal($parser, $nome){
	global $elemento;

	$elemento = null;
}

function texto($parser, $texto){
	global $livros, $elemento;

	if($elemento == 'TITULO' || $elemento =='ISBN' || $elemento == ''){
		$ultimoLivro = count($livros) - 1;
		$livros[$ultimoLivro][$elemento]  = $texto;
	}
}


$parser = xml_parser_create();
xml_set_element_handler($parser, "elementoIncial", "elementoFinal");
xml_set_character_data_handler($parser, "texto");


$arquivo = fopen('texte.xml','r');

while ($dados= fread($arquivo, 4096)) {
	xml_parse($parser, $dados);
}

xml_parser_free($parser);


