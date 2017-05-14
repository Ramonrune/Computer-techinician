<?php

class ModelFormulario{

	public function Carregar(){
		echo '<table>
		<tr>';
		require 'config.inc';
		

			$resul = mysqli_query($conexao, "SELECT * FROM formularios ORDER BY  nome ASC");
			if($resul === FALSE){
				die(mysql_error());
					
			}
				
			while($row = mysqli_fetch_array($resul)){
					
				echo "<td style='width:77%;'>"."<a href='Recursos/formularios/$row[nome].$row[extensao]'><font color='blue'><font size='4'><b>".$row["nome"]."</b></font></font></a></td>";
					
					
				echo "<td>"."<a href='Recursos/formularios/$row[nome].$row[extensao]'><font color='blue'><font size='4'><b>".$row["referencia"]."</b></font></font></a></td>";
					
				echo "</tr>";
			}
				
		
		
		mysqli_close($conexao);
	
			echo '</table>';
			
	}
	
	public function Inserir(){
		require 'config.inc';
		$resultado = mysqli_query ( $conexao, "INSERT INTO formularios values(null,'aaaaa','aaaaaa','20150619','111','1','1');" );
		echo "Formulario Enviado Corretamente0000000000000000000000000000000000000000000000000000000!<br>";
	}
}

?>