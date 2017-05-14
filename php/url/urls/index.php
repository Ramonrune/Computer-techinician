<?php
require "classes/Url.php";
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pt-br">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Trabalhando com URL amigável no PHP</title>
    <meta name="author" content="Layout: Mauricio Samy Silva / Código: Eduardo Kraus" />
    <link rel="stylesheet" type="text/css" href="<?php echo URL::getBase() ?>css/style.css"/>
</head>
<body>
<div id="tudo">
    <div id="topo">TOPO</div>
    <div id="principal">
        <?php
        $modulo = Url::getURL( 0 );

        if( $modulo == null )
            $modulo = "modulo1";

        if( file_exists( "modulos/" . $modulo . ".php" ) )
            require "modulos/" . $modulo . ".php";
        else
            require "modulos/404.php";
        ?>
    </div>
    <div id="navegacao">
        <p><a href="<?php echo URL::getBase(); ?>modulo1">Módulo 1</a></p>
        <p><a href="<?php echo URL::getBase(); ?>modulo2">Módulo 2</a></p>
        <p><a href="<?php echo URL::getBase(); ?>modulo3">Módulo 3</a></p>
        <p><a href="<?php echo URL::getBase(); ?>modulo4">Módulo 4</a></p>
        <p><a href="<?php echo URL::getBase(); ?>modulo5">Módulo 5</a></p>
        <p><a href="<?php echo URL::getBase(); ?>modulo6">Módulo 6</a></p>
        <p><a href="<?php echo URL::getBase(); ?>modulo7">Módulo 7</a></p>
        <p><a href="<?php echo URL::getBase(); ?>modulo8/parametro/sei-la/alguma_coisa/25/quase-nada">
            Módulo 8 com sub-módulo</a></p>
        <p><a href="<?php echo URL::getBase(); ?>qualquer">Módulo 404</a></p>
        <p><a href="<?php echo URL::getBase(); ?>teste.php">Teste.php</a></p>
    </div>
    <div id="rodape">RODAPE</div>
</div>
</body>
</html>