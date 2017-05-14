<?php
class Pessoa
{
	// Propriedades
	private $nome = 'Ramon';
	
	// __isset é invocado quando tentamos utilizar isset ou empty em métodos protegidos ou privados
    public function __isset($name) {
        return isset($this->$name) && !empty($this->$name);
    }
}
 
// Pessoa
$pessoa = new Pessoa();
 
// Utiliza isset em $pessoa->nome
if (isset($pessoa->nome ) ) {
	echo 'Dado existe.';
}
?>