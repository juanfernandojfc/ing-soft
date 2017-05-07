<?php namespace Model;
	
	class Suministro{
		private $idSuministro;
		private $referenciaSum;
		private $nombreSum;
		private $stock;
		private $tipo;
        private $estado;

		public function __construct(){
			$this->con= new conexion();
		}

        /**
         * @return mixed
         */
        public function getIdSuministro()
        {
            return $this->idSuministro;
        }

        /**
         * @param mixed $idSuministro
         */
        public function setIdSuministro($idSuministro)
        {
            $this->idSuministro = $idSuministro;
        }

        /**
         * @return mixed
         */
        public function getReferenciaSum()
        {
            return $this->referenciaSum;
        }

        /**
         * @param mixed $referenciaSum
         */
        public function setReferenciaSum($referenciaSum)
        {
            $this->referenciaSum = $referenciaSum;
        }

        /**
         * @return mixed
         */
        public function getNombreSum()
        {
            return $this->nombreSum;
        }

        /**
         * @param mixed $nombreSum
         */
        public function setNombreSum($nombreSum)
        {
            $this->nombreSum = $nombreSum;
        }

        /**
         * @return mixed
         */
        public function getStock()
        {
            return $this->stock;
        }

        /**
         * @param mixed $stock
         */
        public function setStock($stock)
        {
            $this->stock = $stock;
        }

        /**
         * @return mixed
         */
        public function getTipo()
        {
            return $this->tipo;
        }

        /**
         * @param mixed $tipo
         */
        public function setTipo($tipo)
        {
            $this->tipo = $tipo;
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
            $sql = "SELECT * FROM suministro";
            $datos = $this->con->consultaRetorno($sql);
            return $datos;
        }

		public function listarSelect(){
			$sql = "SELECT idSuministro, nombreSum FROM suministro WHERE estadoSum = 'ACTIVO'";
			$datos = $this->con->consultaRetorno($sql);
			return $datos;
		}

        public function showRef(){
            $sql = "SELECT referenciaSum, tipo, stock FROM suministro WHERE idSuministro = '{$this->idSuministro}'";
            $datos = $this->con->consultaRetorno($sql);
            return $datos;
        }

        public function showStock()
        {
            $sql = "SELECT stock FROM suministro WHERE idSuministro = '{$this->idSuministro}'";
            $datos = $this->con->consultaRetorno($sql);
            $datos = $datos->fetch_array();
            return $datos[0];
        }

        public function updateStock(){
            $sql = "UPDATE suministro SET stock='{$this->stock}' WHERE idSuministro = '{$this->idSuministro}'";
            return $this->con->consultaRetorno($sql);
        }

		public function add(){
			$sql = "INSERT INTO suministro(referenciaSum, nombreSum, tipo) VALUES ('{$this->referenciaSum}','{$this->nombreSum}','{$this->tipo}')";
			return $this->con->consultaRetorno($sql);
		}

        public function update(){
            $sql = "UPDATE suministro SET nombreSum='{$this->nombreSum}' WHERE referenciaSum = '{$this->referenciaSum}'";
            return $this->con->consultaRetorno($sql);
        }

		public function activate(){
            $sql = "UPDATE suministro SET estadoSum='{$this->estado}' WHERE idSuministro = '{$this->idSuministro}'";
            return $this->con->consultaRetorno($sql);
		}

		public function view(){
			$sql = "SELECT * FROM suministro WHERE idSuministro = '{$this->idSuministro}'";
			$datos = $this->con->consultaRetorno($sql);
			$row = mysqli_fetch_assoc($datos);
			return $row;
		}
	}
?>