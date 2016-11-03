<!<?php 

class TesteController extends Controller{
	
	public function index(){
		echo "Testando index!";
	}

	public function acao(){
		$v = new View("teste/acao");
		//$v->add_variable("fruta", $this->get_parameter()); 
		$c = $this->load_model("Carro");
		$c->setRoda(20);

		$v->add_variable("Carro", $c);
		$v->show();


		//$id = $this->get_parameter(0);
	
	}
}