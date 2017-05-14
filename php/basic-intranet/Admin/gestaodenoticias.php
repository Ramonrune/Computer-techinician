<?php include "valida_sessao.inc"; ?>
<?php include "valida_permissao_noticia.inc"; ?>
<html>
<head>
<title>Notícias</title>
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
				<h1>Gestão de Notícias</h1>
				
				
			</header>

	<!-- parte do corpo do menu do administrador contendo calendarios , e outras coisas -->
	<div id="corpo">
		<div>


			
			<br> <br>
			<!-- Formulário que cadastra mais notícias
			o valor dos campos é o salvamento caso o usuário esqueça de informar algum campo , 
			os outros dados informados por ele não serão perdidos -->
			<form method="post" action="incluinoticia.php"
				enctype="multipart/form-data">
				<table>
					<tr>
						<td>Informe o Título da Notícia:</td>
						<td><input type="text" name="titulo" maxlength="100"
							value="<?php  @$titulo = $_POST["titulo"];echo $titulo;?>"></td>
					</tr>
					<tr>
						<td valign="top">Informe o Subtítulo:</td>
						<td><input type="text" name="descricao" maxlength="100"
							value="<?php  @$descricao = $_POST["descricao"];echo $descricao;?>">
						</td>
					</tr>
					<tr>
						<td>Selecione a Imagem:</td>
						<td><input type="file" name="img[]" id="files"> <br> <output
								id="list"></output> <br> <br>
							<div id="progress_bar">
								<div class="percent">0%</div>
							</div></td>
					</tr>
					<tr>
						<td valign="top">Digite o texto da Notícia:</td>
						<td><textarea rows="100" cols="75" name="texto"><?php  @$texto = $_POST["texto"];echo $texto;?></textarea>
							<script>
            CKEDITOR.replace( 'texto' );
        </script></td>
					</tr>
					<tr>
						<td><br></td>
						<td><br> <input type="reset" value="Limpar" id="input"
							name="limpar" style="cursor: pointer;">&nbsp;&nbsp;&nbsp;&nbsp; <input
							type="submit" value="Upload" id="input" name="upload"
							style="cursor: pointer;"></td>
					</tr>
				</table>
			</form>
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
			<br> <br>
			<?php 
			if(isset($_POST["deletar"]) ){
				echo "<div style='width:400px;height:100px;background:lightgrey;position:fixed;left:35%;top:40%;padding:10px;border:2px solid black;border-radius:10px;'>";
				echo "<b>Confirmar Exclusão :</b>";
				echo "<form method='post'><input type='submit' value='Confirmar' id='input' name='sim'><input type='hidden' name='pega' value='$_POST[deletar]'>";
				echo '&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" value="Cancelar" id="input" name="nao"></form>';
						echo "</div>";
			
			}
			if(isset($_POST["sim"])){
			echo "<br><br>";
				include "../Conexao.inc";
				$id = $_POST["pega"];
					
				if (empty ( $id )) {
				echo "Por Favor Informe Uma Id Válida.";
				} else {
					@session_start ();
		$nome_usuario = $_SESSION ["nome_usuario"];
		$resultado1 = mysqli_query ( $conexao, "SELECT * FROM Usuario WHERE NI=$nome_usuario" );
		@$query = mysqli_query ( $conexao, $resultado1 );
		
		while ( $row = mysqli_fetch_array ( $resultado1 ) ) {
			
			$nomedousuario = $row ["Nome"];
		}			
			$r = mysqli_query ( $conexao, "SELECT * FROM Noticia WHERE Id = $id" );
			if ($r === FALSE) {
				die ( mysql_error () );
			}
			
			while ( $row = mysqli_fetch_array ( $r ) ) {
				$titulo = $row ["Titulo"];
				$descricao = $row ["Descricao"];
				$data = $row ["Data_post"];
				$imagem = $row ["Imagem"];
				$autor = $row ["autor"];
				$autorvdd=$row["autorvdd"];
				$texto = $row ["Texto"];
				$dataexclusao = date ( 'Y-m-d' );
			}
			$datafinal = date( 'Y-m-d', strtotime("+365 days") );
			//aqui é inserido na lixeira de noticia a noticia que foi excluida
			$coloca = mysqli_query ( $conexao, "INSERT INTO LixeiraNoticia Values('$titulo','$descricao','$data',null,'$imagem','$autor','$autorvdd','$texto','$dataexclusao','$nomedousuario','$datafinal')" );
			//deleção do banco de dados
			$resultado = mysqli_query ( $conexao, "DELETE FROM Noticia WHERE Id=$id" );
			echo "Notícia Deletada Com Sucesso!";
			@$query = mysqli_query ( $conexao, $resultado );
				
			}
			}
			
			?>
			<!-- Aqui é mostrado as notícias que estão cadastradas -->
			<table border='1'
				style="box-shadow: 0 0 5px; border-radius: 4px; border: 1px solid black; border-collapse: collapse;"
				width="100%">
				<thead>
					<tr>
						<th><b>Titulo</b></th>
						<th><b>Subtítulo</b></th>
						<th><b>Data</b></th>
						<th><b>Imagem</b></th>
						<th><b>Responsavel / Autor</b></th>
						<th><b>Ações</b></th>
					</tr>
				</thead>
				<tr>
 	<?php
		
		include "../Conexao.inc";
		@$resultado = mysqli_query ( $conexao, "SELECT * FROM Noticia,Usuario WHERE Noticia.autor = Usuario.NI" );		
		if ($resultado === FALSE) {
			die ( mysql_error () );
		}
		@$numero = mysqli_num_rows ( $resultado );
		if ($numero == 0) {
			echo '<tr><td colspan="6" align="center">' . "Nenhuma Notícia Cadastrada.</td></tr>";
		}
		while ( $row = mysqli_fetch_array ( $resultado ) ) {
			
			echo "<td><div style='width:250px;word-wrap: break-word;'>" . $row ["Titulo"] . "</div></td>";
			echo "<td><div style='width:250px;word-wrap: break-word;'>" . $row ["Descricao"] . "</div></td>";
			echo "<td>" . date ( "d/m/Y", strtotime ( $row ['Data_post'] ) ) . "</td>";
			echo "<td>" . "<img src='../Recursos/noticias/$row[Imagem]' width='50' height='50'>" . "</td>";
			echo "<td>";
			if($row["NI"]==$row["autor"]){
				echo $row["Nome"];
			}
			echo " / ".$row["autorvdd"];
			
			echo "</td>";
			echo "<td>" . "<form method='post'><a href='editanoticia.php?id=$row[Id]'><img src='../Recursos/Imagens/caneta.png'></a>&nbsp;&nbsp;&nbsp;<input type='image' src='../Recursos/Imagens/delecao.png' width='16' height='16' name='deletar' value='$row[Id]'></form></td>";
			echo "</tr>";
		}
		
		mysqli_close ( $conexao );
		
		
		?>
  
			
			
			
			
			
			</table>
			<a class="botao" href="Lixeira_Not.php">Lixeira</a>

			
	
		</div>
		<br> <br> <br> <br> <br> <br>
		
	</div>

	
	<?php
	include "menuadm.php";
	?>
	<br> <br> <br> <br> <br> <br>
     <div id="rodape1" align="center">
			<address>©2015 - 2015 CFP 5.14 - Todos os direitos reservados</address>

		</div>

	
	</body>
</html>