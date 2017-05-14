<!-- Arquivo responsavel pela conexão do banco de dados
abaixo é informado o host , o usuário e a senha
também é informado o banco de dados que será conectado -->
<?php


$conexao = mysqli_connect('localhost','root','');
if(!$conexao){
	die('Não foi possivel conectar ...'.mysql_error());
}


mysqli_select_db($conexao,"intranet0");




?>

