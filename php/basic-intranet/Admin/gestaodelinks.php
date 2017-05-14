<?php include "valida_sessao.inc"; ?>
<?php include "valida_permissao_ramal.inc"; ?>
<html>
<head>
<title>Links</title>
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
<link rel="stylesheet" type="text/css" href="../Recursos/tabelas/css/component.css" />

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
				<h1>Gestão de Links</h1>
				
				
			</header>
	
	<!-- parte do corpo do menu do administrador contendo calendarios , e outras coisas -->
	<div id="corpo">
		<div>


			
			<br> <br>
			<!-- Formulário que adiciona links -->
			<form method="post" action="">
				<table>

					<tr>
						<td>Digite o Titulo do Link:</td>
						<td><input type="text" name="titulo" maxlength="40"></td>
					</tr>
					<tr>
						<td>Digite a URL do link :</td>
						<td><input type="text" name="url" size="20" maxlength="100"></td>
					</tr>
					<tr>
						<td><br> <input type="submit" value="Inserir Link" id="input"
							name="upload"></td>
						<td><br> <input type="reset" value="Limpar" id="input"
							name="limpar"></td>
					</tr>
				</table>
			</form>
			<?php 
			if(isset($_POST["upload"])){

				include "../Conexao.inc";
				//aqui é peg o titulo e a url do que foi digitado e validado após isso
				$titulo = $_POST ["titulo"];
				$url = $_POST ["url"];
					
				$erro = 0;
					
				if (empty ( $titulo )) {
					echo "Informe um Titulo.<br>";
					$erro += 1;
				}
				if (empty ( $url )) {
					echo "Informe uma URL.<br>";
					$erro += 1;
				}
					
				if ($erro == 0) {
					$idlink = 0;
					@session_start ();
					if (IsSet ( $_SESSION ["nome_usuario"] )) {
						$nome_usuario = $_SESSION ["nome_usuario"];
					}
					$resulta = mysqli_query ( $conexao, "SELECT * FROM Usuario WHERE NI=$nome_usuario" );
					@$query = mysqli_query ( $conexao, $resulta );
					
					while ( $row = mysqli_fetch_array ( $resulta ) ) {
					
						$nomedousuario = $row ["NI"];
						$nom1=$row["Nome"];
					}
					//aqui é inserido no banco de dados o link digitado
					$resultado = mysqli_query ( $conexao, "INSERT INTO link values($idlink,'$titulo','$url','$nome_usuario','$nom1')" );
					echo "Link Inserido com Sucesso!<br><br>";
				
					@$query = mysqli_query ( $conexao, $resultado );
				
					mysqli_close ( $conexao );
					$idlink += 1;
				} else {
					echo "O Link Não foi Inserido!<br><br>";
				}
			}
			
			if(isset($_POST["salvar"])){
				// aqui é pego a id que foi informada
				include "../Conexao.inc";
				$id = $_POST["salvar"];
				$titulo = $_POST ["titulo"];
				$url = $_POST ["url"];
				
				$erro = 0;
				if (empty ( $id )) {
					echo "Informe uma Id válida.<br>";
					$erro += 1;
				}
				if (empty ( $titulo )) {
					echo "Informe um Titulo válido.<br>";
					$erro += 1;
				}
				
				if (empty ( $url )) {
					echo "Informe uma URL válida.<br>";
					$erro += 1;
				}
				
				if ($erro != 0) {
				
				}
				// aqui é atualizado o titulo de a url
				if ($erro == 0) {
					$resultado = mysqli_query ( $conexao, "UPDATE link SET titulo = '$titulo' WHERE id = $id" );
					$resultado2 = mysqli_query ( $conexao, "UPDATE link SET url = '$url' WHERE id = $id" );
					@$registro = mysqli_fetch_array ( $resultado );
					@$registro2 = mysqli_fetch_array ( $resultado2 );
					echo "Link Alterado com Sucesso ! <br>Titulo : $titulo .<br>URL : $url .<br><br>";
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
					//aqui é pego o id do link que foi clicado e após isso ele é excluido do banco de dados
					include "../Conexao.inc";
					$idlink = $_POST["pega"];
					
					if (empty ( $idlink )) {
						echo "Informe uma Id!<br><br>";
					} else {
							
						$resultado = mysqli_query ( $conexao, "DELETE FROM link WHERE Id=$idlink" );
							
						echo "Link Excluido com Sucesso!<br><br>";
					}
					
					mysqli_close ( $conexao );
				}
			
			
			
			
			
			?>
			<br> <br>
			
			<table border="1"
				style="box-shadow: 0 0 5px; border-radius: 4px; border: 1px solid black; border-collapse: collapse;"
				width="100%">
				<thead>
					<tr>
						<th><b>Titulo</b></th>
						<th><b>URL</b></th>
						<th><b>Responsavel</b></th>
						<th><b>Autor</b></th>
						<th><b>Ações</b></th>
					</tr>
				</thead>
				<tr>
 	<?php
		// Aqui está sendo mostrados todos os links que estão cadastrados 
		//junto com eles é possivel edita-los e salva-los
		include "../Conexao.inc";
		$resultado = mysqli_query ( $conexao, "SELECT * FROM link,Usuario WHERE link.autor=Usuario.NI" );
		if ($resultado === FALSE) {
			die ( mysql_error () );
		}
		$numero = mysqli_num_rows ( $resultado );
		if ($numero == 0) {
			echo '<tr><td colspan="6" align="center">' . "Nenhum Link Cadastrado.</td></tr>";
		}
		while ( $row = mysqli_fetch_array ( $resultado ) ) {
			echo "<form action='' method='post'>";
			echo "<td><input type='text' value='$row[titulo]' name='titulo'  maxlength='40' size='20'></td>";
			echo "<td><input type='text' value='$row[url]' name='url'  maxlength='100' size='30'></td>";
			echo "<td>";
			if($row["NI"]==$row["autor"]){
				echo $row["Nome"];
			}
			echo "<td>".$row["responsavel"]."</td>";
			
			echo "</td>";
			echo "<td><input type='image' src='../Recursos/Imagens/salvar.png' width='16' height='16' name='salvar' value='$row[id]'>&nbsp;&nbsp;&nbsp;<input type='image' src='../Recursos/Imagens/delecao.png' width='16' height='16' name='excluir' value='$row[id]'></td>";
			echo "</form></tr>";
		}
		
		mysqli_close ( $conexao );
		
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