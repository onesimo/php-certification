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

		print 'bebida escolhida '.$bebida;
	}
}

$copo = new Copo();

/*
$data = get_class_methods('Copo');

Array
(
    [0] => adicionarBebida
)

*/
 
/*$data = get_class_vars('Copo');
Array
(
    [tamanho] =>
    [cor] =>
)


Duas formas de acessar uma constante

echo Copo::LIMIT;
echo $copo::LIMIT;


Class Abstratas

- metodos abstratos devem ser implementados na classe filha, caso contrário exibirá um FATAL ERROR
- metodos que não são abstratos precisam de um corpo
- classes abstratas não podem ser instancias, caso seja gerará um FATAL ERROR
*/

abstract class WebService{
	abstract function tratarRequisicao();
	abstract function tratarResposta();
}


class WebServiceJson extends WebService{
	function tratarRequisicao(){

	}

	function tratarResposta(){

	}
}

class WebServiceXml extends WebService{
	function tratarRequisicao(){

	}

	function tratarResposta(){

	}
}

/*
Traits
- podem ter propriedas assim como uma classe
- Metodos na classe filha sobrescreve os metodos da trait
- Podem ter metodos abstratos assim como em uma classe
*/

trait log{
	public function gravar($msg){
		return file_put_contents('log.txt', $msg);
	}
}

class GerenciadorDeLog{
	use Log;

	public function gravar($msgs){
		print 'esse metodo substitui o metodo da trait';
	}

}

$glog = new GerenciadorDeLog();
#$glog->gravar('essa msg');

/*
Interfaces
- Todos os metodos devem ser implementas na classe que implementa

*/


interface carro{
	public function acelerar();
	public function parar();
}

class CarroPequeno implements carro{
	public function acelerar(){}
	public function parar(){}
}

/*
FINAL -  a palavra reservada final bloquea a heranca da classe ou metodo.
- caso tente herdar um classa com a palavra FINAL exibirá um FATAL ERROR
- caso tente sobrescrever um metodo com palavra final exibira um FATAL ERROR
- uma classe com a palavra final pode ser instanciada normalmente, mas não herdad, um  metodo com a palavra final pode ser utilizado normalmente, mas não pode ser sobrescrito
*/

 class Tv{

	final public function mudarCanal2(){

	}
}

final class SmartTv extends Tv{
	 public function mudarCanal(){
		echo "teste";
	}
}

$tv = new SmartTv();

$tv->mudarCanal2();


/*
Modificadores de Acesso

public - pode ser acessado livremente
protected - so pode ser utilizar dento da classe ou de uma classe filha

private - pode ser acessado somente dentro da própria classe
*/

class Carro2{
	protected $marca ='GM';
}

$car = new Carro2;
//$car->marca = 'Ford'; // FATAR ERROR



/*
$this - variavel especial

$this = 'teste';
Fatal error: Cannot re-assign $this in D:\xampp\htdocs\php-certification\object-oriented-programming\oop_03.php on line 171


Métodos Mágicos
*/

Class Pessoa{ 

	function __construct(){
		print ' construtor '.PHP_EOL;	
	}

	function __destruct(){
		print ' destruidor '.PHP_EOL;
	}

	/*
	Chamado quando um metodo esta inacessivel ou é inexistente
	 - obrigatorio ter 2 parametros, metodo e argumentos
	*/
	function __call($method, array $args){
		
		print 'metodo '. $method.PHP_EOL;

		foreach ($args as $argumento) {
			print $argumento.PHP_EOL;
		}
	}

	public function __get($nome){
		print 'tentando acessar propriedade '.$nome.PHP_EOL;
	}

	public function __set($nome, $valor){
		print 'tentativa de acessar a propriedade '.$nome. ' valor '.$valor.PHP_EOL;
	}
}

$pessoa = new Pessoa();
//$pessoa->MetodoInexiste(1,2,3,3);

echo $pessoa->nome;
$pessoa->nome = 'joao';

sleep(2);