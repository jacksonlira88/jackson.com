<?php
if(!defined('ABSPATH')) // 
	exit;

session_start();

if(!defined('DEBUG') || DEBUG == false){
	@error_reporting(0);
	ini_set("display_errors", 0)

}else{
	@error_reporting(E_ALL);
	ini_set("display_errors", 1)
}


required_once  ABSPATH.'/functions/local.php'; 

$mvc = new MVC(); // classe que inicializa framework