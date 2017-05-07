<?php
/**
 * Created by PhpStorm.
 * User: Carlos Mario
 * Date: 30/11/2016
 * Time: 1:03 AM
 */

namespace Model;


    class DetalleCompra{
        private $idSuministro;
        private $idCompra;
        private $cantidad;
        private $valorUnitario;

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
        public function getIdCompra()
        {
            return $this->idCompra;
        }

        /**
         * @param mixed $idCompra
         */
        public function setIdCompra($idCompra)
        {
            $this->idCompra = $idCompra;
        }

        /**
         * @return mixed
         */
        public function getCantidad()
        {
            return $this->cantidad;
        }

        /**
         * @param mixed $cantidad
         */
        public function setCantidad($cantidad)
        {
            $this->cantidad = $cantidad;
        }

        /**
         * @return mixed
         */
        public function getValorUnitario()
        {
            return $this->valorUnitario;
        }

        /**
         * @param mixed $valorUnitario
         */
        public function setValorUnitario($valorUnitario)
        {
            $this->valorUnitario = $valorUnitario;
        }

        public function add(){
            $sql = "INSERT INTO detalle_compra(idSuministro, idCompra, cantidad, valorUnitario)
            VALUES ('{$this->idSuministro}','{$this->idCompra}','{$this->cantidad}','{$this->valorUnitario}')";
            return $this->con->consultaRetorno($sql);
        }
    }
?>