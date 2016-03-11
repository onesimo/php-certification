<?php

class Pessoa{
	protected $nome = 'Joao';
	protected $idade = 29;
	protected $email = 'joao@net.com.br'


	public function getAlldados(){
		return $this;
	}

}