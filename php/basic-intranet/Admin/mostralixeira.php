<?php include "valida_sessao.inc"; ?>
<?php include "valida_permissao_mensagens.inc"; ?>
<html>
<head>
<title>Lixeira</title>
<!--Index do html
Projeto Intranet Senai
Data: 26/02/2014
-->
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="UTF-8">
<link rel="icon" href="../Recursos/Imagens/icon.png">
<link rel="stylesheet" type="text/css" href="admin.css">
<link rel="stylesheet" type="text/css" href="styleadmin.css">
<script src="../Recursos/jquery/jquerymenu.js"></script>


<!-- Estilo -->
<style>
#responder {
	color: #999;
	height: 64px;
	padding: 8px 0 0 12px;
	width: 90%;
	-webkit-appearance: textfield;
	padding: 1px;
	background-color: white;
	border: 2px inset;
	border-image-source: initial;
	border-image-slice: initial;
	border-image-width: initial;
	border-image-outset: initial;
	border-image-repeat: initial;
	-webkit-rtl-ordering: logical;
	-webkit-user-select: text;
	cursor: auto;
	font: normal normal normal 13.3333330154419px/normal Arial;
	color: initial;
	letter-spacing: normal;
	word-spacing: normal;
	text-transform: none;
	text-indent: 0px;
	text-shadow: none;
	border-spacing: 1px;
	border-color: gray;
}

#input {
	width: 170px;
}

header h1 {
	float: left;
	position: relative;
	top: 20%;
	margin: -4%;
	left: 3%;
	font-size: 100%;
	padding: 0.5%;
	color: white;
}

header nav ul li {
	height: 40px;
	display: inline-block;
}

header nav ul li a:hover {
	color: #373948;
}

header nav ul li a.active {
	height: 33px;
	border-bottom: none;
}

header nav ul li a.link-1 {
	background-color: red;
}

header nav ul li a.link-2 {
	background-color: red;
}

header nav ul li a.link-3 {
	background-color: red;
}

header nav ul li a.link-4 {
	background-color: red;
}

section#home {
	background-color: #ccc;
	margin-top: 20px;
}

section#about {
	background-color: #ccc;
}

section#clients {
	background-color: #ccc;
}

section#contact-us {
	background-color: #ccc;
}

section h2 {
	color: black;
	font-family: 'Open Sans', sans-serif;
	font-weight: 300;
	font-size: 3em;
	margin: 0px;
}

section p {
	color: white;
	font-family: 'Open Sans', sans-serif;
	font-weight: 300;
	font-size: 1em;
}
</style>
</head>
<body>
	<!--Esta é a parte do cabeçalho do código -->
	<?php
	include "cabecalho1.php";
	?>
	<!--Parte responsavel pelo funcionamento dos menus -->
		<br><br><br>
	<header>
				<h1>Gestão de Mensagens</h1>
				
				
			</header>
	<!-- parte do corpo do menu do administrador contendo calendarios , e outras coisas -->
	<div id="corpo">
		<div>


			 <label id="mensagens"><a
				href="gestaodemensagens.php"><font color="white"><img
						src="../Recursos/Imagens/mensagemhome.png" width="15" height="15">Principal</font></a></label>
			&nbsp; <label id="mensagens"><a href="solicitacoes.php"><font
					color="white"><img src="../Recursos/Imagens/mensagemhome.png" width="15"
						height="15">Solicitações</font></a></label> &nbsp; <label
				id="mensagens"><a href="lixeira.php"><img src="../Recursos/Imagens/excluir.png"
					width="15" height="15"><font color="white">Lixeira</font></a></label>
					
					<br><br>

			<div
				style="width: 100%; background: #d8d8d8; box-shadow: 0 0 5px; border: 1px solid #888;">
				<br>
<?php

include "../Conexao.inc";
?>
	
	<?php
	include "../Conexao.inc";
	if(!isset($_GET["id"])){
		echo "Nenhuma Mensagem Encontrada";
		echo "<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>";
	}
	if(isset($_GET["id"])){
	$id = $_GET ["id"];
	// aqui é mostrada a mensagem de contato que está na lixeira que foi selecionada
	$resultado1 = mysqli_query ( $conexao, "SELECT * FROM lixeira WHERE id = $id" );
	if ($resultado1 === FALSE) {
		die ( mysql_error () );
	}
	
	$numero = mysqli_num_rows($resultado1);
	if($numero==0){
		echo "Nenhuma Mensagem Encontrada";
		echo "<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>";
	}
	else{
	
	while ( $row = mysqli_fetch_array ( $resultado1 ) ) {
		// aqui é mostrado o corpo da mensagem
		echo $row ["nome"] . " Enviou uma Mensagem Para a Intranet SENAI Alvares Romi.<br>";
		echo "De " . $row ["email"] . " Para Intranet SENAI.<br><br>";
		echo "<b>" . $row ["assunto"] . "</b><br><br>";
		echo $row ["mensagem"];
	}
	}
	}
	?>
	<br> <br> <br>
			</div>


		</div>
		<br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br>
		<br> <br> <br>
		<br> <br> <br> <br> <br> <br> <br>
		

	</div>
	<?php
	include "menuadm.php";
	?>
     
	 <br> <br> <br> <br> <br> <br><br> <br> <br> <br><br> <br> <br> <br>
     <div id="rodape1" align="center">
			<address>©2015 - 2015 CFP 5.14 - Todos os direitos reservados</address>

		</div>
	
	</body>
</html>