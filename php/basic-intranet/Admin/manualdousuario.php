<?php include "valida_sessao.inc"; ?>
<html>
<head>
<title>Manual do Usuário</title>
<!--Index do html
Projeto Intranet Senai
Data: 26/02/2014
-->
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="UTF-8">
<link rel="icon" href="../Recursos/Imagens/icon.png">
<link rel="stylesheet" type="text/css" href="admin.css">
<link rel="stylesheet" type="text/css" href="styleadmin.css">
<script src="jquery/jquerymenu.js"></script>



<!-- Declaração dos estilos -->
<style>
#input {
	width: 170px;
}

#head {
	padding: 60px 0 40px 60px;
	position: relative;
	width: 100%;
	-moz-transition: all 0.5s ease;
	-webkit-transition: all 0.5s ease;
	-o-transition: all 0.5s ease;
	transition: all 0.5s ease;
	background: #33363f;
	height: 50px;
}

#head1 {
	font-size: 100%;
	color: white;
}
</style>


<body>
	<!--Esta é a parte do cabeçalho do código -->
	<?php
	include "cabecalho1.php";
	?>
	<!--Parte responsavel pelo funcionamento dos menus -->
	
	<div id="head">
		<h1 id="head1">
			<br>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;INTRANET
			SENAI ALVARES ROMI CFP 5.14
		</h1>
	</div>
	<!-- parte do corpo do menu do administrador contendo calendarios , e outras coisas -->

	<div id="corpo">
		<div>

			<iframe src="../Recursos/Integracao/Manual do Usuário Intranet CFP 5.14.pdf" frameborder="0" width="100%" height="100%"></iframe>

		</div>
	</div>

	
	<?php
	include "menuadm.php";
	?>
     
<br>
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
	<br>
	<br>
	<br>
	<br>
	<!--Parte responsavel pelo rodape do site -->
	<div id="rodape1" align="center">
		<address>©2015 - 2015 CFP 5.14 - Todos os direitos reservados</address>

	</div>


</body>
</html>