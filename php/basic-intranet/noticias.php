<html>
<head>
<title>Notícias</title>
<!--Index do html
Projeto Intranet Senai
Data: 26/02/2014
-->
<meta charset="UTF-8">
<link rel="icon" href="Recursos/Imagens/icon.png">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel ="stylesheet" type="text/css" href="Layout/estilo.css">
<script src="Recursos/jquery/jquerymenu.js"></script>
<script src="Recursos/Paginacao/jquery.js"> </script>
<script src="Recursos/Paginacao/javascript.js"> </script>
<script type="text/javascript" src="//use.typekit.net/vue1oix.js"></script>
<script type="text/javascript">try{Typekit.load();}catch(e){}</script>
<script>

$(document).ready(function() {

	$('#content').scrollPagination({

		nop     : 10, //numero de postagens carregadas
		offset  : 0, // offset inicial
		error   : 'Não há mais Notícias !', // mensagem escrita quando não há mais noticias
		                            // delay de carregamento
		delay   : 500, 
		scroll  : true //scroll verdadeiro para ser capturado
		
	});
	
});

</script>

</head>
	<body>
	
	<!--Esta é a parte do cabeçalho do código -->
	<?php 
	include "cabecalho.php";
	?>
	
	

	<!-- Aqui está o corpo da página que possuirá todas as noticias do site -->
	
	<div style="position: relative;
	top: 10%;
	margin: 0 auto;
	min-width: 1000px;
	max-width: 1000px;">
	<br><br>
	<img src="Recursos/Imagens/seta.png"><font size="2">Você está aqui : <a href="index.php" class="cor">INTRANET SENAI</a></font>
	<br>
	<br>

<div style="background:rgb(44,62,80);color:white;width:1000px;height:40px;text-align:center;font-weight:bold;font-size:22px;">
Noticias</div>
<div id="content">
	
	

</div>
	
	
	
	<br><br><br><br><br><br><br><br><br><br><br>

	
	</div>
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