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


<!-- Estilo dos inputs da página junto ao h1 -->
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
				<h1>Gestão de Inovação</h1>
				
				
			</header>

	<!-- parte do corpo do menu do administrador contendo calendarios , e outras coisas -->
	<div id="corpo">
		<div>


			<br> <br>

			<h2>Adicionar Destaque</h2>
			<br>
  	
  	
<?php
/*
 * Aqui é pego o titulo a descrição e o destaque
 * e após isso é validado se eles estão vazios
 * o form envia o usuário de volta para a página de inovação
 *
 *
 */
include "../Conexao.inc";
$titulo = $_POST ["titulo"];
$descricao = $_POST ["descricao"];
$destaque = 1;
@$file = $_FILES ["img"];
@$numfile = count ( array_filter ( $file ["name"] ) );
@session_start ();
$nome_usuario = $_SESSION ["nome_usuario"];
$resultado = mysqli_query ( $conexao, "SELECT * FROM Usuario WHERE NI=$nome_usuario" );
@$query = mysqli_query ( $conexao, $resultado );

while ( $row = mysqli_fetch_array ( $resultado ) ) {
	
	$nomedousuario = $row ["NI"];
	$nom1 = $row["Nome"];
}

$erro = 0;
if (empty ( $titulo )) {
	echo "Por Favor Preencha o Titulo.<br>";
	$erro += 1;
}
if (empty ( $descricao )) {
	echo "Por Favor Preencha a Descrição.<br>";
	$erro += 1;
}


if ($erro != 0) {
	echo "<form action='gestaodeinovacao.php' method='post'>";
	echo "<input type='hidden' name='titulo' value='$titulo'>";
	echo "<input type='hidden' name='descricao' value='$descricao'>";
	echo "<input type='submit' value='Voltar' name='voltar'>";
	echo "</form>";
}

$r = mysqli_query ( $conexao, "SELECT * FROM destaque" );
if ($r === FALSE) {
	die ( mysql_error () );
}

while ( $row = mysqli_fetch_array ( $r ) ) {
	
	if ($row ["titulo"] == $titulo) {
		echo "Já existe uma Noticia com Este Titulo.<br><a href='gestaodeinovacao.php'>Voltar</a>";
		$erro += 1;
	}
}

/*
 *
 * Caso o erro seja igual 0 ele fará a seguinte parte do código que salva no banco de dados com os valores
 * e envia a imagem para a pasta de inovação
 */
if ($erro == 0) {
	@$file = $_FILES ["img"];
	@$numfile = count ( array_filter ( $file ["name"] ) );
	
	// Pasta
	
	$folder = "../Recursos/Destaque";
	
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
		$data = date ( 'Y-m-d' );
		$numero = 0;
		$resultado = mysqli_query ( $conexao, "INSERT INTO destaque Values($numero,'$titulo','$descricao','$data','$destaque','padrao.jpg','.jpg','$nomedousuario','$nom1')" );
		@$registro = mysqli_fetch_array ( $resultado );
		$numero += 1;
		echo "Dados do Destaque Enviados Corretamente.<br>";
		echo "<a class='cor' href='gestaodeinovacao.php'>Voltar</a>";
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
			
			if ($error != 0) {
				$msg [] = "<b>$name  :</b>" . $errorMsg [$error];
			} elseif (! in_array ( $type, $permite )) // Verificando se o type existe em $permite
				$msg [] = "<b>$name :</b>Erro - Imagem não suportada";
			elseif ($size > $maxtam)
				$msg [] = "<b>$name :</b>Erro - Imagem ultrapassa o limite de 5MB";
			else {
				if (move_uploaded_file ( $tmp, $folder . "/" . $novoNome )) { // Responsavel em copiar os arquivos temporarios para a pasta uploads
					$data = date ( 'Y-m-d' );
					
					$resultado = mysqli_query ( $conexao, "INSERT INTO destaque Values(null,'$titulo','$descricao','$data','$destaque','$novoNome','$extensao','$nomedousuario','$nom1')" );
					@$registro = mysqli_fetch_array ( $resultado );
			
					echo "Dados do Destaque Enviados Corretamente.<br>";
					echo "<a class='cor' href='gestaodeinovacao.php'>Voltar</a>";
				} else
					$msg [] = "<b>$name :</b> Desculpe ! Não foi possivel fazer  Upload...";
			}
			foreach ( $msg as $vlr )
				echo $vlr . "<br>";
		}
	}
	
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
       
     <br> <br> <br> <br> <br> <br><br>
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
     <div id="rodape1" align="center">
			<address>©2015 - 2015 CFP 5.14 - Todos os direitos reservados</address>

		</div>   
	
	
	</body>
</html>