<?php namespace Model;
	class User{
		private $idUser;
		private $idRol;
		private $login;
		private $clave;
		private $estado;
		private $fechaRegistro;
		private $session;

		public function __construct(){
			$this->con= new conexion();
		}

        /**
         * @return mixed
         */
        public function getIdUser()
        {
            return $this->idUser;
        }

        /**
         * @param mixed $idUser
         */
        public function setIdUser($idUser)
        {
            $this->idUser = $idUser;
        }

        /**
         * @return mixed
         */
        public function getIdRol()
        {
            return $this->idRol;
        }

        /**
         * @param mixed $idRol
         */
        public function setIdRol($idRol)
        {
            $this->idRol = $idRol;
        }

        /**
         * @return mixed
         */
        public function getLogin()
        {
            return $this->login;
        }

        /**
         * @param mixed $login
         */
        public function setLogin($login)
        {
            $this->login = $login;
        }

        /**
         * @return mixed
         */
        public function getClave()
        {
            return $this->clave;
        }

        /**
         * @param mixed $clave
         */
        public function setClave($clave)
        {
            $this->clave = $clave;
        }

        /**
         * @return mixed
         */
        public function getEstado()
        {
            return $this->estado;
        }

        /**
         * @param mixed $estado
         */
        public function setEstado($estado)
        {
            $this->estado = $estado;
        }

        /**
         * @return mixed
         */
        public function getFechaRegistro()
        {
            return $this->fechaRegistro;
        }

        /**
         * @param mixed $fechaRegistro
         */
        public function setFechaRegistro($fechaRegistro)
        {
            $this->fechaRegistro = $fechaRegistro;
        }

        /**
         * @return mixed
         */
        public function getSession()
        {
            return $this->session;
        }

        /**
         * @param mixed $session
         */
        public function setSession($session)
        {
            $this->session = $session;
        }

		public function listar(){
			$sql = "SELECT * FROM usuario";
			$datos = $this->con->consultaRetorno($sql);
			return $datos;
		}

		public function add(){
			$sql = "INSERT INTO usuario(idRol, login, clave, fechaRegistro) VALUES ('{$this->idRol}','{$this->login}','{$this->clave}', NOW())";
			return $this->con->consultaRetorno($sql);
		}


		public function activate(){
			$sql = "UPDATE usuario SET estado='{$this->estado}' WHERE idUser= '{$this->idUser}'";
			return $this->con->consultaRetorno($sql);
		}

        public function updatePass(){
            $sql = "UPDATE usuario SET clave ='{$this->clave}' WHERE idUser= '{$this->idUser}'";
            return $this->con->consultaRetorno($sql);
        }

		public function edit_session(){
			$sql = "UPDATE usuario SET session= '{$this->session}' WHERE idUser= '{$this->idUser}'";
			$this->con->consultaSimple($sql);
		}

		public function view(){
			$sql = "SELECT * FROM usuario WHERE idUser='{$this->idUser}'";
			$datos = $this->con->consultaRetorno($sql);
			$row = mysqli_fetch_assoc($datos);
			return $row;
		}

        public function ultimo(){
            $sql = "SELECT MAX(idUser) AS idUSer FROM usuario";
            $datos = $this->con->consultaRetorno($sql);
            $datos = $datos->fetch_array();
            return $datos[0];
        }

	}
?>