<?php

function __autoload($class_name){ ////ṕuchar metodos para tivar instância

	$file = ABSPATH.'/classes/'.$class_name.'.class.php';

	if(file_exists($file)){
		require_once $file; //carrega o escript, mais seguro
	}else{
		require_once ABSPATH.'/includes/404.php'; // da erro 404
	}
}