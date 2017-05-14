<html>
<head>
<title>Galeria</title>
<!--Index do html
Projeto Intranet Senai
Data: 26/02/2014
-->
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="icon" href="Recursos/Imagens/icon.png">
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="Layout/estilo.css">
<link rel="stylesheet" type="text/css" href="Recursos/slidegaleria/amazingslider-1.css">
<script src="Recursos/jquery/jquerymenu.js"></script>

</head>
<body>
	<!--Esta é a parte do cabeçalho do código -->
		<?php
		include "cabecalho.php";
		?>
	
	


	<div id="titulogaleria">
		<br> Galeria SENAI Alvares Romi
	</div>
	
	<div style="position: relative;
	top: 10%;
	margin: 0 auto;
	min-width: 1000px;
	max-width: 1000px;">
	
<br>


		<br><br><br>
		<table>
			<tr>
	
	<?php
	// aqui é mostrado todos os albuns da galeria
	include "Conexao.inc";
	$resultado = mysqli_query ( $conexao, "SELECT * FROM Album" );
	if ($resultado === FALSE) {
		die ( mysql_error () );
	}
	$cont = 0;
	while ( $row = mysqli_fetch_array ( $resultado ) ) {
		if ($row ["id"]) {
			$cont += 1;
		}
		$quantidade = strlen($row["Nome"]);
		echo "<td><div class='draggable' >";
		echo "<a href='galeriaalbuns.php?pasta=$row[Nome]'><img src='Recursos/capagaleria/$row[thumb].$row[extensao]' width='200' height='200' id='img' style='cursor:move;'><div id='imagemtitle' style='color:#444;'>";
		if($quantidade<=10){
			echo $row["Nome"];
		}
		else{
			echo substr($row['Nome'],0,10)."...";
		}
		echo "</div></a>";
		echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
		echo "</div></td>";
		echo "<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>";
					if ($cont == 4 or $cont == 8 or $cont == 12 or $cont == 16 or $cont == 20 or $cont == 24 or $cont == 28 or $cont == 32 or $cont == 36 or $cont == 40 or $cont == 44 or $cont == 48 or $cont == 52 or $cont == 56 or $cont == 60 or $cont == 64 or $cont == 70 or $cont == 74 or $cont == 78 or $cont == 82 or $cont == 86 or $cont == 90 or $cont == 94 or $cont == 98 or $cont == 102) {
			echo "</tr>";
		}
		$quantidade=0;
	}
	
	?>
	
		
		
		
		</table>
		<br> <br> <br> <br>
		<!--Parte responsavel pelo rodapé do site -->


	</div>
	
	<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
	<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
		<div id="rodape" align="center" style="position:relative;top:40%;">
	<address>
	Rua Vereador Sergio Leopoldino Alves, 500 - Cidade Industrial<br>
	CEP: 13456-166 - Santa Bárbara d'Oeste - SP<br>
	Telefone: (19) 3499-1450 - senaisantabarbara@sp.senai.br
	<br>
	
	©2015 - 2015 CFP 5.14 - Todos os direitos reservados
	<br>
	<a href="creditos.php" style="color:white;">Créditos</a>
	</address>
	
	</div>
<script src="Recursos/slidegaleria/jquery.js"></script>
<script src="Recursos/slidegaleria/amazingslider.js"></script>
<script src="Recursos/slidegaleria/initslider-1.js"></script>
<script>
$(document).ready( function() {
	  var $draggable = $('.draggable').draggabilly();
	});

</script>
<script src="Recursos/dnd/dnd.js"></script>
	

</body>
</html>