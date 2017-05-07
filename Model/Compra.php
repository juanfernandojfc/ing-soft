<?php
/**
 * Created by PhpStorm.
 * User: Carlos Mario
 * Date: 30/11/2016
 * Time: 12:41 AM
 */

namespace Model;


    class Compra{
        private $idCompra;
        private $idProv;
        private $idResponsable;
        private $fechaCompra;
        private $valorTotal;
        private $factura;

        public function __construct(){
            $this->con= new conexion();
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
        public function getIdProv()
        {
            return $this->idProv;
        }

        /**
         * @param mixed $idProv
         */
        public function setIdProv($idProv)
        {
            $this->idProv = $idProv;
        }

        /**
         * @return mixed
         */
        public function getIdResponsable()
        {
            return $this->idResponsable;
        }

        /**
         * @param mixed $idResponsable
         */
        public function setIdResponsable($idResponsable)
        {
            $this->idResponsable = $idResponsable;
        }

        /**
         * @return mixed
         */
        public function getFechaCompra()
        {
            return $this->fechaCompra;
        }

        /**
         * @param mixed $fechaCompra
         */
        public function setFechaCompra($fechaCompra)
        {
            $this->fechaCompra = $fechaCompra;
        }

        /**
         * @return mixed
         */
        public function getValorTotal()
        {
            return $this->valorTotal;
        }

        /**
         * @param mixed $valorTotal
         */
        public function setValorTotal($valorTotal)
        {
            $this->valorTotal = $valorTotal;
        }

        /**
         * @return mixed
         */
        public function getFactura()
        {
            return $this->factura;
        }

        /**
         * @param mixed $factura
         */
        public function setFactura($factura)
        {
            $this->factura = $factura;
        }

        public function add(){
            $sql = "INSERT INTO compra(idProv, idResponsable, fechaCompra, valorTotal) 
            VALUES ('{$this->idProv}','{$this->idResponsable}','{$this->fechaCompra}','{$this->valorTotal}')";
            return $this->con->consultaRetorno($sql);
        }

        public function ultimo(){
            $sql = "SELECT MAX(idCompra) AS idCompra FROM compra";
            $datos = $this->con->consultaRetorno($sql);
            $datos = $datos->fetch_array();
            return $datos[0];
        }

    }
?>