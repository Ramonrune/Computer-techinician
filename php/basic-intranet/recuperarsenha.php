<html>
<head>
<title>Recuperar Senha</title>
<!--Index do html
Projeto Intranet Senai
Data: 26/02/2014
-->
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="UTF-8">
<link rel="icon" href="Recursos/Imagens/icon.png">
<link rel="stylesheet" type="text/css" href="Layout/estilo.css">
<script src="Recursos/jquery/jquerymenu.js"></script>
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
	<br><br><br><br><br>
	<div style="position:absolute;">
	<img src="Recursos/Imagens/imagemlogin.png" width="100%" height="675px">
	</div>
	<div style="position: relative;
	top: 30%;
	margin: 0 auto;
	min-width: 1000px;
	max-width: 1000px;
	height:240px;">
	<!-- Aqui é um form que pede a ni do usuário e o email do usuário para recuperar a senha -->
		<br><br><br>
		<div id="espacologin">
			<div id="arealogin">
				<div class="login">
					<br>Bem Vindo a Área de Intranet <br> <img src="Recursos/Imagens/logo.png">
					<br> <br>
					<br>
					<br> Recuperação De Senha <br> <br>
					<p>Entre Em Contato Com Um Administrador<br>Para Recuperar Sua Senha.</p>
					<?php 
					$resultado = mysqli_query ( $conexao, "SELECT * FROM Usuario,Permissoes WHERE Permissoes.usuario=1 AND Usuario.NI = Permissoes.NI LIMIT 4 ");
					while($row = mysqli_fetch_array ( $resultado )){
						echo "<br>".$row["Nome"]."<br>".$row["Email"]."<br>";
					}
					?>
					<br>
					<p><a href="Admin/login.php"><font color="red">Voltar</font></a></p>
				</div>
			</div>

		</div>

		
	</div>
	<br><br><br><br><br><br><br>
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