<?php
//arquivo utilizado para a validaÃ§Ã£o de cada pÃ¡gina 
$temposessao = 3600;
@session_start();
if ($_SESSION["sessiontime"]) {
	if ($_SESSION["sessiontime"] < (time() - $temposessao)) {
		session_unset();
		echo "Seu tempo Expirou!";
		header("location:../index.php");
	}
} else {
	session_unset();

}

$_SESSION["sessiontime"] = time();
if(IsSet($_SESSION["nome_usuario"])){
	$nome_usuario = $_SESSION["nome_usuario"];
}
if(IsSet($_SESSION["senha_usuario"])){
	$senha_usuario = $_SESSION["senha_usuario"];
}

if(!(empty($nome_usuario) or empty($senha_usuario)))
{
	include "../Conexao.inc";
	$resultado = mysqli_query($conexao, "SELECT * FROM Usuario where NI='$nome_usuario'");
	if(mysqli_num_rows($resultado)==1){
		$linha = mysqli_fetch_array($resultado);
		if($senha_usuario!=$linha["Senha"]){
			$_SESSION["nome_usuario"];
			$_SESSION["senha_usuario"];
			echo "Você não efetuou o LOGIN!";
			header("location:login.php");
			exit;
		}
	}
	else{
		$_SESSION["nome_usuario"];
		$_SESSION["senha_usuario"];
		echo "Vocêo efetuou o LOGIN!";
		header("location:login.php");
		exit;
	}
	
}
else{
	echo "VocÃª nÃ£o efetuou o LOGIN";
	header("location:login.php");
	exit;
}
mysqli_close($conexao);
?>
