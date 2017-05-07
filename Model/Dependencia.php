<?php namespace Model;
	
	class Dependencia{
		private $idDependencia;
		private $idEmpleado;
		private $nombre;
		private $direccion;
		private $telefono;
        private $estado;

		public function __construct(){
			$this->con= new conexion();
		}

        /**
         * @return mixed
         */
        public function getIdDependencia()
        {
            return $this->idDependencia;
        }

        /**
         * @param mixed $idDependencia
         */
        public function setIdDependencia($idDependencia)
        {
            $this->idDependencia = $idDependencia;
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
        public function getDireccion()
        {
            return $this->direccion;
        }

        /**
         * @param mixed $direccion
         */
        public function setDireccion($direccion)
        {
            $this->direccion = $direccion;
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
			$sql = "SELECT * FROM dependencia";
			$datos = $this->con->consultaRetorno($sql);
			return $datos;
		}

        public function listarVacia(){
            $sql = "SELECT idDepen,nombreDepen FROM dependencia WHERE idEmpleado IS NULL ";
            $datos = $this->con->consultaRetorno($sql);
            return $datos;
        }

		public function add(){
			$sql = "INSERT INTO dependencia(nombreDepen, direccionDepen, telefonoDepen) VALUES ('{$this->nombre}','{$this->direccion}','{$this->telefono}')";
			return $this->con->consultaRetorno($sql);
		}

		public function activate(){
			$sql = "UPDATE dependencia SET estadoDepen = '{$this->estado}' WHERE idDepen = '{$this->idDependencia}'";
			return $this->con->consultaRetorno($sql);
		}

		public function update(){
			$sql = "UPDATE dependencia SET nombreDepen= '{$this->nombre}',direccionDepen='{$this->direccion}',telefonoDepen='{$this->telefono}' WHERE idDepen = '{$this->idDependencia}'";
			return $this->con->consultaRetorno($sql);
		}

        public function nullDepen(){
            $sql = "UPDATE dependencia SET idEmpleado = null WHERE idEmpleado = '{$this->idEmpleado}'";
            return $this->con->consultaRetorno($sql);
        }

        public function editEmpleado(){
            $sql = "UPDATE dependencia SET idEmpleado = '{$this->idEmpleado}' WHERE idDepen = '{$this->idDependencia}'";
            return $this->con->consultaRetorno($sql);
        }

		public function view(){
			$sql = "SELECT * FROM dependencia WHERE idDepen = '{$this->idDependencia}'";
			$datos = $this->con->consultaRetorno($sql);
			$row = mysqli_fetch_assoc($datos);
			return $row;
		}
	}
?>