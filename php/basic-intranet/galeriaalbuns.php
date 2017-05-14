<?php
ini_set('zlib.output_compression','On');
ini_set('zlib.output_compression_level','1');
?>
<html>
<head>
<title>Galeria</title>
<!--Index do html
Projeto Intranet Senai
Data: 26/02/2014
-->
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="UTF-8">
<link rel="icon" href="Recursos/Imagens/icon.png">
<link rel="stylesheet" href="Layout/galeria.css" type="text/css" />
<link rel="stylesheet" type="text/css" href="Recursos/lightbox/jquery.fancybox-1.3.4.css" media="screen" />
<script src="Recursos/jquery/jquerymenu.js"></script>


</head>
<body>
	<!--Esta é a parte do cabeçalho do código -->
		<?php
		include "cabecalho.php";
		?>
	
	




	<div id="titulogaleria">
		<br> Galeria SENAI Alvares Romi
	</div>
	<div style="position: relative;
	top: 10%;
	margin: 0 auto;
	min-width: 1000px;
	max-width: 1000px;">
		
		<br> <br>

	
	
	<?php
	//aqui são mostrados todos os albuns , que caso o usuário clique nos albuns , é possivel ver as imagens cadastradas dentro dos albuns 
	include "Conexao.inc";
	if(!isset($_GET["pasta"])){
		echo "Nenhum Album Encontrado.";
	}
	if(isset($_GET["pasta"])){
	$pasta = $_GET ["pasta"];
	echo "<div><h2>&nbsp;&nbsp;" . $pasta . "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='galeria.php' style='position:relative;left:60%;'><font color='black'>Voltar</font></a></h2>";
	echo "<br>";
	$resultado = mysqli_query ( $conexao, "SELECT * FROM Galeria WHERE pasta = '$pasta' " );
	if ($resultado === FALSE) {
		die ( mysql_error () );
	}
	
	while ( $row = mysqli_fetch_array ( $resultado ) ) {
		
		?>
	
		  <div class="box-detail" id="<?=$row['Nome']?>">
			<div class="box-inner box-color">
				<a rel="example_group" title=""
					href="Recursos/galeria/<?=$row['pasta'].'/'.$row['Nome'] ?>">
					<img src="Recursos/galeria/<?=$row['pasta'].'/'.$row['thumb'] ?>" width='200'
					height='200' />
					
				</a>
				<div class="box-bottom-left"><?= $row["titulo"] ?></div>
			</div>
			<div class="box-bottom-right"><?php echo date('d/m/Y', strtotime($row["data_img"]));?></div>

		</div>
		

        
         
		<?php
	
	}
	}
	?>
	
	
	
	</div>
	
	<script type="text/javascript" src="Recursos/lightbox/lightbox.js"></script>
<script type="text/javascript" src="Recursos/lightbox/jquery.easing-1.3.pack.js"></script>
<script type="text/javascript" src="Recursos/lightbox/jquery.mousewheel-3.0.4.pack.js"></script>

<script type="text/javascript" src="Recursos/lightbox/jquery.fancybox-1.3.4.js"></script>

<script type="text/javascript" src="Recursos/lightbox/web.js?m=20100203"></script>
	


</body>
</html>