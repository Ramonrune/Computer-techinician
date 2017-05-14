<?php
require_once 'Model/model_formularios.php';
require_once 'Controller/controller_formularios.php';


class View_Formulario{
	private $controller;
	private $model;
	
	public function __construct(ModelFormulario $model,ControllerFormularios $controller){
		$this->model = $model;
		$this->controller = $controller;
		?>
		<form method="post" action=""
						enctype="multipart/form-data">
						<table>
							<tr>
								<td>Digite o Nome :</td>
								<td><input type="text" name="nome" size="20" maxlength="120"></td>
							</tr>
							<tr>
								<td>Digite a Referência :</td>
								<td><input type="text" name="referencia" size="20" maxlength="10">
								</td>
							</tr>
							<tr>
								<td>Selecione o Formulario:</td>
								<td><input type="file" name="img[]"></td>
							</tr>
						</table>
						<br> <input type="reset" value="Limpar" id="input" name="limpar">
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="submit"
							value="Inserir" id="input" name="upload">
		
		
		
		
					</form>
		<?php 
	


				
			
				if(isset($_POST["upload"])){
					$this->controller->insere_formulario();
					
	
	}
	}
}