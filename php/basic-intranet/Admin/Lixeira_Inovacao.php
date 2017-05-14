<?php include "valida_sessao.inc"; ?>
<?php include "valida_permissao_inovacao.inc"; ?>
<html>
<head>
<title>Lixeira Inovação</title>
<!--Index do html
Projeto Intranet Senai
Data: 26/02/2014
-->
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="UTF-8">
<link rel="icon" href="../Recursos/Imagens/icon.png">
<link rel="stylesheet" type="text/css" href="admin.css">
<link rel="stylesheet" type="text/css" href="styleadmin.css">
<script src="../Recursos/jquery/jquerymenu.js"></script>
<script src="../Recursos/editor/ckeditor.js"></script>
<link rel="stylesheet" type="text/css" href="../Recursos/tabelas/css/component.css" />
<!-- Estilo -->
<style>
#progress_bar {
	margin: 10px 0;
	padding: 3px;
	border: 1px solid #000;
	font-size: 14px;
	clear: both;
	opacity: 0;
	-moz-transition: opacity 1s linear;
	-o-transition: opacity 1s linear;
	-webkit-transition: opacity 1s linear;
}

#progress_bar.loading {
	opacity: 1.0;
}

#progress_bar .percent {
	background-color: #99ccff;
	height: auto;
	width: 0;
}

.thumb {
	height: 75px;
	border: 1px solid #000;
	margin: 10px 5px 0 0;
}

#input {
	width: 170px;
}

header h1 {
	float: left;
	position: relative;
	top: 20%;
	margin: -4%;
	left: 3%;
	font-size: 100%;
	padding: 0.5%;
	color: white;
}

header nav ul li {
	height: 40px;
	display: inline-block;
}

header nav ul li a:hover {
	color: #373948;
}

header nav ul li a.active {
	height: 33px;
	border-bottom: none;
}

header nav ul li a.link-1 {
	background-color: red;
}

header nav ul li a.link-2 {
	background-color: red;
}

header nav ul li a.link-3 {
	background-color: red;
}

header nav ul li a.link-4 {
	background-color: red;
}

section#home {
	background-color: #ccc;
	margin-top: 20px;
}

section#about {
	background-color: #ccc;
}

section#clients {
	background-color: #ccc;
}

section#contact-us {
	background-color: #ccc;
}

section h2 {
	color: black;
	font-family: 'Open Sans', sans-serif;
	font-weight: 300;
	font-size: 3em;
	margin: 0px;
}

section p {
	color: white;
	font-family: 'Open Sans', sans-serif;
	font-weight: 300;
	font-size: 1em;
}
</style>

</head>
<body>
	<!--Esta é a parte do cabeçalho do código -->
	<?php
	include "cabecalho1.php";
	?>
	<br><br><br>
	<header>
				<h1>Gestão de Inovação</h1>
				
				
			</header>

	<!-- parte do corpo do menu do administrador contendo calendarios , e outras coisas -->
	<div id="corpo">
		<div>


			
			<br> <br>

			<!-- Aqui é mostrado as notícias que estão cadastradas -->
			<table border='1'
				style="box-shadow: 0 0 5px; border-radius: 4px; border: 1px solid black; border-collapse: collapse;"
				width="100%">
				<thead>
					<tr>
						<th><b>Titulo</b></th>
						<th><b>Postado Em</b></th>
						<th><b>Imagem</b></th>
						<th><b>Responsavel</b></th>
						<th><b>Autor</b></th>
						<th><b>Excluido Por</b></th>
						<th><b>Data De Exclusão</b></th>

					</tr>
				</thead>
				<tr>
 	<?php
		
		include "../Conexao.inc";
		@$resultado = mysqli_query ( $conexao, "SELECT * FROM LixeiraInovacao,Usuario WHERE LixeiraInovacao.autor = Usuario.NI" );

		
		if ($resultado === FALSE) {
			die ( mysql_error () );
		}
		@$numero = mysqli_num_rows ( $resultado );
		if ($numero == 0) {
			echo '<tr><td colspan="6" align="center">' . "Nenhuma Notícia de Inovação.</td></tr>";
		}
		$dataatual= date("Y-m-d");
		while ( $row = mysqli_fetch_array ( $resultado ) ) {
			
			echo "<td><div style='width:200px;word-wrap: break-word;'>" . $row ["titulo"] . "</div></td>";
			echo "<td>" . date ( "d/m/Y", strtotime ( $row ['data_destaque'] ) ) . "</td>";
			echo "<td>" . "<img src='../Recursos/Destaque/$row[imagem]' width='50' height='50'>" . "</td>";
			echo "<td>";
			if($row["NI"]==$row["autor"]){
				echo $row["Nome"];
			}
			echo "</td>";
			echo "<td>".$row["autorvdd"]."</td>";
			echo "<td>" . $row ["autor_exclusao"] . "</td>";
			echo "<td>" . date ( "d/m/Y", strtotime ( $row ["data_final"] ) ). "</td>";
			if($row["data_final"]==$dataatual){
				$r = mysqli_query ( $conexao, "DELETE FROM LixeiraInovacao WHERE id=$row[id]" );
			}
			echo "</tr>";
		}
		
		mysqli_close ( $conexao );
		
		?>
  
			
			
			
			
			
			
			
			</table>
			<a class="botao" href="gestaodeinovacao.php">Inovação</a>



		</div>
		<br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br>
		<br>
		<br>
		<br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br>
		<br>
		<br>
		
	</div>

	
	<?php
	include "menuadm.php";
	?>
     
	<br> <br> <br> <br> <br> <br><br> <br> <br> <br><br> <br> <br> <br>
     <div id="rodape1" align="center">
			<address>©2015 - 2015 CFP 5.14 - Todos os direitos reservados</address>

		</div>
	
	</body>
</html>
