<?php include "valida_sessao.inc"; ?>
<?php include "valida_permissao_noticia.inc"; ?>
<html>
<head>
<title>Notícias</title>
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
<script src="../Recursos/editor/ckeditor.js"></script>


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
		<br><br><br>
	<header>
				<h1>Gestão de Notícias</h1>
				
				
			</header>

	<!-- parte do corpo do menu do administrador contendo calendarios , e outras coisas -->
	<div id="corpo">
		<div>


		
			<br> <br>
			<!-- Form que edita a notica e trás os dados dela para os inputs -->
			<form method="post" action="noticiaeditada.php"
				enctype="multipart/form-data">
				<font size="3"><b>Altere os Dados a Seguir :</b></font> <br>
				<br>
		
		<?php
		include "../Conexao.inc";
		if(!isset($_GET["id"])){
			echo "Nenhuma Notícia Informada.";
			echo "<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>";
		}
		if(isset($_GET["id"])){
		$id = $_GET ["id"];
		$erro = 0;
		
		?>
		<?php
		
		$r = mysqli_query ( $conexao, "SELECT * FROM Noticia" );
		if ($r === FALSE) {
			die ( mysql_error () );
		}
		
		while ( $row = mysqli_fetch_array ( $r ) ) {
			
			if ($row ["Id"] == $id) {
				
				?>
		<table>
					<tr>
						<td></td>
						<td><input type="hidden" name="id" value="<?=$row["Id"];?>"></td>
					</tr>
					<tr>
						<td>Altere o Titulo :</td>
						<td><input type="text" name="titulo" value="<?=$row["Titulo"];?>"  maxlength="100">
						</td>
					</tr>
					<tr>
						<td>Altere o Subtitulo:</td>
						<td><input type="text" name="descricao"
							value="<?=$row["Descricao"]; ?>" maxlength="100"></td>
					</tr>
					<tr>
						<td>Altere a Imagem :</td>
						<td><input type="file" name="img[]"></td>
					</tr>
					<tr>
						<td>Altere o Texto :</td>
						<td><textarea rows="20" cols="75" name="texto"><?=$row["Texto"]; ?></textarea>
							<script>
            CKEDITOR.replace( 'texto' );
        </script></td>
					</tr>


				</table>
				<br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input
					type="reset" value="Limpar" id="input" name="limpar"> <input
					type="submit" value="Alterar" id="input" name="alterar">
	
<?php
			}
		}
		}
		?>
		</form>
			<br> <br>


		</div>
		<br>
		<br>
		<br>
		<br>
		
	</div>

	
	<?php
	include "menuadm.php";
	?>
     

	<!--Parte responsavel pelo rodape do site -->
		<br> <br> <br> <br> <br> <br><br> <br> <br> <br><br> <br> <br> <br>
     <div id="rodape1" align="center">
			<address>©2015 - 2015 CFP 5.14 - Todos os direitos reservados</address>

		</div>
		
</body>
</html>