<?php include "valida_sessao.inc"; ?>
<?php include "valida_permissao_mensagens.inc"; ?>
<html>
<head>
<title>Solicitação</title>
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
<link rel="stylesheet" type="text/css" href="../Recursos/tabelas/css/component.css" />

<!-- Estilo -->
<style>
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


			
		<label id="mensagens"><a href="gestaodemensagens.php"><font
					color="white"><img src="../Recursos/Imagens/mensagemhome.png" width="15"
						height="15">Principal</font></a></label>
						&nbsp;
						<label id="mensagens"><a href="solicitacoes.php"><font
					color="white"><img src="../Recursos/Imagens/mensagemhome.png" width="15"
						height="15">Solicitações</font></a></label>
						&nbsp;
						
						<label
				id="mensagens"><a href="lixeira.php"><img src="../Recursos/Imagens/excluir.png"
					width="15" height="15"><font color="white">Lixeira</font></a></label>
					<br><br>

		<div
				style="width: 100%; background: #d8d8d8; box-shadow: 0 0 5px; border: 1px solid #888;">
				<br>
			<?php
	// aqui é mostrado a mensagem completa que foi clicada
	include "../Conexao.inc";
	if(!isset($_GET["id"])){
		echo "Nenhuma Mensagem Encontrada.";
		echo "<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>";
	}
	if(isset($_GET["id"])){
	$id = $_GET ["id"];
	$resultado = mysqli_query ( $conexao, "UPDATE Solicitacao SET novo = '0' WHERE id = $id" );
	$resultado1 = mysqli_query ( $conexao, "SELECT * FROM Solicitacao WHERE id = $id" );
	if ($resultado1 === FALSE) {
		die ( mysql_error () );
	}
	$numero = mysqli_num_rows($resultado1);
	if($numero==0){
		echo "Nenhuma Mensagem Encontrada.";
		echo "<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>";
	}
	else{
	// corpo da mensagem
	while ( $row = mysqli_fetch_array ( $resultado1 ) ) {
		$email = $row ["email"];
		echo "<br><br>NI :".$row["ni"]."<br><br>";
		echo $row ["nome"] . " Enviou uma Mensagem Para a Intranet SENAI Alvares Romi.<br>";
		echo "De " . $row ["email"] . " Para Intranet SENAI.<br><br>";
		echo "<b>" . $row ["assunto"] . "</b><br><br>";
	}
	}
	}
	
	?>
			</div>
			
			



		</div>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br><br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
	
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