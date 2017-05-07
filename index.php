<?php
	//Se inicia la sesion al comienzo del programa
	session_start();

	define('DS', DIRECTORY_SEPARATOR);
	define('ROOT', realpath(dirname(__FILE__)) . DS);
    define('DIR', 'http://localhost/');

	//Llama la clase autoload
	require_once "Config/Autoload.php";
	//ejecuta el autoload
	Config\Autoload::run();
	//Ejecuta las acciones de la clase Router, encargada de las rutas amigables
	new Config\Router();
?>