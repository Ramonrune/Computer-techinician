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


<!-- Estilo da página -->
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
			
		<?php
		//aqui é pego o id que foi clicado na lixeira e após isso ele é excluido do
		//banco de dados definitivamente
		include "../Conexao.inc";
		if(!isset($_GET["id"])){
			echo "Nenhuma Mensagem Informada.";
			echo "<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>";
		}
		if(isset($_GET["id"])){
		$id = $_GET ["id"];
		
		$resultado = mysqli_query ( $conexao, "DELETE FROM lixeira WHERE id=$id" );
		
		echo "<br><br>Mensagem Excluida com Sucesso!<br><br>";
		
		mysqli_close ( $conexao );
		}
		?>




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
		<br>
		<br>
		<br>
		<br>
		
	</div>

	
	<?php 
	include "menuadm.php";
	?>
     
	 <br> <br> <br> <br> <br> <br><br> <br> <br> <br><br> <br> <br> <br> <br><br> <br> <br> <br><br> <br> <br> <br>
     <div id="rodape1" align="center">
			<address>©2015 - 2015 CFP 5.14 - Todos os direitos reservados</address>

		</div>
	
	</body>
</html>