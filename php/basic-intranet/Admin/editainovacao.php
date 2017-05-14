<?php include "valida_sessao.inc"; ?>
<?php include "valida_permissao_inovacao.inc"; ?>
<html>
<head>
<title>Inovação</title>
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
				<h1>Gestão de Inovação</h1>
				
				
			</header>
	<!-- parte do corpo do menu do administrador contendo calendarios , e outras coisas -->
	<div id="corpo">
		<div>


			
			<br> <br>
			<h3>Adicionar Um Destaque Na Página Inovação</h3>
			<br>

<?php
// aqui é pego a id que foi passada pelo link e colocado nos campos para que o usuário
// possa editar
include "../Conexao.inc";
if(!isset($_GET["id"])){
	echo "Nenhuma Notícia Informada.";
	echo "<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>";
	echo "<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>";
}
if(isset($_GET["id"])){
$id = $_GET ["id"];
$r = mysqli_query ( $conexao, "SELECT * FROM destaque WHERE Id=$id" );
if ($r === FALSE) {
	die ( mysql_error () );
}

$numero = mysqli_num_rows($r);
if($numero==0){
	echo "Nenhuma Notícia Cadastrada";
	echo "<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>";
	echo "<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>";
}else{

while ( $row = mysqli_fetch_array ( $r ) ) {
	
	$titulo = $row ["titulo"];
	$descricao = $row ["descricao"];
	$imagem = $row ["imagem"];
}

?>
<!-- Formulário de edição da inovação no qual é passado uma determinada id  -->
			<form method="post" action="alterainovacao.php?id=<?=$id?>"
				enctype="multipart/form-data">

				<table>
					<tr>
						<td>Informe o Novo Título:</td>
						<td><input type="text" name="titulo" maxlength="100"
							value="<?=$titulo?>"></td>
					</tr>
					<tr>
						<td>Informe a Nova Imagem:</td>
						<td><input type="file" name="img[]"></td>
					</tr>
					<tr>
						<td valign="top">Informe a Nova Descrição:</td>
						<td><textarea rows="5" cols="50" name="descricao"><?=$descricao?></textarea>
							<script>
            CKEDITOR.replace('descricao');
        </script></td>
					</tr>
				</table>
				<br> <br> <input type="reset" value="Limpar" id="input"
					name="limpar">&nbsp;&nbsp;&nbsp;&nbsp; <input type="submit"
					value="Alterar" id="input" name="upload">
			</form>

			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
<?php 
		}
		}
		?>
		</div>
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
     
      <br> <br> <br> <br> <br> <br>
     <div id="rodape1" align="center">
			<address>©2015 - 2015 CFP 5.14 - Todos os direitos reservados</address>

		</div>

	
	</body>
</html>