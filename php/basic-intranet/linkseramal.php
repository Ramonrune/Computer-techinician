<?php 
 	
 	include "Conexao.inc";
 	$resultado = mysqli_query($conexao, "SELECT * FROM link");
if($resultado === FALSE){
	die(mysql_error());
	
}

	while($row = mysqli_fetch_array($resultado)){



 	echo "<a href='$row[url]' class='cor' target='_blank' style='color:black;text-decoration:none;'>".$row["titulo"]."</a>";
	echo "<br>";

		}


mysqli_close($conexao);
 
	?>