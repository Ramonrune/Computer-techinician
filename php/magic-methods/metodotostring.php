<?php
class Pessoa
{
	public function __toString() {
		return 'Isso � um objeto.';
	}
}
 
// Pessoa
$pessoa = new Pessoa();
 
// Exibe: Isso � um objeto amigo
echo $pessoa;
?>