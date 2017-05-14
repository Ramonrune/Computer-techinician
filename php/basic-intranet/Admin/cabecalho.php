<html>
<head>
<meta charset="UTF-8">
<link rel="icon" href="../Recursos/Imagens/icon.png">
<link rel="stylesheet" type="text/css" href="../Layout/estilo.css">
</head>
<body>

	<div id="ca">

		<div align="right" id="escola">
			<font color="white"> <b>Escola SENAI "Alvares Romi" - Santa Barbara
					d' Oeste </b>
			</font>
		</div>
		<!-- Aqui é mostrado o cabeçalho 
	Se o usuário ja estiver logado irá aparecer a aba de administração para o usuário -->
		<div id="pos">
			<br>
			<br>&nbsp; <a href="index.php"><img src="../Recursos/Imagens/logo.png"
				width='200'></a><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <font
				color="white"> <b>INTRANET CFP 5.14</b></font>
		</div>
		<div align="right" id="login">
		<?php
		include "../Conexao.inc";
		@session_start ();
		@$nome_usuario = $_SESSION ["nome_usuario"];
		if (empty ( $nome_usuario )) {
			
			?>
		<a class="botao" href="login.php">LOGIN</a><br>
		<?php }else{?>
		<a class="botao" href="administrador.php">ADMINISTRAÇÃO</a><br>
		<?php }?>
		</div>
		
		<?php include "menu.php"; ?>
	</div>
</body>
</html>