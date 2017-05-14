<html>
<head>

<!-- Calendario visto pelos administradores na pÃ¡gina com cor vermelha -->
<link rel="stylesheet" type="text/css" href="admin.css">
<link rel="icon" href="../Recursos/Imagens/icon.png">
<meta charset="UTF-8">
</head>
<body>
	<div id="ca">
		<div align="right" id="escola">
			<font color="white"> <!-- Aqui é mostrada a área de logout para o usuário poder sair -->
				<b>Escola SENAI "Alvares Romi" - Santa Barbara d' Oeste </b>
			</font>
		</div>
		<br>
		<br>
		<div id="pos" style='position: relative; top: -37%;'>
			&nbsp; <a href="../index.php"><img src="../Recursos/Imagens/logo.png" width='200'></a><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<font color="white"> <b>INTRANET CFP 5.14</b></font>
		</div>
		<div align="right" id="login">
			<br> <a class="botao" href="logout.php">LOGOUT</a><br>

		</div>
		<div style="position: absolute; top: 55%; left: 20%;">
		<?php include "menu.php"; ?>
		</div>
	</div>
</body>
</html>