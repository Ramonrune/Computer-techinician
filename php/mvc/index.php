<?php
require_once 'View/view_formularios.php';
$model = new ModelFormulario();
$controller = new ControllerFormularios($model);
$view = new View_Formulario($model, $controller);
$controller->carrega_formulario();
?>