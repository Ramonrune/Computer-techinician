<?php include "valida_sessao.inc"; ?>
<html>
<head>
<title>Administração</title>
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

<link rel="stylesheet" type="text/css"
	href="../Recursos/tabelas/css/formularios.css" />
<script src="../Recursos/grafico/Chart.min.js"></script>


<!-- DeclaraÃ§Ã£o dos estilos -->
<style>
#input {
	width: 170px;
}

#head {
		padding:60px 0 40px 60px;
	position:relative;
	width:100%;
	background:rgb(174,0,1);
	background-image: -moz-linear-gradient( 135deg, rgb(79,0,0), rgb(174,0,0) );
			background-image: -webkit-linear-gradient( 135deg,rgb(12,0,0), rgb(174,0,0) );
					background-image: -o-linear-gradient( 135deg, rgb(12,0,0), rgb(174,0,0) );
							background-image: -ms-linear-gradient( 135deg,rgb(12,0,0), rgb(174,0,0)  );
								background-image: linear-gradient( 135deg,rgb(12,0,0), rgb(174,0,0)   );
	height:50px;
}

#head1 {
	font-size: 100%;
	color: white;
}
</style>


<body>
	<!--Esta Ã© a parte do cabeÃ§alho do cÃ³digo -->
	
	<?php
	include "cabecalho1.php";
	?>
	<!--Parte responsavel pelo funcionamento dos menus -->
	<br> <br> <br>
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
			
					<!-- Aqui foi incluido um calendario para o usuario administrador -->
	
			<br> <br>
			
		
	<?php
	include "../Conexao.inc";
	//aqui Ã© pego o nome do usuÃ¡rio que logou atravÃ©s da sessÃ£o
	@session_start ();
	$nome_usuario = $_SESSION ["nome_usuario"];
	$resultado = mysqli_query ( $conexao, "SELECT * FROM Usuario WHERE NI=$nome_usuario" );
	
	@$query = mysqli_query ( $conexao, $resultado );
	
	while ( $row = mysqli_fetch_array ( $resultado ) ) {
		
		?>
	<div style="width:59%;vertical-align:top;  border-bottom: #23262d solid 1px;
  background: rgb(56,59,68);color:white;">
	<img src="../Recursos/Usuario/<?=$row["foto"]?>" width="55" height="55" style=" 
  border-radius: 50%;
  -o-border-radius: 50%;
  -webkit-border-radius: 50%;
  padding:5px;
  border:1px solid white;">
  
  Seja Bem-Vindo <?=$row["Nome"]; ?>.
	
	<?php
	}
	
	mysqli_close ( $conexao );
	?>
	<br>Selecione no menu ao lado o que deseja administrar.
				
			</div>
	<div style="position:absolute;left:70%;top:4.5%;">
			<?php
	include "index.html";
	
	?>

	</div>
	<br>
	<div id="recados">

				<table border="1"
					style="border: 1px solid black; box-shadow: 0 0 5px; border-radius: 4px; border-collapse: collapse; border-bottom: 20px solid #33363f;">
					<thead>
						<tr>
							<th colspan="3"
								style="text-align: center; -moz-transition: all 0.5s ease;background:#33363f;">Mensagens</th>
						</tr>
					</thead>
					<thead>
						<tr>
							<th style="-moz-transition: all 0.5s ease;background:#33363f;">Mensagem:</th>
							<th style="-moz-transition: all 0.5s ease;background:#33363f;">Data:</th>
							<th style="-moz-transition: all 0.5s ease;background:#33363f;">Ação</th>
						</tr>
					</thead>
					<tr>

	<?php
	include "../Conexao.inc";
	//aqui Ã© feito o sistema de mensagens
	//Ã© pego aqui as mensagens com o destino para o usuÃ¡rio ou com o destino para todos os usuÃ¡rios
	@session_start ();
	$nome_usuario = $_SESSION ["nome_usuario"];
	$resultado = mysqli_query ( $conexao, "SELECT * FROM recado WHERE (destino='$nome_usuario') OR (destino='Todos') ORDER BY id DESC LIMIT 3 " );
	$resultado1 = mysqli_query ( $conexao, "SELECT * FROM recado WHERE (destino='$nome_usuario') OR (destino='Todos') ORDER BY id DESC LIMIT 3" );
	while ( $row = mysqli_fetch_array ( $resultado1 ) ) {
		@$autor = $row ["remetente"];
	}

	
	@$query = mysqli_query ( $conexao, $resultado );
	//esse form exclui o usuÃ¡rio
	while ( $row = mysqli_fetch_array ( $resultado ) ) {
		echo "<form action='' method='post'>";
		echo "<td>";
		@$resultado2 = mysqli_query ( $conexao, "SELECT * FROM Usuario where NI =".$row["remetente"]);
		while ( @$row1 = mysqli_fetch_array ( $resultado2 ) ) {
			@$autor1 = $row1 ["Nome"];
		}
		echo "<div style='width:317px;word-wrap: break-word;' >" . @$row ["recado"] . "<br>Remetente  : " . @$autor1 . "</div>";
		echo "</td>";
		echo "<td>";
		echo @date ( "d/m/Y", strtotime ( @$row ["data"] ) );
		echo "</td>";
		echo "<td>";
		echo "&nbsp;&nbsp;<input type='image' src='../Recursos/Imagens/delecao.png' width='16' height='16' name='excluirecado' value='$row[id]'>";
		echo "</td>";
		echo "</form></tr>";
	}
	
	
	mysqli_close ( $conexao );
	?>
	
			<?php 
			if(isset($_POST["excluirecado"])){
				// aqui Ã© pego a id do recado e apÃ³s isso a id Ã© deletada do banco de dados
				include "../Conexao.inc";
				$id = $_POST["excluirecado"];
				
					$resultado = mysqli_query ( $conexao, "DELETE FROM recado WHERE id = $id" );
					echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=administrador.php'>";
			}
			
			?>	
				
				
				</table>
			</div>
			<div style="position:relative;height:100px;"></div>
			
					<div style="
  background: rgb(56,59,68);color:white;width:59%;padding:5px;">
			<?php
// aqui o php conta quantas coisas o usuÃ¡rio ja fez no site , como cadastro de noticia e outros
include "../Conexao.inc";

$res = mysqli_query ( $conexao, "SELECT * FROM Noticia " );

@$query = mysqli_query ( $conexao, $res );
$cont = 0;
while ( $row = mysqli_fetch_array ( $res ) ) {
	if ($row ["Id"]) {
		$cont += 1;
	}
}

$res1 = mysqli_query ( $conexao, "SELECT * FROM Slider " );

@$query1 = mysqli_query ( $conexao, $res1 );
$slider = 0;
while ( $row = mysqli_fetch_array ( $res1 ) ) {
	if ($row ["autor"]) {
		$slider += 1;
	}
}



$res2 = mysqli_query ( $conexao, "SELECT * FROM link" );

@$query2 = mysqli_query ( $conexao, $res2 );
$links = 0;
while ( $row = mysqli_fetch_array ( $res2 ) ) {
	if ($row ["id"]) {
		$links += 1;
	}
}

$res3 = mysqli_query ( $conexao, "SELECT * FROM destaque" );

@$query3 = mysqli_query ( $conexao, $res3 );
$inovacao = 0;
while ( $row = mysqli_fetch_array ( $res3 ) ) {
	if ($row ["Id"]) {
		$inovacao += 1;
	}
}

$res4 = mysqli_query ( $conexao, "SELECT * FROM formularios " );

@$query4 = mysqli_query ( $conexao, $res4 );
$formulario = 0;
while ( $row = mysqli_fetch_array ( $res4 ) ) {
	if ($row ["nome"]) {
		$formulario += 1;
	}
}

$res5 = mysqli_query ( $conexao, "SELECT * FROM Galeria " );

@$query5 = mysqli_query ( $conexao, $res5 );
$galeria = 0;
while ( $row = mysqli_fetch_array ( $res5 ) ) {
	if($row["id"]){
	$galeria += 1;
	}
}

$res6 = mysqli_query ( $conexao, "SELECT * FROM funcionario " );

@$query6 = mysqli_query ( $conexao, $res6 );
$funcionarios = 0;
while ( $row = mysqli_fetch_array ( $res6 ) ) {
	if($row["id"]){
		$funcionarios += 1;
	}
}

$res7 = mysqli_query ( $conexao, "SELECT * FROM Usuario" );

@$query7 = mysqli_query ( $conexao, $res7 );
$usuarios = 0;
while ( $row = mysqli_fetch_array ( $res7 ) ) {
	if($row["NI"]){
		$usuarios += 1;
	}
}
?>

<h3>Gráfico com as Estatisticas</h3>
<hr>
			<div class="box-chart" style="position:relative;">
				<canvas id="GraficoPizza"></canvas>

				<script type="text/javascript">
				var noticias = <?= $cont?>;
				var slide = <?= $slider?>;
				var links = <?= $links?>;
				var inovacao = <?= $inovacao?>;
				var	formulario = <?= $formulario?>;
				var	galeria = <?= $galeria?>;
				var funcionarios = <?= $funcionarios?>;
                var options = {
                    responsive:true
                };

                var data = [
                    {
                        value: noticias,
                        color:"#F7464A",
                        highlight: "#FF5A5E",
                        label: "Noticias"
                    },
                    {
                        value: slide,
                        color: "#46BFBD",
                        highlight: "#5AD3D1",
                        label: "Slide"
                    },
                    {
                        value: links,
                        color: "#e9e9e9",
                        highlight: "#e9e9e9",
                        label: "Links"
                    },
                    {
                        value: inovacao,
                        color: "orange",
                        highlight: "orange",
                        label: "Inovação"
                    },
                    {
                        value: formulario,
                        color: "#000000",
                        highlight: "#111111",
                        label: "Formulários"
                    },
                    {
                        value: galeria,
                        color: "blue",
                        highlight: "blue",
                        label: "Galeria"
                    },
                    {
                        value: funcionarios,
                        color: "orange",
                        highlight: "orange",
                        label: "Funcionários"
                    }
                ]
                
                window.onload = function(){

                    var ctx = document.getElementById("GraficoPizza").getContext("2d");
                    var PizzaChart = new Chart(ctx).Pie(data, options);
                }  
            </script>



			</div>
			</div>
			
			<div style="width:25%;border-bottom: #23262d solid 1px;
  background: rgb(56,59,68);color:white;height:100px;position:absolute;left:70%;top:61%;border:1px solid white;padding:5px;">
			<br>
			&nbsp;&nbsp;&nbsp;<img src="../Recursos/menuadm/usuario.png" width="60" height="60">
			&nbsp;&nbsp;&nbsp;<span style="font-size:20px;position:absolute;top:20%;">
			<b>Usuários</b>
			<br>
			<?php 
			echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"."<b>".$usuarios."</b>";
			?>
			</span>
			</div>
			<div style="width:25%;border-bottom: #23262d solid 1px;
  background: rgb(56,59,68);color:white;height:100px;text-align:center;position:absolute;left:70%;top:75%;border:1px solid white;padding:5px;">
 <br><a href="manualdousuario.php">
  <img src="../Recursos/menuadm/formulario.png" width="44" height="44">
  <span style="position:relative;top:-20%;"><font size="3"><b style="color:white;">Manual do Administrador</b></font></span></a>
  </div>
			
	
	<?php 
	@$id = $_GET["id"];
	if(@$id==1){?>
	<audio controls style="visibility: hidden;" autoplay>
				<source src="../Recursos/audio/sejabemvindo.ogg" type="audio/ogg">
				<source src="../Recursos/audio/sejabemvindo.mp3" type="audio/mpeg">

			</audio> 
<?php }?>
	</div>
		
	</div>

	
	<?php
	include "menuadm.php";
	?>
     
<br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br>	
		<!--Parte responsavel pelo rodape do site -->
		<div id="rodape1" align="center">
			<address>©2015 - 2015 CFP 5.14 - Todos os direitos reservados</address>

		</div>


</body>
</html>