<html>
<head>
<title>Integração</title>
<!--Index do html
Projeto Intranet Senai
Data: 26/02/2014
-->
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="UTF-8">
<link rel="icon" href="Recursos/Imagens/icon.png">
<link rel ="stylesheet" type="text/css" href="Layout/estilo.css">
<script src="Recursos/jquery/jquerymenu.js"></script>
<style> 
#a{
   
    color:white;
    background:black;
    position: relative;

    -webkit-animation-name: example; /* Chrome, Safari, Opera */
    -webkit-animation-duration: 9s; /* Chrome, Safari, Opera */
    animation-name: example;
    animation-duration: 9s;
    text-align:center
}

/* Chrome, Safari, Opera */
@-webkit-keyframes example {
    0%   {background-color:black;color:white; left:0px; top:0px;}
    50%  {background-color:black; left:0px; top:600px;}
    100% {background-color:black; left:0px; top:0px;}
}

</style>
</head>
	<body>
	<!--Esta é a parte do cabeçalho do código -->
		<?php 
	include "cabecalho.php";
	?>
	<br><br><br><br><br><br>
	
	
	<div style="width: 100%;
    height: 90%;
    background-color: black;">
    <br>
    
    <div id="a">
    <h2>Créditos </h2><br>
     Documentador :João Pedro Giatti<br>
   	Documentador :Julia Carolina Maia da Silva<br>
    Banco de Dados :Natanael Maciel Pereira <br>
    Programador :Ramon Lacava Gutierrez Gonçales
    <br>
    
    <br>
    Professor : Leandro de Andrade <br>
    Unidade Curricular : Programação Para a Web
    </div>
	
	</div>
	
	<div id="rodape" align="center" style="position:relative;top:-5%">
	<address>
	Rua Vereador Sergio Leopoldino Alves, 500 - Cidade Industrial<br>
	CEP: 13456-166 - Santa Bárbara d'Oeste - SP<br>
	Telefone: (19) 3499-1450 - senaisantabarbara@sp.senai.br
	<br>
	
	©2015 - 2015 CFP 5.14 - Todos os direitos reservados
	</address>
	
	</div>
	
	<!--Parte responsavel pelo rodapé do site -->
	
	</body>
</html>