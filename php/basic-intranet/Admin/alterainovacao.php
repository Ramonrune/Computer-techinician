<?php include "valida_sessao.inc"; ?>
<?php include "valida_permissao_inovacao.inc"; ?>
<html>
<head>
<title>Inovação</title>
<!--Index do html
Projeto Intranet Senai
Data: 26/02/2014
-->
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
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
// se o botão de upload estiver setado é verificado se algo está vazio
if (isset ( $_POST ["upload"] )) {
	include "../Conexao.inc";
	$id = $_GET ["id"];
	
	$titulo = $_POST ["titulo"];
	$descricao = $_POST ["descricao"];
	$file = $_FILES ["img"];
	$numfile = count ( array_filter ( $file ["name"] ) );
	$erro = 0;
	
	if (empty ( $titulo )) {
		echo "Insira um Título Válido.<br>";
		$erro += 1;
	}
	if (empty ( $descricao )) {
		echo "Insira uma Descrição Válida.<br>";
		$erro += 1;
	}
	if ($erro != 0) {
		echo "<a href='gestaodeinovacao.php'>Voltar</a>";
	}
	
	if ($erro == 0) {
		
		$folder = "../Recursos/Destaque";
		
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
			$resultado = mysqli_query ( $conexao, "UPDATE destaque SET titulo = '$titulo' WHERE Id = $id" );
				$resultado2 = mysqli_query ( $conexao, "UPDATE destaque SET descricao = '$descricao' WHERE Id = $id" );
				$resultado3 = mysqli_query ( $conexao, "UPDATE destaque SET imagem = 'padrao.jpg' WHERE Id = $id" );
				@$re1 = mysqli_fetch_array ( $r1 );
				@$re2 = mysqli_fetch_array ( $r2 );
				@$re3 = mysqli_fetch_array ( $r3 );
				echo "Upload realizado com sucesso !<br><br>";
				echo "<img src='../Recursos/Destaque/padrao.jpg' width='150' height='100'>" . "<br><br><br><br><a class='cor' href='gestaodeinovacao.php'>Voltar</a>";
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
				                                 
				// se nada estiver vazio a noticia destaque será atualizada
				$resultado = mysqli_query ( $conexao, "UPDATE destaque SET titulo = '$titulo' WHERE Id = $id" );
				$resultado2 = mysqli_query ( $conexao, "UPDATE destaque SET descricao = '$descricao' WHERE Id = $id" );
				$resultado3 = mysqli_query ( $conexao, "UPDATE destaque SET imagem = '$novoNome' WHERE Id = $id" );
				@$re1 = mysqli_fetch_array ( $r1 );
				@$re2 = mysqli_fetch_array ( $r2 );
				@$re3 = mysqli_fetch_array ( $r3 );
				// Verificando os erros das minhas imagens
				
				if ($error != 0) {
					$msg [] = "<b>$name  :</b>" . $errorMsg [$error];
				} 

				elseif ($size > $maxtam)
					$msg [] = "<b>$name :</b>Erro - Imagem ultrapassa o limite de 5MB";
				
				else {
					if (move_uploaded_file ( $tmp, $folder . "/" . $novoNome )) { // Responsavel em copiar os arquivos temporarios para a pasta uploads
						$msg [] = "<b>$name :</b>Upload realizado com sucesso !<br><br><a class='cor' href='gestaodeinovacao.php'>Voltar</a>";
						echo "<img src='../Recursos/Destaque/$novoNome' width='150' height='100'>" . "<br><br>";
					} else
						$msg [] = "<b>$name :</b> Desculpe ! Não foi possivel fazer  Upload...<br><br><a class='cor' href='gestaodeinovacao.php'>Voltar</a>";
				}
				foreach ( $msg as $vlr )
					echo $vlr . "<br>";
			}
		}
	}
}

?>


<br>
			<br>
			<br>
			<br>
			<br>
			<br>

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
	
	</div>

	
	<?php 
	include "menuadm.php";
	?>
     
     <br> <br> <br> <br> <br> <br><br> <br> <br> <br> <br> <br><br> <br> <br> <br> <br> <br><br> <br> <br> <br> <br> <br><br> <br> <br> <br> <br> <br>
     <div id="rodape1" align="center">
			<address>©2015 - 2015 CFP 5.14 - Todos os direitos reservados</address>

		</div>

	
	</body>
</html>