<?php
//aqui o usuário faz o logout
session_start();
unset($_SESSION["nome_usuario"]);
unset($_SESSION["senha_usuario"]);

header("location:../index.php");

?>