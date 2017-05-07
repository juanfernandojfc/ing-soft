<?php
/**
 * Created by PhpStorm.
 * User: Carlos Mario
 * Date: 30/11/2016
 * Time: 12:52 AM
 */

namespace Model;


    class Ofimatico{

        private $idOfimatico;
        private $idSuministro;
        private $codSerial;
        private $condicionUso;
        private $estadoLugar;

        public function __construct(){
            $this->con= new conexion();
        }

        /**
         * @return mixed
         */
        public function getIdOfimatico()
        {
            return $this->idOfimatico;
        }

        /**
         * @param mixed $idOfimatico
         */
        public function setIdOfimatico($idOfimatico)
        {
            $this->idOfimatico = $idOfimatico;
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
        public function getCodSerial()
        {
            return $this->codSerial;
        }

        /**
         * @param mixed $codSerial
         */
        public function setCodSerial($codSerial)
        {
            $this->codSerial = $codSerial;
        }

        /**
         * @return mixed
         */
        public function getCondicionUso()
        {
            return $this->condicionUso;
        }

        /**
         * @param mixed $condicionUso
         */
        public function setCondicionUso($condicionUso)
        {
            $this->condicionUso = $condicionUso;
        }

        /**
         * @return mixed
         */
        public function getEstadoLugar()
        {
            return $this->estadoLugar;
        }

        /**
         * @param mixed $estadoLugar
         */
        public function setEstadoLugar($estadoLugar)
        {
            $this->estadoLugar = $estadoLugar;
        }

        public function add(){
            $sql = "INSERT INTO ofimatico(idSuministro, codSerial) VALUES ('{$this->idSuministro}','{$this->codSerial}')";
            return $this->con->consultaRetorno($sql);
        }
    }

?>