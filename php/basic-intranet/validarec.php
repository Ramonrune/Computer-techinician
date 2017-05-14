<html>
<head>
<title>Recuperação de Conta</title>
<!--Index do html
Projeto Intranet Senai
Data: 26/02/2014
-->
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="UTF-8">
<link rel="icon" href="Imagens/icon.png">
<link rel ="stylesheet" type="text/css" href="estilo.css">
<script src="jquery/jquerymenu.js"></script>
<!-- Estilo -->
<style>

.login {
	position: relative;
	top: -38%;
	right: 7%;
	height: 150px;
	width: 350px;
	padding: 10px;
	z-index: 2;
}

.login input[type=text] {
	width: 250px;
	height: 40px;
	border: 1px solid lightgrey;
	border-radius: 2px;
	color: black;
	font-family: 'Exo', sans-serif;
	font-size: 16px;
	font-weight: 400;
	padding: 4px;
}

.login input[type=password] {
	width: 250px;
	height: 40px;
	border: 1px solid lightgrey;
	border-radius: 2px;
	color: black;
	font-family: 'Exo', sans-serif;
	font-size: 16px;
	font-weight: 400;
	padding: 4px;
	margin-top: 10px;
}

.login input[type=submit] {
	width: 260px;
	height: 35px;
	background: rgb(219,39,15);
	border: 1px solid #fff;
	cursor: pointer;
	border-radius: 2px;
	color: white;
	font-family: 'Exo', sans-serif;
	font-size: 16px;
	padding: 6px;
	margin-top: 10px;
}

.login input[type=submit]:hover {
	opacity: 0.8;
}

.login input[type=submit]:active {
	opacity: 0.6;
}

.login input[type=submit]:focus {
	outline: none;
}

::-webkit-input-placeholder {
	color: lightgrey;
}

::-moz-input-placeholder {
	color: lightgrey;
}

</style>

 
</head>
	<body style="min-width: 1000px;
	max-width: 2000px;height:300px;">
	<!--Está é a parte do cabeçalho do código -->
	<?php
	include "cabecalho.php";
	?>
	
	<!--Parte responsavel pelo funcionamento dos menus -->

	<br>
	<br>
	<br><br>
	<div style="position:absolute;">
	<img src="Imagens/login1.jpg" width="30.5%" height="80%">
	</div>
	<div style="position:absolute;left:65.5%;">
	<img src="Imagens/login2.jpg" width="100%" height="80%">
	</div>
	<div style="position: relative;
	top: 30%;
	margin: 0 auto;
	min-width: 1000px;
	max-width: 1000px;
	height:240px;">
	<br>
	<div id="espacologin">
	<div id="arealogin">
	<div class="login">
	<br>Bem Vindo a Área de Intranet
	<br>
	<img src="Imagens/logo.png">
	<br>
	<br><br><br>
	Recuperação De Senha
	<br>
	<br>

	<?php 
	//aqui é pego a ni e o email e mostrado a dica para o usuário
	$NI = $_POST["ni"];
	$Email = $_POST["email"];
	
	$resultado = mysqli_query($conexao,"SELECT * FROM Usuario WHERE NI=$NI");
	$row = $row = mysqli_fetch_array($resultado);
	
	if($row>=1)
	{
		if($row["Email"] == $Email)
		{
			echo "NI:".$row["NI"]."<br>"."Dica Da Senha:".$row["Dica"];
		
		}
	}
	else echo"Dados Incoretos.";
	
	?>
	
</div>
	</div>
	
	</div>
	
	</div>
	
	<!--Parte responsavel pelo rodapé do site -->
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