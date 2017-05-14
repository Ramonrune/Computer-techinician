<html>
<head>
<title>Home</title>
<!--Index do html
Projeto Intranet Senai
Data: 26/02/2014
-->
<meta charset="UTF-8">
<link rel="icon" href="Recursos/Imagens/icon.png">
<link rel="stylesheet" type="text/css" href="Layout/estilo.css">
<script src="Recursos/jquery/jquerymenu.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<style>
#selecione {
	width: 102px;
	height: 30px;
}

#selecione:hover {
	background: #133783;
	color: white;
}
</style>
</head>
<body>

	<!--Esta é a parte do cabeçalho do código -->
	<?php
	include "cabecalho.php";
	?>
	
	
	<!--Parte responsavel pelo funcionamento dos menus -->




	<div id="corpo">
		<br>
		<br> <img src="Recursos/Imagens/seta.png"><font size="2">Você está
			aqui : <a href="index.php" class="cor">INTRANET SENAI</a>
		</font> <br> <br>
		<!-- Slider das Imagens -->
	<?php
	include "slider.php";
	
	?>
	<!-- Ramal e os links -->
		<br>
		<br>
		<br>
		<br>
		<div id="ramalelink">
			<div id="tituloramal">Ramal e Links</div>
			<br> &nbsp;&nbsp;&nbsp;Ramal :
			<!--Aqui são colocados todos os ramais em um select com o nome da pessoa , o ramal
	e o setor  -->
			<select>
				<option value="Selecione aqui o Ramal Desejado">Selecione aqui o
					Ramal Desejado</option>
		
		<?php
		
		include "Conexao.inc";
		$resultado = mysqli_query ( $conexao, "SELECT * FROM funcionario" );
		if ($resultado === FALSE) {
			die ( mysql_error () );
		}
		
		while ( $row = mysqli_fetch_array ( $resultado ) ) {
			
			echo $row ["nome"];
			echo $row ["Ramal"];
			echo $row ["setor"];
			
			?>
		<option
					value="<?= $row["nome"];?>/ <?= $row["Ramal"];?> / <?= $row["setor"];?>"><?= $row["nome"];?>/ <?= $row["Ramal"];?> / <?= $row["setor"];?></option>
		
		
		<?php
		}
		
		mysqli_close ( $conexao );
		
		?>
		
		
	</select> <br>
			<br>

			<hr>
			<br>
			<!--Aqui é chamado um frame com todos os links colocados pelo administrador  -->
			&nbsp;&nbsp;&nbsp;Links: <br> &nbsp;&nbsp;
			<iframe src="linkseramal.php" frameborder="0" height="200"></iframe>
		</div>
		<!-- aqui é mostrado o aniversário dos funcionários -->
		<div id="aniversario">

			<div id="tituloaniversario">
				<img src="Recursos/Imagens/presente.png" width="20" height="20">
				Aniversariantes<br>
	
	
	Aniversariantes de <?php  echo $data = date("d/m");  ?>
	</div>
			<hr>
			<br> <br>
			<!-- Se os primeiros 2 digitos da data atual forem iguais 
	aos dois primeiros digitos da data do aniversáriante 
	uma imagem , seu nome e seu ramal serão exibidos-->
			<iframe src="aniversariantes.php" frameborder="0" height="300"
				width="350"></iframe>


		</div>
		<!-- Aqui é a área de noticia do site que irá mostrar 6 noticias -->
		<div id="noticia">
			<div id="titulonoticia">Noticias</div>

			<form method="POST">
				Selecione o Mes : &nbsp;&nbsp; <select name="mes" id="selecione">
					<option value="01">Janeiro</option>
					<option value="02">Fevereiro</option>
					<option value="03">Março</option>
					<option value="04">Abril</option>
					<option value="05">Maio</option>
					<option value="06">Junho</option>
					<option value="07">Julho</option>
					<option value="08">Agosto</option>
					<option value="09">Setembro</option>
					<option value="10">Outubro</option>
					<option value="11">Novembro</option>
					<option value="12">Dezembro</option>
				</select> &nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Selecione o Ano :
				&nbsp;&nbsp; <select name="ano" id="selecione">
					<option value="2015">2015</option>
					<option value="2016">2016</option>
					<option value="2017">2017</option>
				</select> &nbsp;&nbsp;&nbsp;&nbsp;
				<button
					style="cursor: pointer; padding: 1px 10px 0; height: 25px; cursor: pointer; white-space: nowrap;"
					type="submit" name="mostrar">Mostrar</button>
			</form>
			<table>
				<tr>
	 <?php
		if (isset ( $_POST ["mostrar"] )) {
			include "Conexao.inc";
			
			$mes = $_POST ["mes"];
			$ano = $_POST ["ano"];
			$result = mysqli_query ( $conexao, "SELECT * FROM Noticia WHERE (MONTH(Data_post)=$mes) and (YEAR(Data_post)=$ano) ORDER BY Id DESC LIMIT 6 " );
			$cont = 0;
			while ( $row = mysqli_fetch_array ( $result ) ) {
				
				if ($row ["Id"]) {
					$cont += 1;
				}
				
				echo "<td style='width:100px;'><br><br><br>";
				if ($cont == 2 or $cont == 4 or $cont == 6) {
					echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
				}
				echo "&nbsp;&nbsp;&nbsp;<a href='noticiacompleta.php?id=$row[Id]' style='width:275;height:17x;'><img src='Recursos/noticias/$row[Imagem]' width='275' height='175' id='img2'></a>";
				echo "<br><br><br></td>";
				echo "<td valign='top' style='position:absolute;width:0px;'>";
				
				echo "&nbsp;&nbsp;&nbsp;<div style='position:relative;top:215px;width:300px;height:200px;right:280px;'><h4><a href='noticiacompleta.php?id=$row[Id]' style='color:black;'>" . substr ( $row ["Titulo"], 0, 32 ) . "...</a></h4>";
				echo "<a href='noticiacompleta.php?id=$row[Id]' style='color:black;'>";
				echo substr ( $row ["Descricao"], 0, 100 ) . "</a>...</div><br>";
				
				echo "</td>";
				if ($cont == 2 or $cont == 4 or $cont == 6) {
					echo "</tr>";
				}
			}
		} 

		else {
			include "Conexao.inc";
			$result11 = mysqli_query ( $conexao, "SELECT * FROM Noticia ORDER BY Id DESC LIMIT 6 " );
			$cont = 0;
			while ( $row = mysqli_fetch_array ( $result11 ) ) {
				
				if ($row ["Id"]) {
					$cont += 1;
				}
				
				echo "<td style='width:100px;'><br><br><br>";
				if ($cont == 2 or $cont == 4 or $cont == 6) {
					echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
				}
				echo "&nbsp;&nbsp;&nbsp;<a href='noticiacompleta.php?id=$row[Id]' style='width:275;height:175;'><img src='Recursos/noticias/$row[Imagem]' width='275' height='175' id='img2'></a>";
				echo "<br><br><br></td>";
				echo "<td valign='top' style='position:absolute;width:0px;'>";
				
				echo "&nbsp;&nbsp;&nbsp;<div style='position:relative;top:215px;width:300px;height:200px;right:280px;'><h4><a href='noticiacompleta.php?id=$row[Id]' style='color:black;'>" . substr ( $row ["Titulo"], 0, 32 ) . "...</a></h4>";
				echo "<a href='noticiacompleta.php?id=$row[Id]' style='color:black;'>";
				echo substr ( $row ["Descricao"], 0, 100 ) . "</a>...</div><br>";
				
				echo "</td>";
				if ($cont == 2 or $cont == 4 or $cont == 6) {
					echo "</tr>";
				}
			}
		}
		
		?>
	
			
			</table>
			<!-- o mostrar mais noticias redireciona o usuário para uma página com todas as noticias
	postadas no site -->
			<div style="position: absolute; left: 75%; top: 95%;">
				<a href="noticias.php"><button
						style="cursor: pointer; display: block; padding: 1px 10px 0; height: 32px; cursor: pointer; white-space: nowrap;">Mostrar
						mais Notícias</button></a>
			</div>

		</div>
		<!--Aqui é a parte responsavel pelas imagens de rápido acesso do site  -->
		<div
			style="position: relative; left: 12%; margin-left: 60%; top: -125%;">
			<a href="integracao.php"><img
				src="Recursos/Imagensatalho/integracao.png" width="150" height="150"
				style="border: 1px solid #efefef;"></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<a href="formulariossenai.php"
				style="position: relative; left: 4%; top: 400%;"><img
				src="Recursos/Imagensatalho/formularios.png" width="150"
				height="150" style="border: 1px solid #efefef;"></a> <br>
			<br> <a href="galeria.php"><img
				src="Recursos/Imagensatalho/galeria.png" width="150" height="150"
				style="border: 1px solid #efefef;"></a>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href="inovacao.php"
				style="position: relative; left: 4%; top: 400%;"><img
				src="Recursos/Imagensatalho/inovacao1.jpg" width="150" height="150"
				style="border: 1px solid #efefef;"></a> <br>
			<br> <a href="contato.php"><img
				src="Recursos/Imagensatalho/contato.jpg" width="350" height="120"
				style="border: 1px solid #efefef;"></a>
		</div>


		<!--Rodapé  -->

	</div>

	<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
	<br><br><br><br>
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