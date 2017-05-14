<html>
<head>
<title>
Inovação
</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Recursos/inovacao/inovacao.css" type="text/css" media="screen" />
    <link rel="icon" href="Recursos/Imagens/icon.png">
<meta charset="UTF-8">
<link rel ="stylesheet" type="text/css" href="Layout/estilo.css">
<script src="Recursos/jquery/jquerymenu.js"></script>
</head>
<body>   
<!--Esta é a parte do cabeçalho do código -->
	<?php 
	include "cabecalho.php";
	?>
	
	
	<!--Parte responsavel pelo funcionamento dos menus -->
	
	<br><br><br><br>
	<div style="position: relative;
	top: 10%;
	margin: 0 auto;
	min-width: 1000px;
	max-width: 1000px;">

      <div id="noticiaspadrao1">
       <div id="titulo1"><b>Notícias de Inovação</b></div> 
     	<br><br>
     	<div style="padding: 0 0 0 20px;width:950px;word-wrap: break-word;">
      <?php 
      include "Conexao.inc";
      if(!isset($_GET["id"]) or !is_numeric($_GET["id"])){
      	echo "Nenhuma Notícia Encontrada";
      }
      if(isset($_GET["id"]) and is_numeric($_GET["id"])){
      $id = $_GET["id"];
      $result = mysqli_query($conexao, "SELECT * FROM destaque WHERE Id = $id");
      while($row = mysqli_fetch_array($result)){
      	echo "<img src='Recursos/Destaque/$row[imagem]' width='900' height='450' id='img2'><br><br>";
      	
      	echo "<p align='justify'><h4>".$row["titulo"]."</h4>";
      	echo "<br><br>";
      	echo $row['descricao'].'<br><br>';
      	 $result1 = mysqli_query($conexao, "SELECT * FROM Usuario WHERE NI =".$row["autor"] );
	$row1 = mysqli_fetch_array($result1);
	echo "<br><br><br><br>Autor da Notícia : ".$row["autorvdd"]."&nbsp;&nbsp;&nbsp;Data : ".date("d/m/Y",strtotime($row["data_destaque"]))."<br><br><br><br></p>";
          				
      }
      }
      ?>
      
      </div>
      </div>


    
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
	
	
    <script type="text/javascript" src="Recursos/inovacao/select.js"></script>
    <script type="text/javascript" src="Recursos/inovacao/funcoes.js"></script>
   
</body>
</html>
