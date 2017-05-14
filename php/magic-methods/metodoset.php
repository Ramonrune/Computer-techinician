<?php
class Pessoa
{
	// Propriedades privadas
	private   $nome;
	private   $idade;
	
	// __set � invocado quando tentamos alterar o valor de uma propriedade com
	// visibilidade protegida ou privada
	function __set( $propriedade, $valor ) {
		if ( $propriedade === 'idade' ) {
			if ( is_numeric( $valor ) ) {
				$this->$propriedade = $valor;
			}
		} else {
			$this->$propriedade = 'Valor n�o alterado';
		}
	}
	
	// Um m�todo p�blico para exibir os dados
	public function exibe() {
		echo $this->nome . ' ' . $this->idade . '<br>';
	}
}
 
// Pessoa
$pessoa = new Pessoa();
 
$pessoa->nome  = "Ramon";
$pessoa->idade = 22;
 
$pessoa->exibe(); // Valor n�o alterado 22
?>