<html>
<head>
<title>Contato</title>
<!--Index do html
Projeto Intranet Senai
Data: 26/02/2014
-->
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="UTF-8">
<link rel="icon" href="Recursos/Imagens/icon.png">
<link rel="stylesheet" type="text/css" href="Layout/estilo.css">
<script src="Recursos/jquery/jquerymenu.js"></script>
</head>
<body style="min-width: 1000px; max-width: 2000px; height: 300px;">
	<!--Está é a parte do cabeçalho do código -->
	<?php
	include "cabecalho.php";
	?>
	
	<!--Parte responsavel pelo funcionamento dos menus -->

	<br><br><br><br><br><br><br>
	<div style="position:absolute;">
	<img src="Recursos/Imagens/imagemlogin.png" width="100%" height="675px">
	</div>
	<div
		style="position: relative; top: 30%; margin: 0 auto; min-width: 1000px; max-width: 1000px; height: 240px;">
		<!-- Formulário de Login -->
		<br><br><br>
		<div id="espacologin">
			<div id="arealogin">
				<div class="login" style="position:relative;left:-10%;">
					<br>
					<h1>Formulario de Contato</h1>
					<br>
					<img src="Recursos/Imagens/logo.png"><br> <br>
	
		<?php
		// aqui é pego as variaves que serão usadas e checado se elas estão vazias
		include "Conexao.inc";
		$nome = $_POST ["nome"];
		$email = $_POST ["email"];
		$ddd = $_POST ["ddd"];
		$telefone = $_POST ["telefone"];
		$assunto = $_POST ["assunto"];
		$mensagem = $_POST ["mensagem"];
		$erro = 0;
		if (empty ( $nome )) {
			echo "Por Favor Preencha o seu Nome.<br>";
			$erro += 1;
		}
		if (empty ( $email )) {
			echo "Por Favor Preencha o seu Email.<br>";
			$erro += 1;
		}
		if (empty ( $ddd )) {
			echo "Por Favor Preencha o seu DDD.<br>";
			$erro += 1;
		}
		if (empty ( $telefone )) {
			echo "Por Favor Preencha o seu Telefone.<br>";
			$erro += 1;
		}
		if (empty ( $assunto )) {
			echo "Por Favor Preencha o Assunto.<br>";
			$erro += 1;
		}
		if (empty ( $mensagem )) {
			echo "Por Favor Preencha o seu Mensagem.<br>";
			$erro += 1;
		}
		// aqui é validado , caso seja informado os caracteres < ou >
		// a mensagem não será enviada , para que não seja possivel inserir códigos
		// maliciosos em javascript para hackear o sistema
		if (strstr ( $nome, '<', '>' ) == TRUE) {
			echo "Favor digitar seu Nome Corretamente.<br>";
			$erro += 1;
		}
		if (strstr ( $email, '<', '>' ) == TRUE) {
			echo "Favor digitar o Email Corretamente.<br>";
			$erro += 1;
		}
		if (strstr ( $ddd, '<', '>' ) == TRUE) {
			echo "Favor digitar o DDD Corretamente.<br>";
			$erro += 1;
		}
		if (strstr ( $telefone, '<', '>' ) == TRUE) {
			echo "Favor digitar o Telefone Corretamente.<br>";
			$erro += 1;
		}
		if (strstr ( $assunto, '<', '>' ) == TRUE) {
			echo "Favor digitar o Assunto Corretamente.<br>";
			$erro += 1;
		}
		if (strstr ( $mensagem, '<', '>' ) == TRUE) {
			echo "Favor digitar a Mensagem Corretamente.<br>";
			$erro += 1;
		}
		
		if ($erro > 0) {
			echo "<br><a class='cor' href='contato.php'>Voltar</a>";
		}
		
		if ($erro == 0) {
			$id = 0;
			// após isso é enviado o formulário digitado para o banco de dados caso não tenha ocorrido nenhum erro
			$resultado = mysqli_query ( $conexao, "INSERT INTO contato values($id,'$nome','$email','$ddd','$telefone','$assunto','$mensagem','1')" );
			echo "Mensagem Enviada com Sucesso!<br><br><a href='contato.php'>Voltar</a>";
			
			@$query = mysqli_query ( $conexao, $resultado );
			
			mysqli_close ( $conexao );
			$id ++;
		}
		
		?>
	</div>
			</div>

		</div>


	</div>
	<br><br><br><br><br><br><br><br><br>
	<div id="rodape" align="center" style="position:relative;top:40%;">
	<address>
	Rua Vereador Sergio Leopoldino Alves, 500 - Cidade Industrial<br>
	CEP: 13456-166 - Santa Bárbara d'Oeste - SP<br>
	Telefone: (19) 3499-1450 - senaisantabarbara@sp.senai.br
	<br>
	
	©2015 - 2015 CFP 5.14 - Todos os direitos reservados
	<br>
	<a href="creditos.php" style="color:white;">Créditos</a>
	</address>
	
	</div>

</body>
</html>





