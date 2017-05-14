<?php include "valida_sessao.inc"; ?>
<?php include "valida_permissao_mensagens.inc"; ?>
<html>
<head>
<title>Solicitação</title>
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
<link rel="stylesheet" type="text/css" href="../Recursos/tabelas/css/component.css" />

<!-- Estilo -->
<style>
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
	<!--Parte responsavel pelo funcionamento dos menus -->
	<br><br><br>
	<header>
				<h1>Gestão de Mensagens</h1>
				
				
			</header>
	<!-- parte do corpo do menu do administrador contendo calendarios , e outras coisas -->
	<div id="corpo">
		<div>


	 <label id="mensagens"><a href="gestaodemensagens.php"><font
					color="white"><img src="../Recursos/Imagens/mensagemhome.png" width="15"
						height="15">Principal</font></a></label>
						&nbsp;
						<label id="mensagens"><a href="solicitacoes.php"><font
					color="white"><img src="../Recursos/Imagens/mensagemhome.png" width="15"
						height="15">Solicitações</font></a></label>
						&nbsp;
						
						<label
				id="mensagens"><a href="lixeira.php"><img src="../Recursos/Imagens/excluir.png"
					width="15" height="15"><font color="white">Lixeira</font></a></label>
	<br><br>
		
			<table border="1"
				style="box-shadow: 0 0 5px; border-radius: 4px; border: 1px solid black; border-collapse: collapse;">
				<thead>
					<tr>
						<th><b>NI</b></th>
						<th><b>Nome</b></th>
						<th><b>Email</b></th>

						<th><b>Assunto</b></th>
						<th><b>Ações</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
					</tr>
				</thead>
				<tr>
	
			<?php
			//aqui s�o mostradas as mensagens que estão cadastradas
			include "../Conexao.inc";
			$resultado = mysqli_query ( $conexao, "SELECT * FROM Solicitacao" );
			if ($resultado === FALSE) {
				die ( mysql_error () );
			}
			@$numero = mysqli_num_rows ( $resultado );
			if ($numero == 0) {
			echo '<tr><td colspan="6" align="center">' . "Nenhuma Solicitação Enviada.</td></tr>";
			}
			while ( $row = mysqli_fetch_array ( $resultado ) ) {
				$id = $row ["id"];
				
				echo "<form action='solicitacaocompleta.php?id=$row[id]' method='GET'>";
				echo "<input type='hidden' name='id' value='$id'>";
				echo "<td> ";
				if($row['novo']=='1'){
					echo '<b>';
				    echo $row ["ni"];
				    echo "</b>";
				 }
				 else {
				 	echo $row["ni"];
				 }
				echo "</td>";
				echo "<td>" ;
			if($row['novo']=='1'){
					echo '<b>';
				    echo $row ["nome"];
				    echo "</b>";
				 }
				 else {
				 	echo $row["nome"];
				 }
				 echo "</td>";
				 echo "<td>" ;
				 if($row['novo']=='1'){
				 	echo '<b>';
				 	echo $row ["email"];
				 	echo "</b>";
				 }
				 else {
				 	echo $row["email"];
				 }
				 echo "</td>";
				echo "<td>";
				if($row['novo']=='1'){
					echo '<b>';
					echo $row ["assunto"];
					echo "</b>";
				}
				else {
					echo $row["assunto"];
				}
				echo "</td>";
				echo "<td><input type='submit' value='Ver' style='width:40px;'>&nbsp;&nbsp;<a href='excluisolicitacao.php?id=$row[id]'><img src='../Recursos/Imagens/delecao.png'></a></td>";
				
				echo "</form>";
				echo "</tr>";
			}
			
			mysqli_close ( $conexao );
			
			?>
			
			
			
			
			</table>



		</div>
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
		<br>
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