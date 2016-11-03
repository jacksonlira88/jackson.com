<!<?php 

class Controller{

	private $parameters;

	private fuinction __construct($parameters){
		$this->parameters = $parameters;
	}

	public function get_paramter($index){
		if (isset($this->parameters[$index]) && !empty($this->parameters[$index])) {
			return $this->parameters[$index];
			# code...
		}

		return null;
	}

	// carregando modelo
	public function load_model($model){
		$model_name =  ucfirst(strtolower($model));
		$model_path = ABSPATH."/models/".$model_name.".class.php";
		
		if (file_exists($model_path)) {
			require_once $model_path;
			if (class_exists($model_name)) {
				return new $model_name(); // se classe existe,retorna a classe
			}
		}

		return null;
	}
}