<?php include "valida_sessao.inc"; ?>
<?php include "valida_permissao_inovacao.inc"; ?>
<html>
<head>
<title>Inovação</title>
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
	<!--Parte responsavel pelo funcionamento dos menus -->
	<br><br><br>
	<header>
				<h1>Gestão de Inovação</h1>
				
				
			</header>
	<!-- parte do corpo do menu do administrador contendo calendarios , e outras coisas -->
	<div id="corpo">
		<div>


		
			<br> <br>
			<h3>Adicionar Uma Notícia Na Página Inovação</h3>
			<br>
			<!-- Formulário que adiciona noticias de inovação -->
			<form method="post" action="addinovacao.php"
				enctype="multipart/form-data">

				<table>
					<tr>
						<td>Informe o Título:</td>
						<td><input type="text" name="titulo" maxlength="100"
							value="<?php  @$titulo = $_POST["titulo"];echo $titulo;?>"></td>
					</tr>
					<tr>
						<td valign="top">Informe a Descrição:</td>
						<td><textarea rows="5" cols="50" name="descricao"><?php  @$descricao = $_POST["descricao"];echo $descricao;?></textarea>
							<script>
            CKEDITOR.replace('descricao');
        </script></td>
					</tr>
					<tr>
						<td><br> Selecione a Imagem:</td>
						<td><br> <input type="file" name="img[]" id="files"> <br> <output
								id="list"></output> <br>
						<br>
							<div id="progress_bar">
								<div class="percent">0%</div>
							</div></td>
					</tr>

				</table>
				<br> <br> <input type="reset" value="Limpar" id="input"
					name="limpar">&nbsp;&nbsp;&nbsp;&nbsp; <input type="submit"
					value="Upload" id="input" name="upload">
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

			<?php 
			if(isset($_POST["deletar"]) ){
				echo "<div style='width:400px;height:100px;background:lightgrey;position:fixed;left:35%;top:40%;padding:10px;border:2px solid black;border-radius:10px;'>";
				echo "<b>Confirmar Exclusão :</b>";
				echo "<form method='post'><input type='submit' value='Confirmar' id='input' name='sim'><input type='hidden' name='pega' value='$_POST[deletar]'>";
				echo '&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" value="Cancelar" id="input" name="nao"></form>';
						echo "</div>";
		
			}
			if(isset($_POST["sim"])){
				// aqui é pego a id que foi passada pelo link e após isso é deletada a noticia com a id informado igual ao do banco de dados
				include "../Conexao.inc";
				
				$id = $_POST["pega"];
				@session_start ();
				$nome_usuario = $_SESSION ["nome_usuario"];
				$resultado2 = mysqli_query ( $conexao, "SELECT * FROM Usuario WHERE NI=$nome_usuario" );
				@$query = mysqli_query ( $conexao, $resultado2 );
				
				while ( $row = mysqli_fetch_array ( $resultado2 ) ) {
				
					$nomedousuario = $row ["Nome"];
				}
				$resultado = mysqli_query ( $conexao, "SELECT * FROM destaque" );
				if ($resultado === FALSE) {
					die ( mysql_error () );
				}
				
				while ( $row = mysqli_fetch_array ( $resultado ) ) {
					$titulo = $row ["titulo"];
					$descricao = $row ["descricao"];
					$data = $row ["data_destaque"];
					$imagem = $row ["imagem"];
					$autor = $row ["autor"];
					$autorvdd = $row["autorvdd"];
					$dataexclusao = date ( 'Y-m-d' );
				}
				$datafinal = date( 'Y-m-d', strtotime("+365 days") );
				//aqui é inserido na lixeira de noticia a noticia que foi excluida
				$coloca = mysqli_query ( $conexao, "INSERT INTO LixeiraInovacao Values('$titulo','$descricao','$data',null,'$imagem','$autor','$autorvdd','$dataexclusao','$nomedousuario','$datafinal')" );
				//deleção do banco de dados
				$resultado1 = mysqli_query ( $conexao, "DELETE FROM destaque WHERE Id=$id" );
				
				mysqli_close ( $conexao );
				
				echo "<br><br>Dados Excluidos Corretamente <br><br>";
				
			}
			
			
			?>
			<br>
			<table border="1"
				style="box-shadow: 0 0 5px; border-radius: 4px; border: 1px solid black; border-collapse: collapse;"
				width="100%">
				<thead>
					<tr>
						<th><b>Titulo</b></th>
						<th><b>Data</b></th>
						<th><b>Imagem</b></th>
						<th><b>Autor / Responsavel</b></th>
						<th><b>Ações</b></th>
					</tr>
				</thead>
				<tr>
 <?php
	//aqui são mostradas todas as noticias de inovação 
	//é possivel alteras as notícias e exclui-las
	include "../Conexao.inc";
	$resultado = mysqli_query ( $conexao, "SELECT * FROM destaque,Usuario WHERE Usuario.NI = destaque.autor" );
	$numero = mysqli_num_rows ( $resultado );
	if ($numero == 0) {
		echo '<tr><td colspan="6" align="center">' . "Nenhuma Notícia Cadastrada.</td></tr>";
	}
	
	while ( $row = mysqli_fetch_array ( $resultado ) ) {
		
		echo "<td><div style='width:450px;word-wrap: break-word;'>" . $row ['titulo'] . "</div></td>";
		echo "<td>" . date ( "d/m/Y", strtotime ( $row ['data_destaque'] ) ) . "</td>";
		echo "<td><img src='../Recursos/Destaque/$row[imagem]' width='50' height='50'></td>";
		echo "<td>";
		echo $row["autorvdd"]." / ";
		if($row["NI"]==$row["autor"]){
			echo $row["Nome"];
		}
		echo "</td>";
		
		echo "<td><form method='post'><a href='editainovacao.php?id=$row[Id]'><img src='../Recursos/Imagens/caneta.png'></a>&nbsp;&nbsp;&nbsp;<input type='image' src='../Recursos/Imagens/delecao.png' width='16' height='16' name='deletar' value='$row[Id]'></form></td>";
		echo "</tr>";
	}
	
	mysqli_close ( $conexao );
	
	?>

  
			
			</table>
			<a class="botao" href="Lixeira_Inovacao.php">Lixeira</a>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>

		</div>
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
     <br> <br> <br> <br> <br> <br>
     <div id="rodape1" align="center">
			<address>©2015 - 2015 CFP 5.14 - Todos os direitos reservados</address>

		</div>

	
	</body>
</html>