<html>
<head>
<title>Formulários</title>
<!--Index do html
Projeto Intranet Senai
Data: 26/02/2014
-->
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="UTF-8">
<link rel="icon" href="Recursos/Imagens/icon.png">
<link rel ="stylesheet" type="text/css" href="Layout/estilo.css">
<script src="Recursos/jquery/jquerymenu.js"></script>
<link rel="stylesheet" type="text/css" href="Recursos/tabelas/css/formularios.css" />
		<link rel="stylesheet" type="text/css" href="Recursos/procuraform/css/component.css" />
		<script src="Recursos/procuraform/js/modernizr.custom.js"></script>
		<script src="Recursos/procuraform/js/classie.js"></script>
		
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
	<img src="Recursos/Imagens/seta.png"><font size="2">Você está aqui : <a href="index.php" class="cor">INTRANET SENAI</a>> <a href="formulariossenai.php" class="cor">FORMULARIOS</a></font>
		<div id="sb-search" class="sb-search">
						<form method="POST">
							<input class="sb-search-input" placeholder="Digite o Formulário que você Busca..." type="text" name="search" id="search">
							<input class="sb-search-submit" type="submit" value="" name="buscar">
							<span class="sb-icon-search"></span>
						</form>
					</div>
	<br>
	<br>

	<font size="4">Seja Bem-Vindo a Área de Formularios . Aqui Você encontra os Formulários Necessários para Cada Atividade Solicitada.</font>
	<br>
	<br>
	
	<div id="formularios">
	
	<table>
	
	<thead>
	<tr>
		<th>
		<font color="white"><font size="4"><b>NOME DO FORMULÁRIO</b></font></font>
		</th>
		<th>
		<font color="white">
		<?php 
		for ($i=0;$i<=110;$i++){
			echo "&nbsp;";
		}
		?>
		<font size="4"><b>REFERÊNCIA</b></font></font>
		</th>
	</tr>
	</thead>
	</table>
	</div>
	<br>
	
	<div id="formularios1">
	<table>
	<tr>
		<?php 
		//aqui é feito o sistema de procura dos formulários 
		include "Conexao.inc";
		if(isset($_POST["buscar"])){
		include "Conexao.inc";
		$search = $_POST["search"];
		$resultado = mysqli_query($conexao, "SELECT * FROM formularios WHERE nome like '%$search%' ORDER BY  nome ASC");
		if($resultado === FALSE){
			die(mysql_error());
		
		}
		
		while($row = mysqli_fetch_array($resultado)){
			
			echo "<td style='width:77%;'>"."<a href='Recursos/formularios/$row[nome].$row[extensao]'><font color='blue'><font size='4'><b>".$row["nome"]."</b></font></font></a></td>";
			
		
		echo "<td>"."<a href='Recursos/formularios/$row[nome].$row[extensao]'><font color='blue'><font size='4'><b>".$row["referencia"]."</b></font></font></a></td>";
		
		echo "</tr>";
		}
		
		
		
		}
		else{
			$resul = mysqli_query($conexao, "SELECT * FROM formularios ORDER BY  nome ASC");
			if($resul === FALSE){
				die(mysql_error());
			
			}
			
			while($row = mysqli_fetch_array($resul)){
					
				echo "<td style='width:77%;'>"."<a href='Recursos/formularios/$row[nome].$row[extensao]'><font color='blue'><font size='4'><b>".$row["nome"]."</b></font></font></a></td>";
					
			
				echo "<td>"."<a href='Recursos/formularios/$row[nome].$row[extensao]'><font color='blue'><font size='4'><b>".$row["referencia"]."</b></font></font></a></td>";
			
				echo "</tr>";
			}
			
		}
		
		mysqli_close($conexao);
		?>
	
	</table>
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
	<script src="Recursos/procuraform/js/uisearch.js"></script>
		<script>
			new UISearch( document.getElementById( 'sb-search' ) );
		</script>
	</body>
</html>