<?php namespace Controllers;
	
	use Views\mainViews as vm;
	use Controllers\userController as user;
	use Controllers\login as loger;
	
	class homeController{
		
		public static function index(){

				$vista = new vm();
				$vista->mostrar("login");
		}


        public function login($arg){

            $obj = new loger($arg);
            $err=$obj->error;

            switch($err){
                case 1:
                    echo "El campo de usuario esta vacio.";
                    break;

                case 2:
                    echo "El campo de contraseña esta vacio";
                    break;

                case 3:
                    echo "Error en base de datos.";
                    break;

                case 4:
                    echo "Contraseña incorrecta.";
                    break;

                case 5:
                    echo "Usuario no habilitado";
                    break;

                case 6:
                    echo "El usuario no existe";
                    break;

                case 7:
                    echo "Error en la base de datos";
                    break;

                case 0:
                    echo "1";
                    break;
            }
        }

		public function logout(){
            // delete the session of the user
            $_SESSION = array();
            session_destroy();
            header("Location: /");

        }
	}


	
?>