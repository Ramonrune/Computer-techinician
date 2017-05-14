<?php
require_once 'Model/model_formularios.php';

class ControllerFormularios{
	private $model;
	
	public function __construct(ModelFormulario $model){
		$this->model = $model;
		
	}
	public function carrega_formulario(){
		$this->model->Carregar();
	}
	
	public function insere_formulario(){
		$this->model->Inserir();
	}
	
}