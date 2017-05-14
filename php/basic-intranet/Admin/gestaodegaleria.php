<?php include "valida_sessao.inc"; ?>
<?php include "valida_permissao_galeria.php"; ?>

<html>
<head>
<title>Galeria</title>
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
				<h1>Gestão de Galeria</h1>
				
				
			</header>
	<!-- parte do corpo do menu do administrador contendo calendarios , e outras coisas -->
	<div id="corpo">
		<div>


		
			<br> <br>
			<!-- Formulário que adiciona albuns  -->
			<div
				style="background: #e6e6e6; height: 20%; box-shadow: 0 0 5px; border-radius: 4px;">
				<br>
				<form action="" method="post"
					enctype="multipart/form-data">
					Nome do Album : <input type="text" name="nome" id="album" maxlength="100">&nbsp;&nbsp;&nbsp;<input
						type="submit" value="Criar" id="criaalbum" name="upload"><br> <br>
					Selecione a Capa do Album :<input type="file" name="img[]"
						id="upload">
				</form>
			</div>
			
			<?php 
			if(isset($_POST["upload"])){
				
				include "../Conexao.inc";
				//aqui é uma função que retira acentos do album
				function retira_acentos($texto) {
					$array1 = array (
							"á",
							"à",
							"â",
							"ã",
							"ä",
							"é",
							"è",
							"ê",
							"ë",
							"í",
							"ì",
							"î",
							"ï",
							"ó",
							"ò",
							"ô",
							"õ",
							"ö",
							"ú",
							"ù",
							"û",
							"ü",
							"ç",
							"Á",
							"À",
							"Â",
							"Ã",
							"Ä",
							"É",
							"È",
							"Ê",
							"Ë",
							"Í",
							"Ì",
							"Î",
							"Ï",
							"Ó",
							"Ò",
							"Ô",
							"Õ",
							"Ö",
							"Ú",
							"Ù",
							"Û",
							"Ü",
							"Ç"
					);
					$array2 = array (
							"a",
							"a",
							"a",
							"a",
							"a",
							"e",
							"e",
							"e",
							"e",
							"i",
							"i",
							"i",
							"i",
							"o",
							"o",
							"o",
							"o",
							"o",
							"u",
							"u",
							"u",
							"u",
							"c",
							"A",
							"A",
							"A",
							"A",
							"A",
							"E",
							"E",
							"E",
							"E",
							"I",
							"I",
							"I",
							"I",
							"O",
							"O",
							"O",
							"O",
							"O",
							"U",
							"U",
							"U",
							"U",
							"C"
					);
					return str_replace ( $array1, $array2, $texto );
				}
				//aqui é uma função que retira caracteres especiais do texto
				function retira_especial($texto) {
					$array1 = array (
							"!",
							"#",
							"$",
							"%",
							"¨¨",
							"&",
							"*",
							"(",
							")",
							"|",
							"¹",
							"²",
							"³",
							"£",
							"¢",
							"¬",
							"°"
					);
					$array2 = array (
							"",
							"",
							"",
							"",
							"",
							"",
							"",
							"",
							"",
							"",
							"",
							"",
							"",
							"",
							"",
							"",
							""
					);
					return str_replace ( $array1, $array2, $texto );
				}
				$file = $_FILES ["img"];
				$numfile = count ( array_filter ( $file ["name"] ) );
				//aqui será gravado a imagem e o nome do album no banco de dados
				$permite = array (
						"image/jpeg",
						"image/png"
				);
				
				$erro = 0;
				for($i = 0; $i < $numfile; $i ++) {
					$name = $file ["name"] [$i];
					$type = $file ["type"] [$i];
					$size = $file ["size"] [$i];
					$error = $file ["error"] [$i];
					$tmp = $file ["tmp_name"] [$i];
					if ($size < 1000) {
						echo "Imagem Muito Pequena.<br>";
						$erro ++;
					}
					if (! in_array ( $type, $permite )) {
						echo "Imagem Não é Do Tipo Correto.<br>";
						$erro ++;
					}
					$extensao = @end ( explode ( '.', $name ) );
				}
				
				if ($numfile <= 0) {
					echo "Insira uma Imagem.<br>";
					$erro += 1;
				}
				echo "<br><br>";
				
				if ($erro == 0) {
				
					include "../Conexao.inc";
				
					$nome = $_POST ["nome"];
				
					$erro = 0;
				
					if (empty ( $nome )) {
						echo "Informe um Nome Para o Album.<br>";
						$erro += 1;
					}
					$resultado1 = mysqli_query ( $conexao, "SELECT * FROM Album" );
					if ($resultado1 === FALSE) {
						die ( mysql_error () );
					}
				
					if (! empty ( $nome ) and file_exists ( "../Recursos/galeria/$nome" )) {
						echo "O Album Já Existe . <br>";
						$erro += 1;
					}
				
					if ($erro != 0) {
						
					}
				
					if ($erro == 0) {
						
						//aqui é retirado os caracteres especiais e acentos do texto
						$nome = retira_acentos ( $nome );
						$nome = retira_especial ( $nome );
						
						
						mkdir ( '../Recursos/galeria/' . $nome );
					}
					$nome1 = $nome;
				
					$folder = "../Recursos/capagaleria";
				
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
						echo "Selecione uma imagem";
					} else {
						for($i = 0; $i < $numfile; $i ++) {
							$name = $file ["name"] [$i];
							$type = $file ["type"] [$i];
							$size = $file ["size"] [$i];
							$error = $file ["error"] [$i];
							$tmp = $file ["tmp_name"] [$i];
				
							// Recupera a extensão do arquivo
							$extensao = @end ( explode ( '.', $name ) ); // recupera o ultimo indice de um array
							$novoNome = $nome1 . ".$extensao"; // novo nome a ser gravado na pasta (Rand = Gera um numero aleatorio)
							 
							// Verificando os erros das minhas imagens
				
							if ($error != 0) {
								$msg [] = "<b>$name  :</b>" . $errorMsg [$error];
							}
				
							elseif ($size > $maxtam)
							$msg [] = "<b>$name :</b>Erro - Imagem ultrapassa o limite de 5MB";
				
							else {
								if (move_uploaded_file ( $tmp, $folder . "/" . $novoNome )) { // Responsavel em copiar os arquivos temporarios para a pasta uploads
									if ($erro == 0) {
										$msg [] = "<b>$name :</b>Upload realizado com sucesso !<br><br>";
										echo "<img src='../Recursos/capagaleria/$novoNome' width='150' height='100'>" . "<br><br>";
										
										$input_image = "../Recursos/capagaleria/$novoNome";
											
										// Pega o tamanho original da imagem e armazena em um Array:
										$size = getimagesize( $input_image );
											
										// Configura a nova largura da imagem:
										$thumb_width = "202";
											
										// Calcula a altura da nova imagem para manter a proporção na tela:
										$thumb_height = ( int )(( $thumb_width/$size[0] )*$size[1] );
											
										// Cria a imagem com as cores reais originais na memória.
										$thumbnail = ImageCreateTrueColor( $thumb_width, $thumb_height );
											
										// Criará uma nova imagem do arquivo.
										if($extensao=="jpg"){
											$src_img = ImageCreateFromJPEG( $input_image );
										}
										if($extensao=="png"){
											$src_img = ImageCreateFromPNG( $input_image );
										}
										// Criará a imagem redimensionada:
										ImageCopyResampled( $thumbnail, $src_img, 0, 0, 0, 0, $thumb_width, $thumb_height, $size[0], $size[1] );
											
										// Informe aqui o novo nome da imagem e a localização:
										if($extensao=="jpg"){
											$imagem=rand ();
											$imagem1 = $imagem. ".$extensao";
											ImageJPEG( $thumbnail, "../Recursos/capagaleria/$imagem1");
												
											$resultado = mysqli_query ( $conexao, "INSERT INTO Album values(null,'$nome','$imagem','$extensao')" );
										}
										if($extensao=="png"){
											$imagem=rand ();
											$imagem1 = $imagem. ".$extensao";
											ImageJPEG( $thumbnail, "../Recursos/capagaleria/$imagem1");
												
											$resultado = mysqli_query ( $conexao, "INSERT INTO Album values(null,'$nome','$imagem','$extensao')" );
										}
										// Limpa da memoria a imagem criada temporáriamente:
										ImageDestroy( $thumbnail );
									
									}
								} else
									$msg [] = "<b>$name :</b> Desculpe ! Não foi possivel fazer  Upload...<br><br>";
							}
							foreach ( $msg as $vlr )
								echo $vlr . "<br>";
						}
						}
					}
			}
			
			if(isset($_POST["salvar"])){
				// inclusão da conexão e também é pego a id e o nome e verificado se estão vazios
				include "../Conexao.inc";
				$id = $_POST["salvar"];
				$nome = $_POST ["nome"];
				$erro = 0;
				if (empty ( $id )) {
					echo "Informe uma Id Valida.<br>";
					$erro += 1;
				}
				
				if (empty ( $nome )) {
					echo "Informe um Nome Valido.<br>";
					$erro += 1;
				}
				
				if ($erro != 0) {
				
					
				}
				function retira_especial($texto) {
					$array1 = array (
							"!",
							"#",
							"$",
							"%",
							"¨¨",
							"&",
							"*",
							"(",
							")",
							"|",
							"¹",
							"²",
							"³",
							"£",
							"¢",
							"¬",
							"°"
					);
					$array2 = array (
							"",
							"",
							"",
							"",
							"",
							"",
							"",
							"",
							"",
							"",
							"",
							"",
							"",
							"",
							"",
							"",
							""
					);
					return str_replace ( $array1, $array2, $texto );
				}
				
				// aqui é retirado os caracteres especiais do nome
				$nome = retira_especial ( $nome );
				
				if ($erro == 0) {
					$resultado1 = mysqli_query ( $conexao, "SELECT * FROM Album where id=$id" );
					if ($resultado1 === FALSE) {
						die ( mysql_error () );
					}
					// aqui é renomeado a a imagem que foi informada
					while ( $row = mysqli_fetch_array ( $resultado1 ) ) {
				
						rename ( '../Recursos/galeria/' . $row ['Nome'] . '/', '../Recursos/galeria/' . $nome . '/' );
				
						$arquivoantigo = "../Recursos/capagaleria/" . $row ['Nome'] . '.' . $row ['extensao'];
						$arquivonovo = "../Recursos/capagaleria/" . $nome . '.' . $row ['extensao'];
						rename ( $arquivoantigo, $arquivonovo );
					}
				
					// aqui é atualizado a id do album e o nome do album onde a id for igual a id informado
					$resultado = mysqli_query ( $conexao, "UPDATE Album SET id = $id WHERE id = $id" );
					$resultado2 = mysqli_query ( $conexao, "UPDATE Album SET Nome = '$nome' WHERE id = $id" );
				
					@$registro = mysqli_fetch_array ( $resultado );
					@$registro2 = mysqli_fetch_array ( $resultado2 );
					echo "Edição concluida com Sucesso! <br>";
				}
			}
			
			if(isset($_POST["excluir"])){
				echo "<div style='width:400px;height:100px;background:lightgrey;position:fixed;left:35%;top:40%;padding:10px;border:2px solid black;border-radius:10px;'>";
				echo "<b>Confirmar Exclusão :</b>";
				echo "<form method='post'><input type='submit' value='Confirmar' id='input' name='sim'><input type='hidden' name='pega' value='$_POST[excluir]'>";
				echo '&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" value="Cancelar" id="input" name="nao"></form>';
						echo "</div>";
			}
			
			if(isset($_POST["sim"])){
				//aqui é pego a id do album
				//após isso o comando rmdir é responsavel por excluir a pasta do album
				//então o album é excluido do banco de dados
				include "../Conexao.inc";
				$id = $_POST["pega"];
				$resultado1 = mysqli_query ( $conexao, "SELECT * FROM Album where id=$id" );
				if ($resultado1 === FALSE) {
					die ( mysql_error () );
				}
				
				while ( $row = mysqli_fetch_array ( $resultado1 ) ) {
				
					@rmdir ( '../Recursos/galeria/' . $row ["Nome"] );
					$nome=$row["Nome"];
				}
				
				$resultado = mysqli_query ( $conexao, "DELETE FROM Album WHERE id=$id" );
				$resultado1 = mysqli_query ( $conexao, "DELETE FROM Galeria WHERE pasta='$nome'" );
				mysqli_close ( $conexao );
				echo "O Album foi Excluido com Sucesso!<br><br>";
				
			}
			
			?>
			<br> <br> <br>


			<table>
				<tr>
 	<?php
 	//aqui está sendo mostrado todos os albuns que estão sendo cadastrados 
		include "../Conexao.inc";
		$resultado = mysqli_query ( $conexao, "SELECT * FROM Album" );
		if ($resultado === FALSE) {
			die ( mysql_error () );
		}
		$numero = mysqli_num_rows ( $resultado );
		if ($numero == 0) {
			echo "Nenhum Album Cadastrado.";
		}
		
		$cont = 0;
		while ( $row = mysqli_fetch_array ( $resultado ) ) {
			if ($row ["id"]) {
				$cont += 1;
			}
			
			echo "<form action='' method='post'>";
			echo "<td align='center' style='height:250px;'><a href='adicionafotos.php?id=$row[id]'><img src='../Recursos/capagaleria/$row[thumb].$row[extensao]' width='200' height='200'></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>";
			echo "<td valign='top' style='position:absolute;width:0px;'><div style='position:relative;top:225px;width:200px;height:200px;right:230px;'><input type='text' name='nome' value='$row[Nome]' maxlength='100' size='10'>";
			echo "<input type='image' src='../Recursos/Imagens/salvar.png' name='salvar' width='16' height='16' name='salvar' value='$row[id]'>&nbsp;&nbsp;&nbsp;<a href='adicionafotos.php?id=$row[id]'><img src='../Recursos/Imagens/caneta.png'></a>&nbsp;&nbsp;&nbsp;<input type='image' src='../Recursos/Imagens/delecao.png' width='16' height='16' name='excluir' value='$row[id]'></div><br></td>";
			
			echo "</form>";
			
			if ($cont == 4 or $cont == 8 or $cont == 12 or $cont == 16 or $cont == 20 or $cont == 24 or $cont == 28 or $cont == 32 or $cont == 36 or $cont == 40 or $cont == 44 or $cont == 48 or $cont == 52 or $cont == 56 or $cont == 60 or $cont == 64 or $cont == 70 or $cont == 74 or $cont == 78 or $cont == 82 or $cont == 86 or $cont == 90 or $cont == 94 or $cont == 98 or $cont == 102) {
				echo "</tr>";
			}
		}
		
		?>

			
			</table>
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
