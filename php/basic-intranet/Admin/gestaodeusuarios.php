<?php include "valida_sessao.inc"; ?>
<?php include "valida_permissao_usuario.inc"; ?>
<html>
<head>
<title>Usuários</title>
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

#mask {
  position:absolute;
  left:0;
  top:0;
  z-index:9000;
  background-color:#000;
  display:none;
}
  
#boxes .window {
  position:absolute;
  left:0;
  top:0;
  width:440px;
  height:200px;
  display:none;
  z-index:9999;
  padding:20px;
}

#boxes #dialog {
  width:375px; 
  height:203px;
  padding:10px;
  background-color:black;
}

#boxes #dialog1 {
  width:375px; 
  height:203px;
}

#dialog1 .d-header {
  background:url(login-header.png) no-repeat 0 0 transparent; 
  width:375px; 
  height:150px;
}

#dialog1 .d-header input {
  position:relative;
  top:60px;
  left:100px;
  border:3px solid #cccccc;
  height:22px;
  width:200px;
  font-size:15px;
  padding:5px;
  margin-top:4px;
}

#dialog1 .d-blank {
  float:left;
  background:url(login-blank.png) no-repeat 0 0 transparent; 
  width:267px; 
  height:53px;
}

#dialog1 .d-login {
  float:left;
  width:108px; 
  height:53px;
}

#boxes #dialog2 {
  background:url(notice.png) no-repeat 0 0 transparent; 
  width:326px; 
  height:229px;
  padding:50px 0 20px 25px;
}
.close{display:block; text-align:right;}

</style>
<script type="text/javascript" src="../Recursos/lightbox/lightbox.js"></script>
<script type="text/javascript" src="../Recursos/lightbox/jquery.easing-1.3.pack.js"></script>
<script type="text/javascript"
	src="../Recursos/lightbox/jquery.mousewheel-3.0.4.pack.js"></script>

<script type="text/javascript" src="../Recursos/lightbox/jquery.fancybox-1.3.4.js"></script>
<link rel="stylesheet" type="text/css"
	href="../Recursos/lightbox/jquery.fancybox-1.3.4.css" media="screen" />

<script type="text/javascript" src="../Recursos/lightbox/web.js?m=20100203"></script>
</head>
<body>
	<!--Esta é a parte do cabeçalho do código -->
	<?php
	include "cabecalho1.php";
	?>
	<!--Parte responsavel pelo funcionamento dos menus -->
	<br><br><br>
	<header>
				<h1>Gestão de Usuários</h1>
				
				
			</header>
	<!-- parte do corpo do menu do administrador contendo calendarios , e outras coisas -->
	<div id="corpo">
		<div>
	

			<br> <br>
			<!-- Formulário para adicionar usuários
			o valor dele faz parte do sistema que salva os dados que foram digitados
			Por exemplo , um usuário esquece de informar um campo , as outras informações
			digitadas por ele não serão perdidas -->
			<form method="post" action="">
				<table>
					<tr>
						<td>Digite o Nome do Usuário :</td>
						<td><input type="text" name="USR_NOME" maxlength="49"
							value="<?php if(isset($_POST["cadastrar"])){ @$USR_NOME = $_POST["USR_NOME"];echo $USR_NOME;}?>">
						</td>
					</tr>
					<tr>
						<td>Digite o NI :</td>
						<td><input type="text" name="USR_NI" size="20" maxlength="15"
							value="<?php  if(isset($_POST["cadastrar"])){ @$USR_NI = $_POST["USR_NI"];echo $USR_NI;}?>"></td>
					</tr>
					<tr>
						<td>Digite a Senha :</td>
						<td><input type="password" name="USR_SENHA" maxlength="39"
							size="20"
							value="<?php   if(isset($_POST["cadastrar"])){ @$USR_SENHA = $_POST["USR_SENHA"];echo $USR_SENHA;}?>">&nbsp;&nbsp;
							<a rel="example_group" href="../Recursos/Imagens/recomendacao.png"> <img
								src="../Recursos/Imagens/duvida.png" width="15" height="15">
						</a></td>
					</tr>
					<tr>
						<td>Confirme a Senha :</td>
						<td><input type="password" name="USR_SENHA2" maxlength="39"
							size="20"
							value="<?php if(isset($_POST["cadastrar"])){  @$USR_SENHA = $_POST["USR_SENHA"];echo $USR_SENHA;}?>">
						</td>
					</tr>
					<tr>
						<td>Digite o Email :</td>
						<td><input type="email" name="USR_EMAIL" maxlength="49" size="20"
							value="<?php  
							if(isset($_POST["cadastrar"])){ 
								@$USR_EMAIL = $_POST["USR_EMAIL"];
							echo $USR_EMAIL; }?>">
						</td>
					</tr>

				</table>
				<table>
					<tr>
						<td>Permissão de Usuários</td>
					</tr>
					<tr>
						<td><input type="checkbox" value="noticia" name="noticia">&nbsp;&nbsp;Noticia&nbsp;
							<input type="checkbox" value="slide" name="slide">&nbsp;&nbsp;Slide&nbsp;
							<input type="checkbox" value="ramal" name="ramal">&nbsp;&nbsp;Funcionario&nbsp;
							<input type="checkbox" value="galeria" name="galeria">&nbsp;&nbsp;Galeria<br>
							<input type="checkbox" value="arquivos" name="arquivos">&nbsp;&nbsp;Formulario&nbsp;
							<input type="checkbox" value="mensagens" name="mensagens">&nbsp;&nbsp;Mensagens&nbsp;
							<input type="checkbox" value="inovacao" name="inovacao">&nbsp;&nbsp;Inovação&nbsp;
							<input type="checkbox" value="integracao" name="integracao">&nbsp;&nbsp;Integração&nbsp;
						</td>
					</tr>
				</table>

				<input type="submit" value="Cadastrar" id="input" name="cadastrar">
				&nbsp;&nbsp;&nbsp; <input type="reset" value="Limpar" id="input"
					name="limpar">




			</form>
			<br>
			
			<?php 
			if(isset($_POST["cadastrar"]) and isset($_POST["USR_NOME"]) and isset($_POST["USR_SENHA"]) and isset($_POST["USR_EMAIL"]) and isset($_POST["USR_NI"])){

				echo "<br><br>";
				//aqui é pego cada variavel informada pelo usuário e validada
				//as permissões são convertidas em 1s e 0s
				//1 significa que o usuário tem acesso
				//0 signica que o usuário não tem acesso
				include "../Conexao.inc";
				$USR_NOME=$_POST["USR_NOME"];
				$USR_NI = $_POST["USR_NI"];
				$USR_SENHA = $_POST["USR_SENHA"];
				$USR_EMAIL = $_POST["USR_EMAIL"];
				@$usuario=$_POST["usuario"];
				@$noticia=$_POST["noticia"];
				@$slide=$_POST["slide"];
				@$ramal=$_POST["ramal"];
				@$galeria=$_POST["galeria"];
				@$arquivos=$_POST["arquivos"];
				@$mensagens = $_POST["mensagens"];
				@$inovacao = $_POST["inovacao"];
				@$integracao = $_POST["integracao"];
				
				if(empty($usuario)){
					$usuario = 0;
				}
				
				if(empty($noticia)){
					$noticia = 0;
				}
				
				if(empty($slide)){
					$slide = 0;
				}
				
				if(empty($ramal)){
					$ramal = 0;
				}
				if(empty($galeria)){
					$galeria = 0;
				}
				if(empty($arquivos)){
					$arquivos = 0;
				}
				if(empty($mensagens)){
					$mensagens = 0;
				}
				if(empty($inovacao)){
					$inovacao = 0;
				}
				if(empty($integracao)){
					$integracao = 0;
				}
				if(!empty($usuario)){
					$usuario = 1;
				}
				if(!empty($noticia)){
					$noticia = 1;
				}
				if(!empty($slide)){
					$slide = 1;
				}
				if(!empty($ramal)){
					$ramal = 1;
				}
				if(!empty($galeria)){
					$galeria = 1;
				}
				if(!empty($arquivos)){
					$arquivos = 1;
				}
				if(!empty($mensagens)){
					$mensagens = 1;
				}
				if(!empty($inovacao)){
					$inovacao = 1;
				}
				if(!empty($integracao)){
					$integracao = 1;
				}
				
				
				echo "";
				$erro = Array(); //Array com os erros encontrados
				//Vamos verificar se existe algum campo não informado
				foreach ($_POST as $chv => $vlr){
					if ($vlr == "" AND substr($chv,0,3)=="USR"){
						$erro[] = "O campo ".substr($chv, 4) ." Não informado.";
				
					}
				}
				if(sizeof($erro)==0){
					//verificamos se a senha estiver ok
					if($_POST["USR_SENHA"]!=$_POST["USR_SENHA2"]){
						$erro[] = "Senha não confere...";
					}
				}
				
				if (sizeof($erro)==0){
					//Mostramos os dados
						
					echo 'Dados informados no Cadastro :<br><br>';
					reset($_POST);
					foreach ($_POST as $chv => $vlr){
						if (substr($chv,0,3)=="USR"){
							echo ucfirst(strtolower(substr($chv,4))).":";
							echo $vlr."<br>" ;
						}
					}
				
					echo "<br>";
						
				}
				else {
					//Mensagem de erro
				
					foreach ($erro as $vlr){
						echo "$vlr<br>";
					}
				
				}
				
				
				$erro = 0;
				
				//empty = verifica se determinada string estiver vazia
				//strlen = retorna o numero de caracteres de uma string
				//strstr = localiza a primeira ocorrencia de uma string . Se nï¿½o encontra-la , retorna falso.
				
				
				if(strlen($USR_NOME)<5)
				{
					echo "O Nome de Usuário deve possuir no mínimo 5 caracteres.<br>";
 		$erro += 1 ;
 	}
 		if(!is_numeric($USR_NI)){
 			echo "O NI deve contar Apenas Numeros.<br>";
 			$erro += 1 ;
 		}
				
				 	if(strlen($USR_SENHA)<5)
				 	{
				 	echo "A Senha deve possuir no mínimo 5 caracteres.<br>";
 		$erro += 1;
 	}
				
 	if($USR_NOME == $USR_SENHA)
				 	{
				 	echo "O Nome de Usuário e a senha devem ser diferentes.<br>";
 		$erro += 1;
 	}
				
				
 	if(strlen($USR_EMAIL)<8 || strstr($USR_EMAIL,'@')==FALSE)
				 	{
				 	echo "Favor digitar seu Email corretamente.<br>";
 		$erro += 1;
 	}
 	$r = mysqli_query($conexao, "SELECT * FROM Usuario");
				 	if($r === FALSE){
 		die(mysql_error());
				
				}
				
				while($row = mysqli_fetch_array($r)){
				
				 	if($row["NI"]==$USR_NI){
				 	echo "Já existe um Usuário com Este Numero de Identificação.<br>";
 			$erro+=1;
				
 		}
				
				
				
				
 	}
				
				
 	if($erro!=0){
				 	echo "<br>";
				 	echo "Os dados não foram enviados corretamente.<br>";
				 	echo "<form action='gestaodeusuarios.php' method='post'>";
				 			echo "<input type='hidden' name='USR_NOME' value='$USR_NOME'>";
				 			echo "<input type='hidden' name='USR_NI' value='$USR_NI'>";
				 			echo "<input type='hidden' name='USR_SENHA' value='$USR_SENHA'>";
				 			echo "<input type='hidden' name='USR_EMAIL' value='$USR_EMAIL'>";
				 			echo "</form>";
 	}
				
				
				
				
 	if($erro==0){
 	function retira_especial($texto)
 	{
 		$array1 = array(   "!", "#", "$", "%", "¨¨", "&", "*", "(", ")", "|", "¹", "²", "³", "£", "¢", "¬", "°","_");
				 		$array2 = array(   "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "",""  );
				 		return str_replace( $array1, $array2, $texto );
				 			}
				 					//aqui é tirado os acentos especiais
				 					//após isso é inserido no banco de dados os valores
				 			$USR_NI = retira_especial($USR_NI);
				 			$USR_NOME = retira_especial($USR_NOME);
				 			$USR_SENHA = retira_especial($USR_SENHA);
				 			$resultado = mysqli_query($conexao,"INSERT INTO Usuario Values('$USR_NI','$USR_NOME','$USR_SENHA','$USR_EMAIL',null,'default.png')");
				 			@$registro = mysqli_fetch_array($resultado);
				 			$resulta = mysqli_query($conexao,"INSERT INTO Permissoes Values('$USR_NI',$usuario,$noticia,$slide,$ramal,$galeria,$arquivos,$mensagens,$inovacao,$integracao)");
				 			@$registr01 = mysqli_fetch_array($resulta);
				 			mysqli_close($conexao);
				 			}
				
				
				 			echo "";
				
			
			}
			
			
			
			if(isset($_POST["alterar"])){
			
				echo "<br><br>";
				include "../Conexao.inc";
				$USR_NI = $_POST["alterar"];
				$USR_NOME=$_POST["USR_NOME"];
				$USR_EMAIL = $_POST["USR_EMAIL"];
				@$usuario=$_POST["usuario"];
				@$noticia=$_POST["noticia"];
				@$slide=$_POST["slide"];
				@$ramal=$_POST["ramal"];
				@$galeria=$_POST["galeria"];
				@$arquivos=$_POST["arquivos"];
				@$mensagens = $_POST["mensagens"];
				@$inovacao = $_POST["inovacao"];
				@$integracao = $_POST["integracao"];
			
				$erro=0;
				if(empty($USR_NI)){
					echo "Informe uma NI Valida.<br>";
					$erro+=1;
				}
				if(empty($USR_NOME)){
					echo "Informe um Nome Valido.<br>";
					$erro+=1;
				}
			
				if(empty($USR_EMAIL)){
					echo "Informe um Email Valido.<br>";
					$erro+=1;
				}
				if($erro!=0){
					echo "<a href='gestaodeusuarios.php'>Voltar</a>";
				}
				else{
			
					//se as checkbox estiverem vázias , o campo recebe 0 , se não , recebe 1
					if(empty($usuario)){
						$usuario = 0;
					}
			
					if(empty($noticia)){
						$noticia = 0;
					}
			
					if(empty($slide)){
						$slide = 0;
					}
			
					if(empty($ramal)){
						$ramal = 0;
					}
					if(empty($galeria)){
						$galeria = 0;
					}
					if(empty($arquivos)){
						$arquivos = 0;
					}
					if(empty($mensagens)){
						$mensagens = 0;
					}
					if(empty($inovacao)){
						$inovacao = 0;
					}
					if(empty($integracao)){
						$integracao = 0;
					}
					if(!empty($usuario)){
						$usuario = 1;
					}
					if(!empty($noticia)){
						$noticia = 1;
					}
					if(!empty($slide)){
						$slide = 1;
					}
					if(!empty($ramal)){
						$ramal = 1;
					}
					if(!empty($galeria)){
						$galeria = 1;
					}
					if(!empty($arquivos)){
						$arquivos = 1;
					}
					if(!empty($mensagens)){
						$mensagens = 1;
					}
					if(!empty($inovacao)){
						$inovacao = 1;
					}
					if(!empty($integracao)){
						$integracao = 1;
					}
			
					function retira_especial($texto)
					{
						$array1 = array(   "!", "#", "$", "%", "¨¨", "&", "*", "(", ")", "|", "¹", "²", "³", "£", "¢", "¬", "°","_");
						$array2 = array(   "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "",""  );
						return str_replace( $array1, $array2, $texto );
					}
					//aqui é retirado caracteres especiais do nome do usuário e após isso é atualizado no banco de dados
					//o que foi informado pelo usuário
					$USR_NOME = retira_especial($USR_NOME);
			
					$resultado = mysqli_query($conexao,"UPDATE Usuario SET Nome = '$USR_NOME' WHERE NI = '$USR_NI'");
					$resultado3 = mysqli_query($conexao,"UPDATE Usuario SET Email = '$USR_EMAIL' WHERE NI = '$USR_NI'");
					@$registro = mysqli_fetch_array($resultado);
					@$registro2 = mysqli_fetch_array($resultado2);
					@$registro3 = mysqli_fetch_array($resultado3);
					$r2 = mysqli_query($conexao,"UPDATE Permissoes  SET noticia = $noticia WHERE NI = '$USR_NI'");
					$r3 = mysqli_query($conexao,"UPDATE Permissoes SET slide = $slide WHERE NI = '$USR_NI'");
					$r4 = mysqli_query($conexao,"UPDATE Permissoes SET ramal = $ramal WHERE NI = '$USR_NI'");
					$r5 = mysqli_query($conexao,"UPDATE Permissoes SET Galeria = $galeria WHERE NI = '$USR_NI'");
					$r6 = mysqli_query($conexao,"UPDATE Permissoes  SET Arquivos = $arquivos WHERE NI = '$USR_NI'");
					$r7 = mysqli_query($conexao,"UPDATE Permissoes  SET Mensagens = $mensagens WHERE NI = '$USR_NI'");
					$r8 = mysqli_query($conexao,"UPDATE Permissoes  SET Inovacao = $inovacao WHERE NI = '$USR_NI'");
					$r9 = mysqli_query($conexao,"UPDATE Permissoes  SET Integracao = $integracao WHERE NI = '$USR_NI'");
					@$re1 = mysqli_fetch_array($r1);
					@$re2 = mysqli_fetch_array($r2);
					@$re3 = mysqli_fetch_array($r3);
					@$re4 = mysqli_fetch_array($r4);
					@$re5 = mysqli_fetch_array($r5);
					@$re6 = mysqli_fetch_array($r6);
					@$re7 = mysqli_fetch_array($r7);
					@$re8 = mysqli_fetch_array($r8);
					@$re9 = mysqli_fetch_array($r9);
					echo "<div style='width:400px;height:200px;position:absolute;left:50%;top:5%;padding:10px;border:2px solid black;border-radius:10px;'>";
					echo "<div style='background:#333;height:50px;text-align:center;color:white;'><b><br>Dados Informados :</b></div><br>";
					echo "NI:".$USR_NI."<br>";
					echo "Nome:".$USR_NOME."<br>";
			
					echo "Email:".$USR_EMAIL."<br>";
			
					echo "Dados Enviados e Alterados Corretamente.";
					echo "</div>";
				}
			
			}
			
			
			
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
			$ni = $_POST["pega"];
				
			if (empty ( $ni )) {
			echo "Por Favor Digite o Numero de Identificação Corretamente.";
				} else {
					@session_start ();
					$nome_usuario = $_SESSION ["nome_usuario"];
					$resultado1 = mysqli_query ( $conexao, "SELECT * FROM Usuario WHERE NI=$nome_usuario" );
					@$query = mysqli_query ( $conexao, $resultado1 );
					
					while ( $row = mysqli_fetch_array ( $resultado1 ) ) {
							
						$nomedousuario = $row ["Nome"];
					}
					$r1 = mysqli_query($conexao,"SELECT * FROM Noticia WHERE autor='$ni'");
					while ( $row = mysqli_fetch_array ( $r1 ) ) {
						$titulo = $row ["Titulo"];
						$descricao = $row ["Descricao"];
						$data = $row ["Data_post"];
						$imagem = $row ["Imagem"];
						$autor = $row ["autor"];
						$autor = $row["autorvdd"];
						$texto = $row ["Texto"];
						$dataexclusao = date ( 'Y-m-d' );
						$datafinal = date( 'Y-m-d', strtotime("+365 days") );
						
					}
					
				
					$coloca = mysqli_query($conexao,"UPDATE Noticia set autor = 1 WHERE autor='$ni'");
					$coloca1 = mysqli_query($conexao,"UPDATE LixeiraNoticia set autor = 1 WHERE autor='$ni'");
					$coloca2 = mysqli_query($conexao,"UPDATE LixeiraInovacao set autor = 1 WHERE autor='$ni'");
					$coloca3 = mysqli_query($conexao,"UPDATE Slider set autor = 1 WHERE autor='$ni'");
					$coloca4 = mysqli_query($conexao,"UPDATE link set autor = 1 WHERE autor='$ni'");
					$coloca5 = mysqli_query($conexao,"UPDATE formularios set autor = 1 WHERE autor='$ni'");
					$coloca6 = mysqli_query($conexao,"UPDATE destaque set autor = 1 WHERE autor='$ni'");
					$coloca7 = mysqli_query($conexao,"UPDATE Integracao set autor = 1 WHERE autor='$ni'");
					
					$resultado = mysqli_query($conexao,"DELETE FROM Usuario WHERE NI='$ni'");
							@$registro = mysqli_fetch_array($resultado);
							echo "Usuario Excluido Com Sucesso!<br>";
				}
			}
			
			if(isset($_POST["resetar"])){
				echo "<br><br>";
				include "../Conexao.inc";
				$reset = $_POST["resetar"];
				$resultado = mysqli_query($conexao,"UPDATE Usuario SET Senha = 'senaisp' WHERE NI = '$reset'");
				@$registro = mysqli_fetch_array($resultado);
				echo "<div style='width:400px;height:100px;background:lightgrey;position:fixed;left:35%;top:40%;padding:10px;border:2px solid black;border-radius:10px;'>";
				echo "<b>Atualizar Senha para senaisp:</b>";
				echo "<form method='post'><input type='submit' value='Ok' id='input'>";
				echo '&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" value="Cancelar" id="input" name="nao"></form>';
				echo "</div>";
			}
			
			?>
			
			
			<br> <br> <br>
			<table border='1' width="110%">
				<thead>
					<tr>
						<th><b>NI</b>&nbsp;&nbsp;</th>
						<th><b>Nome</b></th>
						<th><b>Email</b></th>
						<th><b>Permissões</b></th>
						<th><b>Ações</b></th>
					</tr>
				</thead>
				<tr>
 	
 	
 	
 	<?php
		// aqui são mostrados os usuário que são cadastrados
		// se o valor do checkbox estiver igual a 1 no banco de dados
		// ele estará marcado , caso contrario , ele não estará marcado
		include "../Conexao.inc";
		$resultado = mysqli_query ( $conexao, "SELECT * FROM Usuario,Permissoes WHERE (Usuario.NI=Permissoes.NI)" );
		if ($resultado === FALSE) {
			die ( mysql_error () );
		}
		
		while ( $row = mysqli_fetch_array ( $resultado ) ) {
			echo "<form action='' method='post' name=''>";
			echo "<td><div style='width:70px;word-wrap: break-word;' >$row[NI]</div></td>";
			echo "<td>";
			echo "<input type='text' name='USR_NOME' value='$row[Nome]'  maxlength='100' size='15'></td>";
			echo "<td><input type='text' name='USR_EMAIL' value='$row[Email]' maxlength='100' size='15'></td>";
			echo "<td>";
			if ($row ['noticia'] == 1) {
				echo "<input type='checkbox' name='noticia' checked>" . "Noticia ";
			} elseif ($row ['noticia'] == 0) {
				echo "<input type='checkbox' name='noticia'>" . "Noticia ";
			}
			;
			if ($row ['slide'] == 1) {
				echo "<input type='checkbox' name='slide' checked>" . "Slide ";
			} elseif ($row ['slide'] == 0) {
				echo "<input type='checkbox' name='slide'>" . "Slide ";
			}
			;
			if ($row ['ramal'] == 1) {
				echo "<input type='checkbox' name='ramal' checked>" . "Funcionarios<br> ";
			} elseif ($row ['ramal'] == 0) {
				echo "<input type='checkbox' name='ramal'>" . "Funcionarios<br>  ";
			}
			;
			if ($row ['Galeria'] == 1) {
				echo "<input type='checkbox' name='galeria' checked>" . "Galeria ";
			} elseif ($row ['Galeria'] == 0) {
				echo "<input type='checkbox' name='galeria'>" . "Galeria ";
			}
			;
			if ($row ['Arquivos'] == 1) {
				echo "<input type='checkbox' name='arquivos' checked>" . "Formularios <br>";
			} elseif ($row ['Arquivos'] == 0) {
				echo "<input type='checkbox' name='arquivos'>" . "Formulários <br>";
			}
			;
			if ($row ['Mensagens'] == 1) {
				echo "<input type='checkbox' name='mensagens' checked>" . "Mensagens ";
			} elseif ($row ['Mensagens'] == 0) {
				echo "<input type='checkbox' name='mensagens'>" . "Mensagens ";
			}
			;
			if ($row ['Inovacao'] == 1) {
				echo "<input type='checkbox' name='inovacao' checked>" . "Inovação <br>";
			} elseif ($row ['Inovacao'] == 0) {
				echo "<input type='checkbox' name='inovacao'>" . "Inovação <br>";
			}
			;
			if ($row ['Integracao'] == 1) {
				echo "<input type='checkbox' name='integracao' checked>" . "Integração ";
			} elseif ($row ['Integracao'] == 0) {
				echo "<input type='checkbox' name='integracao'>" . "Integração ";
			}
			echo "<td>";
			if($row["usuario"]==0){
			echo "<input type='image' src='../Recursos/Imagens/salvar.png' width='16' height='16' name='alterar' value='$row[NI]'>&nbsp;&nbsp;&nbsp;";
			}
			echo "<input type='image' src='../Recursos/Imagens/chave.png' width='16' height='16' name='resetar' value='$row[NI]'>&nbsp;&nbsp;&nbsp;";
  			if($row["usuario"]==0){
  			echo "<input type='image' src='../Recursos/Imagens/delecao.png' width='16' height='16' name='deletar' value='$row[NI]'></td>";
			}
  			echo "</form></tr>";
		}
		
		mysqli_close ( $conexao );
		
		?>
  
			
			
			
			</table>


		</div>
		<br> <br> <br>
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