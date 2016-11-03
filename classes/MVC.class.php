<?php
//não precisa fechar, só php puro




/**
* definindo class MVC,responsável por carregar o framework e executá-lo. Quebra controller para controllor e ação para action 
* controller/action/par/par/par. Controllor vira classe e action vira métodos o resto fira atributos
* @author Jarquison
*/
class MVC
{
	private $controller;
	private $action;
	private $parameters;

	private $not_found = "/includes/404.php";

	//construtor
	public function __construct()
	{
		this->get_url_data();

		if (!$this->controller) {
			requare_once ABSPAHT."/controllers/HomeController.class.php";
			this->controllers = new HomeController($this->parameters);
			this->controller->index();
			return;
		}

		// tratando se livro existe e não existe
		if (!file_exists(ABSPAHT.'/controllers'.$this->controller.'calss.php')) {
			requare_once ABSPAHT.$this->not_found;
			return;
		}
		//se existe importe para classe
		requare_once ABSPAHT.'/controllers'.$this->controller.'calss.php';

		// checar se classe nãoe existe existe
		if (!class_exists($this->controller)) {
			requare_once ABSPAHT.$this->not_found;
			return;
		}

		//estanciando um objeto. passando um string estancia uma classe
		$this->controller =  new $this->controller($this->parameters);


		if (!$this->action && method_exists($this->controller, 'index')) {
			$this->controller->index();
			return;
		}

		if (method_exists($this->controller, $this->action)) {
			$this->controller->{$this->action}();
			return;
		}
		requare_once ABSPAHT.$this->not_found;
	
	}




	//Tratando a url
	public function get_url_data()
	{
		if(isset($_GET['path'])){
			$path = $_GET['path'];

			$path = rtrim($path, '/');

			$path = filter_var($path, FILTER_SANITIZE_URL); // TRATANDO CARACTERES INLEGAIS EM LEGAIS

			$path = explode('/', $path);

			//configura os atributos, e tratando.
			$this->controller = (isset($path[0]) && empty($path[0])) ? ucfirst(strtolower($path[0])) : null;
			$this->controller .= "Controllor";
			$this->action = (isset($path[1]) && empty($path[1])) ? strtolower($path[1]) : null;

			if (isset($path[2]) && !empty($path[2])) {
				unset($path[o]);
				unset($path[1]);

				this->parameters = array_values($path);

			}
		}
	}
}
