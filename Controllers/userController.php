<?php namespace Controllers;
	use Views\mainViews as vm;

	
	class userController{
		
		public function index(){
			$rol=$_SESSION['user_rol'];

			$view = new vm();
			$view->mostrar($rol . "/index");
		}

		public function vista($vist){
			$rol = $_SESSION['user_rol'];
			$str = $rol . "/" . $vist;

			$view = new vm();
			$view->mostrar($str);
		}

	}	
?>