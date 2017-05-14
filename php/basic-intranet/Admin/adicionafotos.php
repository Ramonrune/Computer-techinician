<?php include "valida_sessao.inc"; ?>
<?php include "valida_permissao_galeria.php"; ?>
<html>
<head>
<title>Galeria</title>
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
<link rel="stylesheet" type="text/css" href="../Recursos/tabelas/css/component.css" />

<!-- O estilo dos inputs e header -->
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

<?php
// aqui é selecionado o album que foi escolhido para enviar as imagens
include "../Conexao.inc";
if(!isset($_GET["id"])){
	echo "Nenhum Album Encontrado.";
}


if(isset($_GET["id"]) and is_numeric($_GET["id"])){
$id = $_GET ["id"];
$resultado = mysqli_query ( $conexao, "SELECT * FROM Album WHERE id=$id" );
@$numero = mysqli_num_rows ( $resultado );
if($numero==0){
	echo "Nenhum Album Cadastrado.";
}else{
if ($resultado === FALSE) {
	die ( mysql_error () );
}
// aqui é pego a pasta para ser gravado no banco de dados e é mostrado as imagens que tem no album
while ( $row = mysqli_fetch_array ( $resultado ) ) {
	$pasta = $row ["Nome"];
	echo "<table>";
	echo "<tr>";
	echo "<td>";
	echo "<img src='../Recursos/capagaleria/$row[Nome].$row[extensao]' width='100' height='100'>";
	echo "</td>";
	echo "<td valign='top'>";
	echo "Album :<br>" . $row ["Nome"] . "<br>";
	echo "</td>";
	echo "</tr>";
	echo "</table>";
}

?>
<form action="" method="post"
				enctype="multipart/form-data">
				Selecione a Imagem :<br>
				<input type="file" name="img[]" multiple id="upload">&nbsp;&nbsp;&nbsp;<input
					type="submit" value="UPLOAD" id="criaimagem" name="upload">
			</form>
			<?php 
			if(isset($_POST["upload"])){
				$file = $_FILES ["img"];
				$numfile = count ( array_filter ( $file ["name"] ) );
				$data = date ( 'Y:m:d' );
				
				$erro = 0;
				
				if ($numfile <= 0) {
					echo "Insira Uma Imagem.<br>";
					$erro += 1;
				}
				
				if ($erro != 0) {
					
				}
				if ($erro == 0) {
				
					$permite = array (
							"image/jpeg",
							"image/png"
					);
					$erro = 0;
				
					$folder = '../Recursos/galeria/' . $pasta;
				
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
					if ($numfile <= 4) {
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
								// novo nome a ser gravado na pasta (Rand = Gera um numero aleatorio)
								$extensao = @end ( explode ( '.', $name ) );
								$novoNome = rand () . ".$extensao";
								include "../Conexao.inc";
								
								
								//aqui é inserido no banco de dados a foto na galeria
								$resultado = mysqli_query ( $conexao, "INSERT INTO Galeria Values(null,'$novoNome','$data','','','$pasta','$extensao')" );
								@$registro = mysqli_fetch_array ( $resultado );
								mysqli_close ( $conexao );
									
								// Verificando os erros das minhas imagens
									
								if ($error != 0) {
									$msg [] = "<b>$name  :</b>" . $errorMsg [$error];
								}
				
								elseif ($size > $maxtam)
								$msg [] = "<b>$name :</b>Erro - Imagem ultrapassa o limite de 5MB";
									
								else {
									if (move_uploaded_file ( $tmp, $folder . "/" . $novoNome )) { // Responsavel em copiar os arquivos temporarios para a pasta uploads
											
										include "../Conexao.inc";
										$resultado1 = mysqli_query ( $conexao, "SELECT * FROM Album WHERE Nome='$pasta'" );
										if ($resultado === FALSE) {
											die ( mysql_error () );
										}
										
										
										while ( @$row = mysqli_fetch_array ( $resultado1 ) ) {
											$id = $row ["id"];
										}
										$msg [] = "<b>$name :</b>Upload realizado com sucesso !";
										echo "<img src='../Recursos/$folder/$novoNome' width='150' height='100'>";
										$input_image = "../Recursos/$folder/$novoNome";
											
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
											$imagem=rand () . ".$extensao";
											ImageJPEG( $thumbnail, "../Recursos/$folder/$imagem");
											
											$resultado = mysqli_query($conexao,"UPDATE Galeria SET thumb = '$imagem' WHERE Nome = '$novoNome'");
										}
										if($extensao=="png"){
											$imagem=rand () . ".$extensao";
											ImageJPEG( $thumbnail, "../Recursos/$folder/$imagem");
											
											$resultado = mysqli_query($conexao,"UPDATE Galeria SET thumb = '$imagem' WHERE Nome = '$novoNome'");
										}
										// Limpa da memoria a imagem criada temporáriamente:
										ImageDestroy( $thumbnail );
									
									
									
									} else
										$msg [] = "<b>$name :</b> Desculpe ! Não foi possivel fazer  Upload...<br><br>";
								}
									
								foreach ( $msg as $vlr )
									echo $vlr . "<br>";
							}
							}
						} else {
						echo "Insira uma Quantidade Menor que 4 Imagens .";
		}
					
				}
			}
			
			if(isset($_POST["salvar"])){
				// aqui é pego o titulo e a id da imagem
				// após isso é atualizado na galeria o titulo onde a id informada for igual a id do banco de dados
				include "../Conexao.inc";
				$titulo = $_POST ["titulo"];
				$id = $_POST ["id"];
				
				$resultado1 = mysqli_query ( $conexao, "SELECT * FROM Galeria" );
				
				if ($resultado1 === FALSE) {
					die ( mysql_error () );
				}
				
				while ( @$row = mysqli_fetch_array ( $resultado1 ) ) {
					foreach ( $id as $keyid => $valueid ) {
						$keyid += 1;
						foreach ( $titulo as $key => $value ) {
							$key += 1;
							if ($keyid == $key) {
								$resultado = mysqli_query ( $conexao, "UPDATE Galeria SET titulo = '$value' WHERE id = $valueid" );
								@$registro = mysqli_fetch_array ( $resultado );
							}
						}
					}
				}
				echo "Alterações feitas com Sucesso!<br>";
				
			}
			
			if(isset($_POST["excluir"])){
				//aqui é pego o id da foto da galeria que foi informada para a exclusão
				//após isso é feito o unlink da imagem para exclui-la da pasta
				//e então ocorre a exclusão do banco de dados da imagem
				include "../Conexao.inc";
				$id = $_POST["excluir"];
				$resultado1 = mysqli_query ( $conexao, "SELECT * FROM Galeria where id=$id" );
				if ($resultado1 === FALSE) {
					die ( mysql_error () );
				}
				
				while ( $row = mysqli_fetch_array ( $resultado1 ) ) {
					$pasta = $row ["pasta"];
				
					unlink ( '../Recursos/galeria/' . $row ['pasta'] . '/' . $row ["Nome"] );
				}
				
				$resultado = mysqli_query ( $conexao, "DELETE FROM Galeria WHERE id=$id" );
				
				mysqli_close ( $conexao );
				echo "Imagem Excluida com Sucesso!<br><br>";
				
			}
			
			?>
			<br>
			<table border='1'
				style="box-shadow: 0 0 5px; border-radius: 4px; border: 1px solid black; border-collapse: collapse;"
				width="100%">
				<thead>
				<tr>
					<th>
						<b>Titulo</b>
					</th>
					<th>
						<b>Foto</b>
					</th>
					<th>
						<b>Ações</b>
					</th>
				</tr>
				</thead>
				<tr>
<?php
include "../Conexao.inc";
$resultado1 = mysqli_query ( $conexao, "SELECT * FROM Galeria WHERE pasta='$pasta'" );
if ($resultado === FALSE) {
	die ( mysql_error () );
}
//aqui é um form que salva a imagem  junto ao edit que exclui a imagem
echo "<form action='' method='post'>";
while ( @$row = mysqli_fetch_array ( $resultado1 ) ) {
	echo "<input type='hidden' name='id[]' value='$row[id]'>";
	echo "<td><input type='text' name='titulo[]' value='$row[titulo]' maxlength='100'></td>";
	echo "<td><img src='../Recursos/galeria/$row[pasta]/$row[thumb]' width='50' height='50'></td>";
	echo "<td><input type='image' src='../Recursos/Imagens/salvar.png' name='salvar' width='16' height='16' value='$pasta'>&nbsp;&nbsp;&nbsp;<input type='image' src='../Recursos/Imagens/delecao.png' name='excluir' width='16' height='16' value='$row[id]'></td>";
	
	echo "</tr>";
}
echo "</form>";
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
		<br><br>
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
     <br> <br> <br> <br> <br> <br>
     <div id="rodape1" align="center">
			<address>©2015 - 2015 CFP 5.14 - Todos os direitos reservados</address>

		</div>  
     
	
	</body>
</html>
