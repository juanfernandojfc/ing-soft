<?php namespace Model;
	
	class Proveedor{
		private $idProveedor;
		private $nit;
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
        public function getIdProveedor()
        {
            return $this->idProveedor;
        }

        /**
         * @param mixed $idProveedor
         */
        public function setIdProveedor($idProveedor)
        {
            $this->idProveedor = $idProveedor;
        }

        /**
         * @return mixed
         */
        public function getNit()
        {
            return $this->nit;
        }

        /**
         * @param mixed $nit
         */
        public function setNit($nit)
        {
            $this->nit = $nit;
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
			$sql = "SELECT * FROM proveedor";
			$datos = $this->con->consultaRetorno($sql);
			return $datos;
		}

        public function listarSelect(){
            $sql = "SELECT idProv, nombreProv FROM proveedor WHERE estadoProv = 'ACTIVO'";
            $datos = $this->con->consultaRetorno($sql);
            return $datos;
        }

        public function showRef(){
            $sql = "SELECT nit FROM proveedor WHERE idProv = '{$this->idProveedor}'";
            $datos = $this->con->consultaRetorno($sql);
            return $datos;
        }

		public function add(){
			$sql = "INSERT INTO proveedor(nit, nombreProv, direccionProv, telefonoProv) VALUES ('{$this->nit}','{$this->nombre}','{$this->direccion}','{$this->telefono}')";
			return $this->con->consultaRetorno($sql);
		}

        public function update(){
            $sql = "UPDATE proveedor SET nit = '{$this->nit}', nombreProv = '{$this->nombre}', direccionProv = '{$this->direccion}', telefonoProv = '{$this->telefono}' 
            WHERE idProv = '{$this->idProveedor}'";
            return $this->con->consultaRetorno($sql);
        }

        public function activate(){
            $sql = "UPDATE proveedor SET estadoProv = '{$this->estado}' WHERE idProv = '{$this->idProveedor}'";
            return $this->con->consultaRetorno($sql);
        }

		public function delete(){
			$sql = "DELETE FROM proveedor WHERE idProv = '{$this->idProveedor}'";
			$this->con->consultaSimple($sql);
		}

		public function view(){
			$sql = "SELECT * FROM proveedor WHERE idProv = '{$this->idProveedor}'";
			$datos = $this->con->consultaRetorno($sql);
			$row = mysqli_fetch_assoc($datos);
			return $row;
		}
	}
?>