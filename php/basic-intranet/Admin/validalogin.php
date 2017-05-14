<html>
<head>
<title>Login</title>
<!--Index do html
Projeto Intranet Senai
Data: 26/02/2014
-->
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="UTF-8">
<link rel="icon" href="../Recursos/Imagens/icon.png">
<link rel ="stylesheet" type="text/css" href="../Layout/estilo.css">
<script src="../Recursos/jquery/jquerymenu.js"></script>
</head>
	<body style="min-width: 1000px;
	max-width: 2000px;height:300px;">
	<!--Esta é a parte do cabeçalho do código -->
	<?php 
	include "cabecalho2.php";
	?>
<br>
	<br>
	<br>
	<div style="position:absolute;">
	<img src="../Recursos/Imagens/imagemlogin.png" width="100%" height="675px">
	</div>
	<div style="position: relative;
	top: 30%;
	margin: 0 auto;
	min-width: 1000px;
	max-width: 1000px;
	height:240px;">
	
	<br>
	<!-- Espaço de login e a área de login -->
	<div id="espacologin">
	<div id="arealogin">
	<br><br>
	Bem Vindo a Área de Intranet
	<br>
	<img src="../Recursos/Imagens/logo.png">
	<br>
	<br>
		<?php 
		//aqui é pego o ni e a senha do usuário e a variavel é filtrada , se os dados estiverem corretos , a sessão será iniciada
	include "../Conexao.inc";
	$usuario = $_POST["ni"];
	$senha = $_POST["senha"];
	
	$resultado = mysqli_query($conexao, "SELECT * FROM Usuario WHERE NI='$usuario'");
	$linhas = mysqli_num_rows($resultado);
	if($linhas==0)
	{
		echo "Usuário não Encontrado!<br>";
		echo "<a href=\"login.php\">Voltar</a>";
	}else{
		$result = mysqli_query($conexao, "SELECT * FROM Usuario WHERE Senha='$senha'");
		$linhas = mysqli_num_rows($result);
		if($linhas==0){
			
			echo "Senha não Encontrada!<br>";
			echo "<a href=\"login.php\">Voltar</a>";
			
		}else{			
			@session_start();
			$_SESSION['nome_usuario']="$usuario";
			$_SESSION['senha_usuario']="$senha";
			$_SESSION["sessiontime"] = time();
			header("location:administrador.php?id=1");
			
		}
	}

	?>
	
	</div>
	
	
	</div>
	
	</div>
	<!--Parte responsavel pelo rodapé do site -->
	<br><br>
	<div id="rodape" align="center">
	<address>
	
	Rua Vereador Sergio Leopoldino Alves, 500 - Cidade Industrial<br>
	CEP: 13456-166 - Santa Bárbara d'Oeste - SP<br>
	Telefone: (19) 3499-1450 - senaisantabarbara@sp.senai.br
	<br>
	
	©2015 - 2015 CFP 5.14 - Todos os direitos reservados
	</address>
	
	</div>
	

	</body>
</html>