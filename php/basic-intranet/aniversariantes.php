<?php 
	include "Conexao.inc";
	$data = date("d/m");
	$resultado = mysqli_query($conexao, "SELECT * FROM funcionario");
	if($resultado === FALSE){
		die(mysql_error());
	
	}
	
	while($row = mysqli_fetch_array($resultado)){
	
		if(date('d/m', strtotime($row["data_nasc"]))==$data){
			echo "<hr>";
			echo "<table>";
			echo "<tr>";
			echo "<td>";
			echo "<img src='Recursos/funcionario/$row[foto]' width='70' height='70'>";
			echo "</td>";
			echo "<td valign='top'>";
			echo $row["nome"];
			echo "<br>";
			echo "Ramal : ".$row["Ramal"];
			echo "</td>";
			echo "</tr>";
			echo "</table>";
			echo "<hr>";
		}
	
	
		
	
	}
	
	
	
	
	mysqli_close($conexao);
	
	?>