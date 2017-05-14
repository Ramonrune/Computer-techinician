<?php include "valida_sessao.inc"; ?>
<?php include "valida_permissao_integracao.inc"; ?>
<html>
<head>
<title>Integração</title>
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
				<h1>Gestão de Integração</h1>
				
				
			</header>
	<!-- parte do corpo do menu do administrador contendo calendarios , e outras coisas -->
	<div id="corpo">
		<div>


			<br> <br>
			<h3>Adicionar Formulário de Integração</h3>
			<br>
			<!-- Formulário que adiciona formulários da integração -->
			<form method="post" action=""
				enctype="multipart/form-data">

				<table>
					<tr>
						<td>Informe o Nome:</td>
						<td><input type="text" name="nome" maxlength="100"></td>
					</tr>
					<tr>
						<td>Selecione o Formulário:</td>
						<td><input type="file" name="img[]" id="files"><br> <output
								id="list"></output> <br>
						<br>
							<div id="progress_bar">
								<div class="percent">0%</div>
							</div></td>
					</tr>

				</table>
				<br> <input type="reset" value="Limpar" id="input" name="limpar">&nbsp;&nbsp;&nbsp;&nbsp;
				<input type="submit" value="Upload" id="input" name="upload">
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
			if(isset($_POST["upload"])){
				include "../Conexao.inc";
				@session_start ();
				$nome_usuario = $_SESSION ["nome_usuario"];
				$result = mysqli_query ( $conexao, "SELECT * FROM Usuario WHERE NI=$nome_usuario" );
				@$query = mysqli_query ( $conexao, $result );
				
				while ( $row = mysqli_fetch_array ( $result ) ) {
				
					$nomedousuario = $row ["NI"];
					$nom1=$row["Nome"];
				}
				if (isset ( $_POST ["upload"] )) {
					$file = $_FILES ["img"];
					$numfile = count ( array_filter ( $file ["name"] ) );
					for($i = 0; $i < $numfile; $i ++) {
						$name = $file ["name"] [$i];
						$type = $file ["type"] [$i];
						$size = $file ["size"] [$i];
						$error = $file ["error"] [$i];
						$tmp = $file ["tmp_name"] [$i];
					}
					// Recupera a extensão do arquivo
					$extensao = @end ( explode ( '.', $name ) );
					$permite = array (
							"doc",
							"docx",
							"pdf",
							"txt",
							"xls"
					);
					include "../Conexao.inc";
					$nome = $_POST ["nome"];
					$erro = 0;
					//validação da variavel
					if (empty ( $nome )) {
						echo "<br><br>";
						echo "Digite o Nome do Formulário Corretamente.<br><br>";
						$erro += 1;
					}
					
					if($numfile<=0 or !in_array ($extensao, $permite )){
						echo "<br><br>";
						echo "Insira um Formulário Válido.<br><br>";
						$erro += 1;
					}
					
				
					if ($erro != 0) {
						
					}
					$data = date ( 'Y-m-d' );
				
					if ($erro == 0) {
						@session_start ();
						if (IsSet ( $_SESSION ["nome_usuario"] )) {
							$nome_usuario = $_SESSION ["nome_usuario"];
						}
						function retira_acentos($texto) {
							$array1 = array (
									"á",
									"à",
									"â",
									"ã",
									"ä",
									"é",
									"è",
									"ê",
									"ë",
									"í",
									"ì",
									"î",
									"ï",
									"ó",
									"ò",
									"ô",
									"õ",
									"ö",
									"ú",
									"ù",
									"û",
									"ü",
									"ç",
									"Á",
									"À",
									"Â",
									"Ã",
									"Ä",
									"É",
									"È",
									"Ê",
									"Ë",
									"Í",
									"Ì",
									"Î",
									"Ï",
									"Ó",
									"Ò",
									"Ô",
									"Õ",
									"Ö",
									"Ú",
									"Ù",
									"Û",
									"Ü",
									"Ç"
							);
							$array2 = array (
									"a",
									"a",
									"a",
									"a",
									"a",
									"e",
									"e",
									"e",
									"e",
									"i",
									"i",
									"i",
									"i",
									"o",
									"o",
									"o",
									"o",
									"o",
									"u",
									"u",
									"u",
									"u",
									"c",
									"A",
									"A",
									"A",
									"A",
									"A",
									"E",
									"E",
									"E",
									"E",
									"I",
									"I",
									"I",
									"I",
									"O",
									"O",
									"O",
									"O",
									"O",
									"U",
									"U",
									"U",
									"U",
									"C"
							);
							return str_replace ( $array1, $array2, $texto );
						}
						function retira_especial($texto) {
							$array1 = array (
									"!",
									"#",
									"$",
									"%",
									"¨¨",
									"&",
									"*",
									"(",
									")",
									"|",
									"¹",
									"²",
									"³",
									"£",
									"¢",
									"¬",
									"°"
							);
							$array2 = array (
									"",
									"",
									"",
									"",
									"",
									"",
									"",
									"",
									"",
									"",
									"",
									"",
									"",
									"",
									"",
									"",
									""
							);
							return str_replace ( $array1, $array2, $texto );
						}
							
						$nome = retira_especial ( $nome );
						$nome = retira_acentos($nome);
						$resultado = mysqli_query ( $conexao, "INSERT INTO Integracao values(null,'$nome','$data','$extensao','$nomedousuario','$nom1');" );
						echo "Formulario Enviado Corretamente!<br>";
					
				
					echo "<br><br>";
				
					$folder = "../Recursos/Integracao";
				
					$maxtam = 1024 * 1024 * 100;
				
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
						echo "Selecione um Arquivo";
					} else {
						for($i = 0; $i < $numfile; $i ++) {
							$name = $file ["name"] [$i];
							$type = $file ["type"] [$i];
							$size = $file ["size"] [$i];
							$error = $file ["error"] [$i];
							$tmp = $file ["tmp_name"] [$i];
				
							// Recupera a extensão do arquivo
							$extensao = @end ( explode ( '.', $name ) ); // recupera o ultimo indice de um array
							$novoNome = $nome . ".$extensao"; // novo nome a ser gravado na pasta (Rand = Gera um numero aleatorio)
							$novoNome = $novoNome;
							// Verificando os erros das minhas imagens
				
							if ($error != 0) {
								$msg [] = "<b>$name  :</b>" . $errorMsg [$error];
							}
				
							elseif ($size > $maxtam)
							$msg [] = "<b>$name :</b>Erro - Arquivo ultrapassa o limite de 5MB";
				
							else {
								if (move_uploaded_file ( $tmp, $folder . "/" . $novoNome )) { // Responsavel em copiar os arquivos temporarios para a pasta uploads
									$msg [] = "<b>$name :</b>Upload realizado com sucesso !<br><br>";
								} else
									$msg [] = "<b>$name :</b> Desculpe ! Não foi possivel fazer  Upload...<br><br>";
							}
							foreach ( $msg as $vlr )
								echo $vlr . "<br>";
						}
					}
				}
			}
			}
			if(isset($_POST["excluir"])){
				echo "<div style='width:400px;height:100px;background:lightgrey;position:fixed;left:35%;top:40%;padding:10px;border:2px solid black;border-radius:10px;'>";
				echo "<b>Confirmar Exclusão :</b>";
				echo "<form method='post'><input type='submit' value='Confirmar' id='input' name='sim'><input type='hidden' name='pega' value='$_POST[excluir]'>";
				echo '&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" value="Cancelar" id="input" name="nao"></form>';
				echo "</div>";
			}
			
			if(isset($_POST["sim"])){
				//aqui é pego o código do formulário de integração que foi clicado
				//após isso é feito o unlink do arquivo , que é responsavel por excluir o arquivo
				//da pasta
				//e então após isso o formulário é apagado do banco de dados
				include "../Conexao.inc";
				$codigo = $_POST["pega"];
			
				$resultado = mysqli_query ( $conexao, "SELECT * FROM Integracao WHERE id='$codigo'" );
				if ($resultado === FALSE) {
					die ( mysql_error () );
				}
				while ( $row = mysqli_fetch_array ( $resultado ) ) {

						$nome = $row ["nome"];
						$extensao = $row ["extensao"];
						$arquivo = "../Recursos/Integracao/$nome.$extensao";
						
				}
				
				
				
				unlink ( $arquivo );
				
				if (empty ( $codigo )) {
					echo "Informe um Nome!<br><br>";
				} else {
					
					$resultado = mysqli_query ( $conexao, "DELETE FROM Integracao WHERE id=$codigo" );
				
					@$query = mysqli_query ( $conexao, $resultado );
					echo "<br><br>";
					
					echo "Formulario Excluido com Sucesso!<br><br>";
				}
			}
			?>
			<br> <br>
			<table border="1"
				style="box-shadow: 0 0 5px; border-radius: 4px; border: 1px solid black; border-collapse: collapse;"
				width="100%">
				<thead>
					<tr>
						<th><b>Nome</b></th>
						<th><b>Data</b></th>
						<th><b>Responsavel</b></th>
						<th><b>Autor</b></th>
						<th><b>Ações</b></th>
					</tr>
				</thead>
				<tr>
 <?php
	// aqui são mostrados todos os formulários que estão cadastrados
	include "../Conexao.inc";
	$resultado = mysqli_query ( $conexao, "SELECT * FROM Integracao,Usuario WHERE Integracao.autor=Usuario.NI" );
	
	$numero = mysqli_num_rows ( $resultado );
	if ($numero == 0) {
		echo '<tr><td colspan="6" align="center">' . "Nenhum Formulario Cadastrado.</td></tr>";
	}
	while ( $row = mysqli_fetch_array ( $resultado ) ) {
		
		echo "<td><div style='width:250px;word-wrap: break-word;'>" . $row ['nome'] . "</div></td>";
		echo "<td>";
		echo date ( "d/m/Y", strtotime ( $row ['data_upload'] ) );
		
		echo "</td>";
		echo "<td>";
		if($row["NI"]==$row["autor"]){
			echo $row["Nome"];
		}
		echo "</td>";
		echo "<td>".$row["responsavel"]."</td>";
		
		echo "<td><form method='post'><input type='image' src='../Recursos/Imagens/delecao.png' width='16' height='16' name='excluir' value='$row[id]'></form></td>";
		echo "</tr>";
	}
	
	mysqli_close ( $conexao );
	
	?>

  
			
			
			
			</table>
			<br> <br> <br> <br> <br> <br>

		</div>
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