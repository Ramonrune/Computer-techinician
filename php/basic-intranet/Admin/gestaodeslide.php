<?php include "valida_sessao.inc"; ?>
<?php include "valida_permissao_slide.inc"; ?>
<html>
<head>
<title>Slide</title>
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
	<!--Parte responsavel pelo funcionamento dos menus -->
	<br><br><br>
	<header>
				<h1>Gestão de Slide</h1>
				
				
			</header>
	
	<!-- parte do corpo do menu do administrador contendo calendarios , e outras coisas -->
	<div id="corpo">
		<div>


			
			<br> <br>
			<!-- Formulário que adiciona slides -->
			<form method="post" action=""
				enctype="multipart/form-data">
				<table>
					<tr>
						<td>Selecione a Imagem:</td>
						<td><input type="file" name="img[]" multiple id="files"> <br> <output
								id="list"></output> <br>
						<br>
							<div id="progress_bar">
								<div class="percent">0%</div>
							</div></td>
					</tr>
					<tr>
						<td><br> <input type="submit" value="Upload" name="upload"
							id="input" style="cursor: pointer;"></td>
					</tr>

				</table>
			</form>
			<b>Obs:</b> A foto deve possuir No Máximo um Tamanho de  5 MB.

			<script>
  function handleFileSelect(evt) {
    var files = evt.target.files; // FileList object

    // Loop through the FileList and render image files as thumbnails.
    for (var i = 0, f; f = files[i]; i++) {

      // Only process image files.
      if (!f.type.match('image.*')) {
        continue;
      }

      var reader = new FileReader();

      // Closure to capture the file information.
      reader.onload = (function(theFile) {
        return function(e) {
          // Render thumbnail.
          var span = document.createElement('span');
          span.innerHTML = ['<img class="thumb" src="', e.target.result,
                            '" title="', escape(theFile.name), '"/>'].join('');
          document.getElementById('list').insertBefore(span, null);
        };
      })(f);

      // Read in the image file as a data URL.
      reader.readAsDataURL(f);
    }
  }

  document.getElementById('files').addEventListener('change', handleFileSelect, false);
</script>
			<script>
  var reader;
  var progress = document.querySelector('.percent');

  function abortRead() {
    reader.abort();
  }

  function errorHandler(evt) {
    switch(evt.target.error.code) {
      case evt.target.error.NOT_FOUND_ERR:
        alert('File Not Found!');
        break;
      case evt.target.error.NOT_READABLE_ERR:
        alert('File is not readable');
        break;
      case evt.target.error.ABORT_ERR:
        break; // noop
      default:
        alert('An error occurred reading this file.');
    };
  }

  function updateProgress(evt) {
    // evt is an ProgressEvent.
    if (evt.lengthComputable) {
      var percentLoaded = Math.round((evt.loaded / evt.total) * 100);
      // Increase the progress bar length.
      if (percentLoaded < 100) {
        progress.style.width = percentLoaded + '%';
        progress.textContent = percentLoaded + '%';
      }
    }
  }

  function handleFileSelect(evt) {
    // Reset progress indicator on new file selection.
    progress.style.width = '0%';
    progress.textContent = '0%';

    reader = new FileReader();
    reader.onerror = errorHandler;
    reader.onprogress = updateProgress;
    reader.onabort = function(e) {
      alert('File read cancelled');
    };
    reader.onloadstart = function(e) {
      document.getElementById('progress_bar').className = 'loading';
    };
    reader.onload = function(e) {
      // Ensure that the progress bar displays 100% at the end.
      progress.style.width = '100%';
      progress.textContent = '100%';
      setTimeout("document.getElementById('progress_bar').className='';", 2000);
    }

    // Read in the image file as a binary string.
    reader.readAsBinaryString(evt.target.files[0]);
  }

  document.getElementById('files').addEventListener('change', handleFileSelect, false);
</script>
			
			<?php
			// se o botão de upload estiver setado
			if (isset ( $_POST ["upload"] )) {
				$file = $_FILES ["img"];
				$numfile = count ( array_filter ( $file ["name"] ) );
			
				
				// Pasta
				
				// se a imagem for menor de 20kbs um erro será informado e se
				// a imagem não for de um tipo determinado outro erro será informado
				$permite = array (
						"image/jpeg",
						"image/png" 
				);
				$erro = 0;
				for($i = 0; $i < $numfile; $i ++) {
					$size = $file ["size"] [$i];
					$type = $file ["type"] [$i];
					if ($size < 20000) {
						echo "Imagem Muito Pequena.<br>";
						$erro ++;
					}
					
					if (! in_array ( $type, $permite )) {
						echo "Imagem Não é Do Tipo Suportado.<br>";
						$erro ++;
					}
				}
				
				if ($erro != 0) {
					
				}
				
				echo "<br><br>";
				
				if ($erro == 0) {
					include "../Conexao.inc";
					@session_start ();
					if (IsSet ( $_SESSION ["nome_usuario"] )) {
						$nome_usuario = $_SESSION ["nome_usuario"];
					}
					
					$peganome = mysqli_query ( $conexao, "SELECT * FROM Usuario WHERE NI=$nome_usuario" );
					@$query = mysqli_query ( $conexao, $peganome );
					
					while ( $row = mysqli_fetch_array ( $peganome ) ) {
						
						$nome_usuario = $row ["NI"];
						$nom1=$row["Nome"];
					}
					
					$folder = "../Recursos/images";
					
					$maxtam = 1024 * 1024 * 5; // 5MB
					                           
					// Mensagens
					$msg = array ();
					$error = array (
							1 => "Arquivo no upload é maior do que o limite definido",
							2 => "O arquivo ultrapassa o limite de tamanho MAX_FILE_SIZE (64MB)",
							3 => "O upload do arquivo foi feito parcialmente",
							4 => "Não foi feito o upload do arquivo" 
					);
					
					// Recupera os dados das imagens
					if ($numfile <= 0) {
						echo "Selecione uma imagem";
					} else {
						for($i = 0; $i < $numfile; $i ++) {
							$name = $file ["name"] [$i];
							$type = $file ["type"] [$i];
							$size = $file ["size"] [$i];
							$error = $file ["error"] [$i];
							$tmp = $file ["tmp_name"] [$i];
							
							// Recupera a extensão do arquivo
							$extensao = @end ( explode ( '.', $name ) ); // recupera o ultimo indice de um array
							$novoNome = rand () . ".$extensao"; // novo nome a ser gravado na pasta (Rand = Gera um numero aleatorio)
							
							$resultado = mysqli_query ( $conexao, "INSERT INTO Slider Values(null,'$novoNome','$nome_usuario','$nom1')" );
							@$registro = mysqli_fetch_array ( $resultado );
							
							// Verificando os erros das minhas imagens
							
							if ($error != 0) {
								$msg [] = "<b>$name  :</b>" . $errorMsg [$error];
							} 

							elseif ($size > $maxtam)
								$msg [] = "<b>$name :</b>Erro - Imagem ultrapassa o limite de 5MB";
							
							else {
								if (move_uploaded_file ( $tmp, $folder . "/" . $novoNome )) { // Responsavel em copiar os arquivos temporarios para a pasta uploads
									$msg [] = "<b>$name :</b>Upload realizado com sucesso !<br><br>";
									echo "<img src='../Recursos/images/$novoNome' width='150' height='100'>" . "";
									$input_image = "../Recursos/images/$novoNome";
									
									// Pega o tamanho original da imagem e armazena em um Array:
									$size = getimagesize( $input_image );
									
									// Configura a nova largura da imagem:
									$thumb_width = "700";
									
									// Calcula a altura da nova imagem para manter a proporção na tela:
									$thumb_height = ( int )(( $thumb_width/$size[0] )*$size[1] );
									
									// Cria a imagem com as cores reais originais na memória.
									$thumbnail = ImageCreateTrueColor( $thumb_width, $thumb_height );
									
									// Criará uma nova imagem do arquivo.
									if($extensao=="jpg"){
									$src_img = ImageCreateFromJPEG( $input_image );
									}
									if($extensao=="png"){
										$src_img = ImageCreateFromPNG( $input_image );
									}
									// Criará a imagem redimensionada:
									ImageCopyResampled( $thumbnail, $src_img, 0, 0, 0, 0, $thumb_width, $thumb_height, $size[0], $size[1] );
									
									// Informe aqui o novo nome da imagem e a localização:
									if($extensao=="jpg"){
									ImageJPEG( $thumbnail, "../Recursos/images/$novoNome" );
									}
									if($extensao=="png"){
									ImagePNG( $thumbnail, "../Recursos/images/$novoNome");
									}
									// Limpa da memoria a imagem criada temporáriamente:
									ImageDestroy( $thumbnail );
									
								} else
									$msg [] = "<b>$name :</b> Desculpe ! Não foi possivel fazer  Upload...<br><br>";
							}
							foreach ( $msg as $vlr )
								echo $vlr . "<br>";
						}
					}
				}
			}
			if(isset($_POST["deletar"])){
				echo "<div style='width:400px;height:100px;background:lightgrey;position:fixed;left:35%;top:40%;padding:10px;border:2px solid black;border-radius:10px;'>";
				echo "<b>Confirmar Exclusão :</b>";
				echo "<form method='post'><input type='submit' value='Confirmar' id='input' name='sim'><input type='hidden' name='pega' value='$_POST[deletar]'>";
				echo '&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" value="Cancelar" id="input" name="nao"></form>';
				echo "</div>";
			}
			
			
			if(isset($_POST["sim"])){
				//aqui é pego a id da imagem e após isso é feita a exclusão da mesma
				//o unlink é responsavel por deletar a imagem da pasta
				include "../Conexao.inc";
				$id = $_POST["pega"];
				$resultado = mysqli_query($conexao, "SELECT * FROM Slider");
				if($resultado === FALSE){
					die(mysql_error());
				
				}
				while($row = mysqli_fetch_array($resultado)){
				
					if($id==$row["id"]){
						@$nome = $row["Nome"];
				
					}
				
				}
				
				@$arquivo = "images/$nome";
				
				@unlink($arquivo);
				$erro=0;
				if(empty($id)){
					echo "Informe uma Identificação!";
				}
				
				else{
					if(mysqli_num_rows($resultado)==1){
						echo "Não é possivel excluir o Slide.<br>";
						$erro+=1;
					}
					elseif($erro==0){
				
						$resultado = mysqli_query($conexao,"DELETE FROM Slider WHERE id=$id");
				
				
						@$query = mysqli_query($conexao,$resultado);
							
				
				
							
						echo "O Slider foi Excluido Com Sucesso!<br><br>";
				
					}
					if($erro!=0){
							
					}
				}
			}
			
			@mysqli_close ( $conexao );
			
			?>
			<br> <br>
			<table border="1"
				style="box-shadow: 0 0 5px; border-radius: 4px; border: 1px solid black; width: 100%; border-collapse: collapse;">
				<thead>
					<tr>
						<th><b>Imagem</b></th>
						<th><b>Responsavel</b></th>
						<th><b>Autor</b></th>
						<th><b>Ações</b></th>
					</tr>
				</thead>
				<tr>
 	<?php
		//Aqui é mostrado todos as imagens que estão cadastradas
		include "../Conexao.inc";
		$resultado = mysqli_query ( $conexao, "SELECT * FROM Slider,Usuario WHERE Slider.autor = Usuario.NI" );
		if ($resultado === FALSE) {
			die ( mysql_error () );
		}
	
		while ( $row = mysqli_fetch_array ( $resultado ) ) {
			
			echo "<td>" . "<img src='../Recursos/images/$row[Nome_slide]' width='50' height='50'>" . "</td>";
			echo "<td>" ;
			if($row["NI"]==$row["autor"]){
				echo $row["Nome"];
			}
			 echo "</td>";
			 echo "<td>".$row["responsavel"]."</td>";
			echo "<td><form method='post'><input type='image' src='../Recursos/Imagens/delecao.png' width='16' height='16' name='deletar' value='$row[id]'></form></td>";
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
     

	<!--Parte responsavel pelo rodape do site -->
	<br> <br> <br> <br> <br> <br>
     <div id="rodape1" align="center">
			<address>©2015 - 2015 CFP 5.14 - Todos os direitos reservados</address>

		</div>
		
</body>
</html>