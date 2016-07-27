<?php 
/*
Constante
*/

class Copo{
	const LIMIT = 100;

	public $tamanho; 
	public $cor;

	function adicionarBebida($bebida, $quantidade){
		if($quantidade > self::LIMIT){
			print 'A quantidade excede o limite suportado pelo copo';

			exit();
		}

		print 'bebida escolhida'.$bebida;
	}
}