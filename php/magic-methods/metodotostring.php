<?php
class Pessoa
{
	public function __toString() {
		return 'Isso é um objeto.';
	}
}
 
// Pessoa
$pessoa = new Pessoa();
 
// Exibe: Isso é um objeto amigo
echo $pessoa;
?>