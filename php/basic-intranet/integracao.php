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

</head>
	<body>
	<!--Esta é a parte do cabeçalho do código -->
		<?php 
	include "cabecalho.php";
	?>
	
	
	<!--Parte responsavel pelo funcionamento dos menus -->

	<br><br>
	<div style="position: relative;
	top: 10%;
	margin: 0 auto;
	min-width: 1000px;
	max-width: 1000px;">
	<br>
	<img src="Recursos/Imagens/seta.png"><font size="2">Você está aqui : <a href="index.php" class="cor">INTRANET SENAI</a>> <a href="integracao.php" class="cor">INTEGRAÇÃO</a></font>
	
	<br><br><br>
	<font size="4">Olá, Seja Bem vindo a intranet do CFP 5.14, abaixo estará algumas informações para 
	melhor integração no <br>ambiente do trabalho.</font>
	
	<br>
	<br>
	<br>
	Leia Nosso <a target="_blank" href="http://qualidade.sesisenaisp.org.br/Pages/File.aspx?f=8VP0Qu0aMki2HpFiZqTRfg">Código de Ética</a><br>
	Leia Nossa <a target="_blank" href="http://qualidade.sesisenaisp.org.br/Pages/File.aspx?f=FF6ZrCMgQUGV6ipfH7vDTg">Politica de Segurança da Informação</a>
	<br><br><br><br>

	<table style="background:#efefef;border-top:20px solid rgb(44,62,80);border-bottom:20px solid rgb(44,62,80);">
	<?php 
 	
 	include "Conexao.inc";
 	$resultado = mysqli_query($conexao, "SELECT * FROM Integracao");
	
		$cont=0;
		while($row = mysqli_fetch_array($resultado)){
		if($row["id"]){
			$cont+=1;
		}
		echo "<td><br><a class='botao1' href='Recursos/Integracao/$row[nome].$row[extensao]'><font color='white'>".$row['nome']."</font></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
		echo "<br><br><br></td>";
		if($cont==3 or $cont==6 or $cont==9 or $cont==12 or $cont==15 or $cont==18 or $cont==21 or $cont==24 or $cont==27 or $cont==30 or $cont==33 or $cont==36 or $cont==39 or $cont==42 or $cont==45 or $cont==48){
		echo "<tr>";
	}
		}
	



mysqli_close($conexao);
 
 
 ?>
 </table>

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
	
	<!--Parte responsavel pelo rodapé do site -->
	
	</body>
</html>