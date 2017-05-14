<?php
//arquivo utilizada para a validação da galeria
include "../Conexao.inc";
@session_start();
if(IsSet($_SESSION["nome_usuario"])){
	$nome_usuario = $_SESSION["nome_usuario"];
}
$resultado = mysqli_query($conexao,"SELECT * FROM Permissoes WHERE NI=$nome_usuario");


@$query = mysqli_query($conexao,$resultado);

while($row = mysqli_fetch_array($resultado)){

	$galeria = $row["Galeria"];

}

if($galeria!=1){
	header("location:login.php");
	exit;
}


mysqli_close($conexao);

?>

