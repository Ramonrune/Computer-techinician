<?php include "valida_sessao.inc"; ?>
<?php include "valida_permissao_noticia.inc"; ?>
<html>
<head>
<title>Notícia</title>
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
				<h1>Gestão de Notícias</h1>
				
				
			</header>

	<!-- parte do corpo do menu do administrador contendo calendarios , e outras coisas -->
	<div id="corpo">
		<div>


		
			<br> <br>
<?php
// aqui é pego a id , o titulo , a descrição e o texto junto a imagem
include "../Conexao.inc";
$id = $_POST ["id"];
$titulo = $_POST ["titulo"];
$descricao = $_POST ["descricao"];
$texto = $_POST ["texto"];
@$file = $_FILES ["img"];
@$numfile = count ( array_filter ( $file ["name"] ) );
$erro = 0;
// se nada estiver vazio ele continuará
if (empty ( $id )) {
	echo "Por favor Preencha uma Identificação.<br>";
	$erro += 1;
}
if (empty ( $titulo )) {
	echo "Por favor Preencha o Titulo.<br>";
	$erro += 1;
}
if (empty ( $descricao )) {
	echo "Por favor Preencha a Descrição.<br>";
	$erro += 1;
}
if (empty ( $texto )) {
	echo "Por favor Preencha o Texto da Noticia.<br>";
	$erro += 1;
}

if ($erro != 0) {
	echo "<a href='gestaodenoticias.php'>Voltar</a>";
}
if ($erro == 0) {
	
	// Pasta
	
	$folder = "../Recursos/noticias";
	
	// Requisitos
	
	$permite = array (
			"image/jpeg",
			"image/bmp",
			"image/png",
			"image/gif" 
	);
	$maxtam = 1024 * 1024 * 5; // 5MB
	                           
	// Mensagens
	$msg = array ();
	$error = array (
			1 => "Arquivo no upload é maior do que o limite definido",
			2 => "O arquivo ultrapassa o limite de tamanho MAX_FILE_SIZE (64MB)",
			3 => "O upload do arquivo foi feito parcialmente",
			4 => "Não foi feito o upload do arquivo" 
	);
	
	// Recupera os dados das imagens
	if ($numfile <= 0) {
		$resultado = mysqli_query ( $conexao, "UPDATE Noticia SET Imagem = 'padrao.png' WHERE Id  = $id" );
		$resultado2 = mysqli_query ( $conexao, "UPDATE Noticia SET Titulo = '$titulo' WHERE Id  = $id" );
		$resultado3 = mysqli_query ( $conexao, "UPDATE Noticia SET Descricao = '$descricao' WHERE Id  = $id" );
		$resultado4 = mysqli_query ( $conexao, "UPDATE Noticia SET Texto = '$texto' WHERE Id = $id" );
		@$registro = mysqli_fetch_array ( $resultado );
		@$registro2 = mysqli_fetch_array ( $resultado2 );
		@$registro3 = mysqli_fetch_array ( $resultado3 );
		@$registro4 = mysqli_fetch_array ( $resultado4 );
		echo "Noticia Alterada com Sucesso ! <br><br><a href='gestaodenoticias.php'>Voltar</a>";
	} else {
		for($i = 0; $i < $numfile; $i ++) {
			$name = $file ["name"] [$i];
			$type = $file ["type"] [$i];
			$size = $file ["size"] [$i];
			$error = $file ["error"] [$i];
			$tmp = $file ["tmp_name"] [$i];
			
			// Recupera a extensão do arquivo
			$extensao = @end ( explode ( '.', $name ) ); // recupera o ultimo indice de um array
			$novoNome = rand () . ".$extensao"; // novo nome a ser gravado na pasta (Rand = Gera um numero aleatorio)
			                                    
			// Verificando os erros das minhas imagens
			                                    // aqui é atualizada a imagem , o titulo , a descrição e o texto
			$resultado = mysqli_query ( $conexao, "UPDATE Noticia SET Imagem = '$novoNome' WHERE Id  = $id" );
			$resultado2 = mysqli_query ( $conexao, "UPDATE Noticia SET Titulo = '$titulo' WHERE Id  = $id" );
			$resultado3 = mysqli_query ( $conexao, "UPDATE Noticia SET Descricao = '$descricao' WHERE Id  = $id" );
			$resultado4 = mysqli_query ( $conexao, "UPDATE Noticia SET Texto = '$texto' WHERE Id = $id" );
			@$registro = mysqli_fetch_array ( $resultado );
			@$registro2 = mysqli_fetch_array ( $resultado2 );
			@$registro3 = mysqli_fetch_array ( $resultado3 );
			@$registro4 = mysqli_fetch_array ( $resultado4 );
			echo "Noticia Alterada com Sucesso ! <br><br><a href='gestaodenoticias.php'>Voltar</a>";
			
			if ($error != 0) {
				$msg [] = "<b>$name  :</b>" . $errorMsg [$error];
			} elseif (! in_array ( $type, $permite )) // Verificando se o type existe em $permite
				$msg [] = "<b>$name :</b>Erro - Imagem não suportada";
			elseif ($size > $maxtam)
				$msg [] = "<b>$name :</b>Erro - Imagem ultrapassa o limite de 5MB";
			else {
				if (move_uploaded_file ( $tmp, $folder . "/" . $novoNome )) { // Responsavel em copiar os arquivos temporarios para a pasta uploads
				} else
					$msg [] = "<b>$name :</b> Desculpe ! Não foi possivel fazer  Upload...";
			}
			foreach ( $msg as $vlr )
				echo $vlr . "<br>";
		}
	}
}
?>
<br> <br>

		</div>
	</div>

	
	<?php
	include "menuadm.php";
	?>
     
	<!--Parte responsavel pelo rodape do site -->
		<br> <br> <br> <br> <br> <br><br> <br> <br> <br><br> <br> <br> <br><br> <br> <br> <br> <br> <br><br> <br> <br> <br><br> <br> <br> <br><br> <br> <br> <br> <br> <br><br> <br> <br> <br><br> <br> <br> <br><br> <br> <br> <br> <br> <br><br> <br> <br> <br><br> <br> <br> <br>
     <div id="rodape1" align="center">
			<address>©2015 - 2015 CFP 5.14 - Todos os direitos reservados</address>

		</div>
</body>
</html>