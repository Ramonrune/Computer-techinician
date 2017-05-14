<?php include "valida_sessao.inc"; ?>
<?php include "valida_permissao_ramal.inc"; ?>
<html>
<head>
<title>Funcionários</title>
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
				<h1>Gestão de Funcionários</h1>
				
				
			</header>
	
	<!-- parte do corpo do menu do administrador contendo calendarios , e outras coisas -->
	<div id="corpo">
		<div>


			
			<br> <br>
			<!-- Formulário que adiciona funcionário 
			ele também possui um sistema que salva automaticamente todos 
			os dados que foram informados pelo usuário caso algum campo informado
			esteja vazio assim não perdendo nenhuma informação informada  -->
			<form method="post" action=""
				enctype="multipart/form-data">
				<table>
					<tr>
						<td>Digite o Nome do Funcionario:</td>
						<td><input type="text" name="nome" maxlength="100"
							value="<?php if(isset($_POST["upload"])){ @$nome = $_POST["nome"];echo $nome;}?>"></td>
					</tr>
					<tr>
						<td>Digite o Setor :</td>
						<td><input type="text" name="setor" size="20" maxlength="20"
							value="<?php  if(isset($_POST["upload"])){ @$setor = $_POST["setor"];echo $setor;}?>"></td>
					</tr>
					<tr>
						<td>Digite o Ramal :</td>
						<td><input type="tel" name="ramal" size="20" maxlength="20"
							value="<?php if(isset($_POST["upload"])){  @$ramal = $_POST["ramal"];echo $ramal;}?>"></td>
					</tr>
					<tr>
						<td>Digite o Email :</td>
						<td><input type="email" name="email" size="20" maxlength="90"
							value="<?php if(isset($_POST["upload"])){ @$email = $_POST["email"];echo $email;}?>"></td>
					</tr>
					<tr>
						<td>Digite a Data de Nascimento:</td>
						<td><input type="date" name="data" size="20"></td>
					</tr>
					<tr>
						<td>Selecione Sua Imagem:</td>
						<td><input type="file" name="img[]"></td>
					</tr>
					<tr>
						<td><br> <input type="submit" value="Inserir Funcionario"
							id="input" name="upload" style="cursor: pointer;"></td>
						<td><br> <input type="reset" value="Limpar" id="input"
							name="limpar" style="cursor: pointer;"></td>
					</tr>
				</table>
			</form>
			<?php 
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
						"°",
						"ç"
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
						"",
						"c"
				);
				return str_replace ( $array1, $array2, $texto );
			}
			
			
			include "../Conexao.inc";
			if(isset($_POST["upload"])){
				@$file = $_FILES ["img"];
				@$numfile = count ( array_filter ( $file ["name"] ) );
				//Aqui é pego os dados do funcionário
				$nome = $_POST ["nome"];
				$setor = $_POST ["setor"];
				$ramal = $_POST ["ramal"];
				$email = $_POST ["email"];
				$data = $_POST ["data"];
					
				$erro = 0;
					
				if (empty ( $nome )) {
					echo "Informe um Nome.<br>";
					$erro += 1;
				}
					
				if (empty ( $setor )) {
					echo "Informe um Setor.<br>";
					$erro += 1;
				}
				if (empty ( $ramal )) {
					echo "Informe um Ramal.<br>";
					$erro += 1;
				}
				if (empty ( $email )) {
					echo "Informe um Email.<br>";
					$erro += 1;
				}
				if (empty ( $data )) {
					echo "Informe uma Data.<br>";
					$erro += 1;
				}
				
				
				if ($erro != 0) {
					echo "<form action='' method='post'>";
					echo "<input type='hidden' name='nome' value='$nome'>";
					echo "<input type='hidden' name='setor' value='$setor'>";
					echo "<input type='hidden' name='ramal' value='$ramal'>";
					echo "<input type='hidden' name='email' value='$email'>";
				echo "</form>";
				}
				
				$nome = preg_replace( '/[`^~\'"]/', null, iconv( 'UTF-8', 'ASCII//TRANSLIT', $nome ) );
				
				// Pasta
				$folder = "../Recursos/funcionario";
				
				// Requisitos
				for($i = 0; $i < $numfile; $i ++) {
					$name = $file ["name"] [$i];
					$type = $file ["type"] [$i];
					$size = $file ["size"] [$i];
					$error = $file ["error"] [$i];
					$tmp = $file ["tmp_name"] [$i];
					// Recupera a extensão do arquivo
					$extensao = @end ( explode ( '.', $name ) ); // recupera o ultimo indice de um array
					$novoNome = $nome . ".$extensao"; // novo nome a ser gravado na pasta (Rand = Gera um numero aleatorio)
				$permite = array (
						"jpeg",
						"bmp",
						"png",
						"gif",
						"jpg"
				);
				if(!in_array ($extensao, $permite )){
					echo "Insira uma Foto Válida.<br><br>";
					$erro += 1;
				}
				$maxtam = 1024 * 1024 * 5; // 5MB
				if ($size > $maxtam){
					echo "Insira uma Foto Com Menos de 5MB.<br><br>";
					$erro += 1;
					
				}
				
				
				// Mensagens
				$msg = array ();
				$error = array (
						1 => "Arquivo no upload é maior do que o limite definido",
						2 => "O arquivo ultrapassa o limite de tamanho MAX_FILE_SIZE (64MB)",
						3 => "O upload do arquivo foi feito parcialmente",
						4 => "Não foi feito o upload do arquivo"
				);
				// Verificando os erros das minhas imagens
					
				
				
				$novoNome = retira_especial($novoNome);
					if (move_uploaded_file ( $tmp, $folder . "/" . $novoNome )) { // Responsavel em copiar os arquivos temporarios para a pasta uploads
					} else
						$msg [] = "<b>$name :</b> Desculpe ! Não foi possivel fazer  Upload...";
				
			
				}
				
				
				
				if($erro==0 and $numfile==0){
					$resultado = mysqli_query ( $conexao, "INSERT INTO funcionario values(null,'$nome','$setor','$ramal','$email','$data','padrao.jpg')" );
					echo "Funcionario Inserido com Sucesso!<br><br>";
						
					@$query = mysqli_query ( $conexao, $resultado );
				}
				
						if ($erro == 0 and $numfile>0) {
							
							$nome = retira_especial ( $nome );
							$setor = retira_especial ( $setor );
							$ramal = retira_especial ( $ramal );
							//aqui é inserido os dados do funcionário no banco de dados
						
							$resultado = mysqli_query ( $conexao, "INSERT INTO funcionario values(null,'$nome','$setor','$ramal','$email','$data','$novoNome')" );
							echo "Funcionario Inserido com Sucesso!<br><br>";
							
							@$query = mysqli_query ( $conexao, $resultado );
						
							
							
							
							mysqli_close ( $conexao );
						}
						
					
					
				
				}
				
				if(isset($_POST["alterar"])){
					// aqui é atualizado o o nome , setor e ramal do funcionário
					include "../Conexao.inc";
					$id = $_POST["alterar"];
					$nome = $_POST ["nome"];
					$setor = $_POST ["setor"];
					$ramal = $_POST ["ramal"];
					$email = $_POST ["email"];
					
					$erro = 0;
					
					if (empty ( $id )) {
						echo "Informe uma ID Válida.<br>";
						$erro += 1;
					}
					if (empty ( $nome )) {
						echo "Informe um Nome Válido.<br>";
						$erro += 1;
					}
					if (empty ( $setor )) {
						echo "Informe um Setor Válido.<br>";
						$erro += 1;
					}
					if (empty ( $ramal )) {
						echo "Informe um Ramal Válido.<br>";
						$erro += 1;
					}
					if (empty ( $email )) {
						echo "Informe um Email Válido.<br>";
						$erro += 1;
					}
					
					if ($erro != 0) {
						
					}
					
					$nome = retira_especial($nome);
					if ($erro == 0) {
						$nome = preg_replace( '/[`^~\'"]/', null, iconv( 'UTF-8', 'ASCII//TRANSLIT', $nome ) );
						$resultado = mysqli_query ( $conexao, "UPDATE funcionario SET nome = '$nome' WHERE id = $id" );
						$resultado3 = mysqli_query ( $conexao, "UPDATE funcionario SET setor = '$setor' WHERE id = $id" );
						$resultado4 = mysqli_query ( $conexao, "UPDATE funcionario SET ramal = '$ramal' WHERE id = $id" );
						$resultado5 = mysqli_query ( $conexao, "UPDATE funcionario SET email = '$email' WHERE id = $id" );
						@$registro = mysqli_fetch_array ( $resultado );
						@$registro3 = mysqli_fetch_array ( $resultado3 );
						@$registro4 = mysqli_fetch_array ( $resultado4 );
						@$registro5 = mysqli_fetch_array ( $resultado5 );
						echo "Dados Informados :<br>";
						echo "ID:" . $id . "<br>";
						echo "Nome:" . $nome . "<br>";
						echo "Setor:" . $setor . "<br>";
						echo "Ramal:" . $ramal . "<br>";
						echo "Email:" . $email . "<br>";
					
						echo "Dados Enviados e Alterados Corretamente.<br><br>";
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
					// aqui é pego a id do funcionario e após isso ele é deletado do banco de dados
					include "../Conexao.inc";
					$id = $_POST["pega"];
					
					if (empty ( $id )) {
						echo "Informe uma Id!<br><br>";
					} else {
							
						$resultado = mysqli_query ( $conexao, "DELETE FROM funcionario WHERE id=$id" );
							
						echo "Funcionário Excluido com Sucesso!<br><br>";
					}
					
					mysqli_close ( $conexao );
				}
			
			?>
			
			<br>
			<br>
			<table border="1"
				style="box-shadow: 0 0 5px; border-radius: 4px; border: 1px solid black; border-collapse: collapse;"
				width="100%">
				<thead>
					<tr>
						<th><b>Nome</b></th>
						<th><b>Setor</b></th>
						<th><b>Ramal</b></th>
						<th><b>Email</b></th>
						<th><b>Ações</b></th>
					</tr>
				</thead>
				<tr>
 	<?php
		//Aqui são mostrados todos os funcionários cadastrados com a possibilidade de alterar e excluir funcionários 
		include "../Conexao.inc";
		$resultado = mysqli_query ( $conexao, "SELECT * FROM funcionario" );
		if ($resultado === FALSE) {
			die ( mysql_error () );
		}
		@$numero = mysqli_num_rows ( $resultado );
		if ($numero == 0) {
			echo '<tr><td colspan="6" align="center">' . "Nenhum Funcionário Cadastrado.</td></tr>";
		}
		while ( $row = mysqli_fetch_array ( $resultado ) ) {
			
			echo "<form action='' method='post'>";
			echo "<td><input type='text' value='$row[nome]' name='nome' maxlength='100'></td>";
			echo "<td><input type='text' value='$row[setor]' name='setor' maxlength='20'></td>";
			echo "<td><input type='text' value='$row[Ramal]' name='ramal' maxlength='20'></td>";
			echo "<td><input type='text' value='$row[email]' name='email' maxlength='90'></td>";
			echo "<td><input type='image' src='../Recursos/Imagens/salvar.png' width='16' height='16' name='alterar' value='$row[id]'>&nbsp;&nbsp;&nbsp;&nbsp;<input type='image' src='../Recursos/Imagens/delecao.png' width='16' height='16' name='excluir' value='$row[id]'></td>";
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
		<br> <br>
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