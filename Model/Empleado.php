<?php namespace Model;
	class Empleado{

		private $idEmpleado;
		private $idUser;
		private $cedula;
		private $nombre;
		private $apellido;
		private $email;
		private $telefono;
		private $sexo;
        private $estado;

		public function __construct(){
			$this->con= new conexion();
		}

        /**
         * @return mixed
         */
        public function getIdEmpleado()
        {
            return $this->idEmpleado;
        }

        /**
         * @param mixed $idEmpleado
         */
        public function setIdEmpleado($idEmpleado)
        {
            $this->idEmpleado = $idEmpleado;
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
        public function getCedula()
        {
            return $this->cedula;
        }

        /**
         * @param mixed $cedula
         */
        public function setCedula($cedula)
        {
            $this->cedula = $cedula;
        }

        /**
         * @return mixed
         */
        public function getNombre()
        {
            return $this->nombre;
        }

        /**
         * @param mixed $nombre
         */
        public function setNombre($nombre)
        {
            $this->nombre = $nombre;
        }

        /**
         * @return mixed
         */
        public function getApellido()
        {
            return $this->apellido;
        }

        /**
         * @param mixed $apellido
         */
        public function setApellido($apellido)
        {
            $this->apellido = $apellido;
        }

        /**
         * @return mixed
         */
        public function getEmail()
        {
            return $this->email;
        }

        /**
         * @param mixed $email
         */
        public function setEmail($email)
        {
            $this->email = $email;
        }

        /**
         * @return mixed
         */
        public function getTelefono()
        {
            return $this->telefono;
        }

        /**
         * @param mixed $telefono
         */
        public function setTelefono($telefono)
        {
            $this->telefono = $telefono;
        }

        /**
         * @return mixed
         */
        public function getSexo()
        {
            return $this->sexo;
        }

        /**
         * @param mixed $sexo
         */
        public function setSexo($sexo)
        {
            $this->sexo = $sexo;
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


		public function listar(){
                $sql = "SELECT e.idEmpleado, e.idUser, e.cedulaEmpleado, e.apellidoEmpleado, e.nombreEmpleado,e.correoEmpleado, u.estado  
                        FROM empleado AS e
                        INNER JOIN usuario AS u ON u.idUser = e.idUser";
			$datos = $this->con->consultaRetorno($sql);
			return $datos;
		}

		public function listarComplex($identi){
            $sql = "SELECT e.idEmpleado, e.idUser, e.cedulaEmpleado, e.nombreEmpleado, e.apellidoEmpleado, e.correoEmpleado,
                    e.telefonoEmpleado, e.sexoEmpleado, u.login, u.estado, r.idRol,r.nombreRol, d.idDepen,d.nombreDepen
                    FROM empleado AS e
                    INNER JOIN usuario AS u ON u.idUser = e.idUser 
                    INNER JOIN rol AS r ON u.idRol = r.idRol
                    INNER JOIN dependencia AS d ON e.idEmpleado = d.idEmpleado
                    WHERE e.idEmpleado = '{$identi}' ";
            $datos = $this->con->consultaRetorno($sql);
            return $datos;
        }

		public function add(){
			$sql = "INSERT INTO empleado(idUser, cedulaEmpleado, nombreEmpleado, apellidoEmpleado, correoEmpleado, telefonoEmpleado, sexoEmpleado) 
            VALUES ('{$this->idUser}','{$this->cedula}','{$this->nombre}','{$this->apellido}','{$this->email}','{$this->telefono}','{$this->sexo}')";
			return $this->con->consultaRetorno($sql);
		}


		public function edit(){
			$sql = "UPDATE empleado SET nombreEmpleado='{$this->nombre}',apellidoEmpleado='{$this->apellido}',telefonoEmpleado='{$this->telefono}' 
            WHERE idEmpleado = '{$this->idEmpleado}'";
			$this->con->consultaSimple($sql);
		}


		public function view(){
			$sql = "SELECT * FROM empleado WHERE idEmpleado = '{$this->idEmpleado}'";
			$datos = $this->con->consultaRetorno($sql);
			$row = mysqli_fetch_assoc($datos);
			return $row;
		}

        public function ultimo(){
            $sql = "SELECT MAX(idEmpleado) AS idEmpleado FROM empleado";
            $datos = $this->con->consultaRetorno($sql);
            $datos = $datos->fetch_array();
            return $datos[0];
        }
	}
?>