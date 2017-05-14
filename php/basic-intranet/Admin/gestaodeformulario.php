<?php include "valida_sessao.inc"; ?>
<?php include "valida_permissao_arquivos.inc"; ?>
<html>
<head>
<title>Formulários</title>
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
				<h1>Gestão de Formulários</h1>
				
				
			</header>
	<!-- parte do corpo do menu do administrador contendo calendarios , e outras coisas -->
	<div id="corpo">
		<div>


		
			<br> <br>
			<!-- Formulário que adiciona formulários  -->
			<form method="post" action=""
				enctype="multipart/form-data">
				<table>
					<tr>
						<td>Digite o Nome :</td>
						<td><input type="text" name="nome" size="20" maxlength="120"></td>
					</tr>
					<tr>
						<td>Digite a Referência :</td>
						<td><input type="text" name="referencia" size="20" maxlength="10">
						</td>
					</tr>
					<tr>
						<td>Selecione o Formulario:</td>
						<td><input type="file" name="img[]"></td>
					</tr>
				</table>
				<br> <input type="reset" value="Limpar" id="input" name="limpar">
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="submit"
					value="Inserir" id="input" name="upload">




			</form>
			
			<?php 
			if(isset($_POST["upload"])){
				// função que retira acentos
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
				// função que retira caracteres especiais
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
				for($i = 0; $i < $numfile; $i ++) {
					$name = $file ["name"] [$i];
					$type = $file ["type"] [$i];
					$size = $file ["size"] [$i];
					$error = $file ["error"] [$i];
					$tmp = $file ["tmp_name"] [$i];
				}
				
				// Recupera a extensão do arquivo
				$extensao = @end ( explode ( '.', $name ) );
				
				$permite = array (
						"doc",
						"docx",
						"pdf",
						"xls",
						"txt"
				);
				include "../Conexao.inc";
				$nome = $_POST ["nome"];
				$referencia = $_POST ["referencia"];
				$erro = 0;
				if (empty ( $nome )) {
					echo "Digite o Nome Corretamente<br><br>";
					$erro += 1;
				}
				if (empty ( $referencia )) {
					echo "Digite a Referência Corretamente<br><br>";
					$erro += 1;
				}
				if(!in_array ($extensao, $permite )){
					echo "Insira um Formulário Válido.<br><br>";
					$erro += 1;
				}
				if ($erro != 0) {
					
				}
				$data = date ( 'Y-m-d' );
				
				if ($erro == 0) {
					@session_start ();
					if (IsSet ( $_SESSION ["nome_usuario"] )) {
						$nome_usuario = $_SESSION ["nome_usuario"];
					}
					
					$peganome = mysqli_query ( $conexao, "SELECT * FROM Usuario WHERE NI=$nome_usuario" );
					@$query = mysqli_query ( $conexao, $peganome );
						
					while ( $row = mysqli_fetch_array ( $peganome ) ) {
					
						$nome_usuario = $row ["NI"];
						$nom1=$row["Nome"];
					}
					// aqui é rancado os caracteres especiais e gravado no banco de dados
					$nome = retira_acentos ( $nome );
					$referencia = retira_acentos ( $referencia );
					$nome = retira_especial ( $nome );
					$referencia = retira_especial ( $referencia );
					$resultado = mysqli_query ( $conexao, "INSERT INTO formularios values(null,'$nome','$referencia','$data','$extensao','$nome_usuario','$nom1');" );
					echo "Formulario Enviado Corretamente!<br>";
				}
				
				echo "<br><br>";
				
				$folder = "../Recursos/formularios";
				
				$maxtam = 1024 * 1024 * 100;
				
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
					echo "Selecione um Arquivo";
				} else {
					for($i = 0; $i < $numfile; $i ++) {
						$name = $file ["name"] [$i];
						$type = $file ["type"] [$i];
						$size = $file ["size"] [$i];
						$error = $file ["error"] [$i];
						$tmp = $file ["tmp_name"] [$i];
				
						// Recupera a extensão do arquivo
						$extensao = @end ( explode ( '.', $name ) ); // recupera o ultimo indice de um array
						$novoNome = $nome . ".$extensao"; // novo nome a ser gravado na pasta (Rand = Gera um numero aleatorio)
						$novoNome = $novoNome ;
						// Verificando os erros das minhas imagens
				
						if ($error != 0) {
							$msg [] = "<b>$name  :</b>" . $errorMsg [$error];
						}
				
						elseif ($size > $maxtam)
						$msg [] = "<b>$name :</b>Erro - Arquivo ultrapassa o limite de 5MB";
				
						else {
							if (move_uploaded_file ( $tmp, $folder . "/" . $novoNome )) { // Responsavel em copiar os arquivos temporarios para a pasta uploads
								
							} else
								$msg [] = "<b>$name :</b> Desculpe ! Não foi possivel fazer  Upload...<br><br>";
						}
						foreach ( $msg as $vlr )
							echo $vlr . "<br>";
					}
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
				//aqui é pego o código do formulário que foi passado
				//após isso é feito o unlink , ou seja , a exclusão do arquivo
				//então o arquivo é deletado do banco de dados
				include "../Conexao.inc";
				$codigo = $_POST["pega"];
				$resultado = mysqli_query ( $conexao, "SELECT * FROM formularios" );
				if ($resultado === FALSE) {
					die ( mysql_error () );
				}
				while ( $row = mysqli_fetch_array ( $resultado ) ) {
				
					if ($codigo == $row ["nome"]) {
						$nome = $row ["nome"];
						$extensao = $row ["extensao"];
					}
				}
				
				@$arquivo = "formularios/$nome.$extensao";
				
				@unlink ( $arquivo );
				
				if (empty ( $codigo )) {
					echo "Informe um Nome!<br><br>";
				} else {
				
					$resultado = mysqli_query ( $conexao, "DELETE FROM formularios WHERE nome='$codigo'" );
				
					@$query = mysqli_query ( $conexao, $resultado );
				
					echo "Formulario Excluido com Sucesso!<br><br>";
				}
			}
			
			
			?>
			<br> <br>
			<table border="1"
				style="box-shadow: 0 0 5px; border-radius: 4px; border: 1px solid black; border-collapse: collapse;"
				width="100%">
				<thead>
					<tr>
						<th><b>Nome</b></th>
						<th><b>Data de Upload</b></th>
						<th><b>Referência</b></th>
						<th><b>Responsavel</b></th>
						<th><b>Autor</b></th>
						<th><b>Ações</b></th>
					</tr>
				</thead>
				<tr>
 	<?php
		// aqui são mostrados todos os formulários que estão sendo cadastrados 
		include "../Conexao.inc";
		$resultado = mysqli_query ( $conexao, "SELECT * FROM formularios,Usuario WHERE formularios.autor=Usuario.NI ORDER BY formularios.nome ASC" );
		if ($resultado === FALSE) {
			die ( mysql_error () );
		}
		$numero = mysqli_num_rows ( $resultado );
		if ($numero == 0) {
			echo "Nenhum Formulário Cadastrado.";
		}
		//aqui é possivel excluir o formulário caso necessário
		while ( $row = mysqli_fetch_array ( $resultado ) ) {
			echo "<td>" . $row ['nome'] . "</td>";
			echo "<td >" . date ( "d/m/Y", strtotime ( $row ["data_upload"] ) ) . "</td>";
			echo "<td>" . $row ['referencia'] . "</td>";
			echo "<td>" ;
			if($row["NI"]==$row["autor"]){
				echo $row["Nome"];
			}
			 echo "</td>";
			 echo "<td>".$row["responsavel"]."</td>";
			
			echo "<td><form method='post'><input type='image' src='../Recursos/Imagens/delecao.png' width='16' height='16' name='excluir' value='$row[nome]'></form></td>";
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
