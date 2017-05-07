<?php namespace Views;

	class mainViews{
		public function __construct(){
			include("header.php");
		}

		public function __destruct()
        {
            include("js.php");
        }

        public function mostrar($vista){
			if(strpos($vista,"login") === false){
				$b = abs(strpos($vista,"/"));
				$rol = substr($vista, 0,	$b) . "/menu";
				$rol = str_replace("\\", "/", $rol); 
				$vis = str_replace("\\", "/", $vista);
				include($rol . ".php");
				include($vis . ".php");
				
			}else{
				include($vista . ".php");
			}
		}
	}
?>