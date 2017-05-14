<html>
<head>
<title>Notícias</title>
<!--Index do html
Projeto Intranet Senai
Data: 26/02/2014 
-->
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="UTF-8">
<link rel="icon" href="Recursos/Imagens/icon.png">

<link rel="stylesheet" type="text/css" href="Layout/estilo.css">
<script src="Recursos/jquery/jquerymenu.js"></script>
</head>
<body>
	<!--Esta é a parte do cabeçalho do código -->
	<?php
	include "cabecalho.php";
	?>
	
	
	<!--Parte responsavel pelo funcionamento dos menus -->


	<div style="position: relative;
	top: 10%;
	margin: 0 auto;
	min-width: 1000px;
	max-width: 1000px;">
		<br>
		<br> <img src="Recursos/Imagens/seta.png"><font size="2">Você está aqui : <a
			href="index.php" class="cor">INTRANET SENAI</a></font> <br>
		<br>
		<div id="noticiacompleta">
			<div id="titulocompleto">Noticia</div>
			<br>
			<div style='position: relative; left: 20px; width: 750px;'>
	<?php
	//aqui é pego a id
	//após isso é informado a notica completa sobre a noticia que o usuário clicou
	if(!isset($_GET["id"])){
		echo "Nenhuma Notícia Encontrada.";
	}
	
	if(isset($_GET["id"]) and is_numeric($_GET["id"])){
	$id = $_GET ["id"];
	
	if(empty($id)){
		echo "Nenhuma Notícia Encontrada";
	}else{
	$result = mysqli_query ( $conexao, "SELECT * FROM Noticia WHERE Id = $id " );
	
	while ( $row = mysqli_fetch_array ( $result ) ) {
		echo "<p align='justify'> <div style='width:770px;word-wrap: break-word;'><h2>" . $row ["Titulo"] . "</h2><br>Data da Postagem : " . date ( "d/m/Y", strtotime ( $row ['Data_post'] ) ) . "<br>";
		echo "<img src='Recursos/noticias/$row[Imagem]' width='750' height='400'><br><br>";
		echo "<h3>" . $row ["Descricao"] . "</h3><br><br>";
		echo $row ["Texto"] . "<br><br></div>";
		$result1 = mysqli_query ( $conexao, "SELECT * FROM Usuario WHERE NI =" . $row ["autor"] );
		$row1 = mysqli_fetch_array ( $result1 );
		echo "<br><br><br><br><br>Autor da Notícia : " . $row ["autorvdd"]."<br><br><br><br><br></p>";
	}
	}
	}
	?>
	</div>
		</div>
		<br>
		<br>


	</div>
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

</body>
</html>