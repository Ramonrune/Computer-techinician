<?php 
class Pessoa{
	private $nome = 'Ramon';
	private $idade = 17;
	
	
	function __get($propriedade){
		return 'Propriedade privada: $this->' . $propriedade . 
		' = ' . $this->$propriedade;
	}
	
	
}

$pessoa = new Pessoa();
echo $pessoa->nome;
echo '<br>';
echo $pessoa->idade;






?>



