<?php
//classe responsável em carregar as visões
class View(){

	private $path;

	public function __construct($path)
	{
		$this->path = $path;
	}

	public function show(){
		$abs_path = ABSPATH."/view/".$this->$path.".php";

		// Testar se a view existe

		if (file_exists($abs_path)) {
			require_once $abs_path;
			return;
		}
		require_once ABSPATH."/includes/404.php";

	}

	//método que crie uma variável para essa classe dinamicamente

	public function add_variable($name, $value){
		// TRANSFORMAR STRING EM MÉTODO
		$this->{$name} = $value;
	}
}