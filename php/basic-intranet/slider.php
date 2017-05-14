<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Slider</title>

<script src="Recursos/sliderengine/jquery.js"></script>
<script src="Recursos/sliderengine/amazingslider.js"></script>
<link rel="stylesheet" type="text/css"
	href="Recursos/sliderengine/amazingslider-1.css">
<script src="Recursos/sliderengine/initslider-1.js"></script>


</head>
<body>

	<div style="position: relative; right: 0%; right: 15%;">
		<div id="amazingslider-1"
			style="display: block; position: relative; margin: 0 auto;">
			<ul class="amazingslider-slides" style="display: none;">
 		<?php
			// aqui é pego as 5 primeiras imagens do slider
			include "Conexao.inc";
			$resultado = mysqli_query ( $conexao, "SELECT * FROM Slider LIMIT 5" );
			if ($resultado === FALSE) {
				die ( mysql_error () );
			}
			
			while ( $row = mysqli_fetch_array ( $resultado ) ) {
				
				?>
      
                <li><img src="Recursos/images/<?php echo $row["Nome_slide"];?>" alt="" />
				</li>
             
             <?php
			}
			
			?>
          
            </ul>


		</div>
	</div>




</body>
</html>