<?php 
class Pessoa{
	function __call($metodo,$parametros){
		echo 'O metodo '.$metodo.' n�o existe.';
		echo '<br>Parametros enviados :';
		print_r($parametros);
		echo '<br>';
	}
	
}

$pessoa = new Pessoa();

$pessoa->casar('Nome','data');


?>
