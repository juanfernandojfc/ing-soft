<?php
/**
 * Created by PhpStorm.
 * User: Carlos Mario
 * Date: 1/12/2016
 * Time: 11:22 PM
 */

namespace Model;


    class Solicitud{
        private $idSolicitud;
        private $idDepen;
        private $idEmpleado_rec;
        private $tipoSolicitud;
        private $descripcion;
        private $estadoSolicitud;
        private $fechaSolicitud;
        private $fechaEntrega;

        public function __construct(){
            $this->con= new conexion();
        }

        /**
         * @return mixed
         */
        public function getIdSolicitud()
        {
            return $this->idSolicitud;
        }

        /**
         * @param mixed $idSolicitud
         */
        public function setIdSolicitud($idSolicitud)
        {
            $this->idSolicitud = $idSolicitud;
        }

        /**
         * @return mixed
         */
        public function getIdDepen()
        {
            return $this->idDepen;
        }

        /**
         * @param mixed $idDepen
         */
        public function setIdDepen($idDepen)
        {
            $this->idDepen = $idDepen;
        }

        /**
         * @return mixed
         */
        public function getIdEmpleadoRec()
        {
            return $this->idEmpleado_rec;
        }

        /**
         * @param mixed $idEmpleado_rec
         */
        public function setIdEmpleadoRec($idEmpleado_rec)
        {
            $this->idEmpleado_rec = $idEmpleado_rec;
        }

        /**
         * @return mixed
         */
        public function getTipoSolicitud()
        {
            return $this->tipoSolicitud;
        }

        /**
         * @param mixed $tipoSolicitud
         */
        public function setTipoSolicitud($tipoSolicitud)
        {
            $this->tipoSolicitud = $tipoSolicitud;
        }

        /**
         * @return mixed
         */
        public function getDescripcion()
        {
            return $this->descripcion;
        }

        /**
         * @param mixed $descripcion
         */
        public function setDescripcion($descripcion)
        {
            $this->descripcion = $descripcion;
        }

        /**
         * @return mixed
         */
        public function getEstadoSolicitud()
        {
            return $this->estadoSolicitud;
        }

        /**
         * @param mixed $estadoSolicitud
         */
        public function setEstadoSolicitud($estadoSolicitud)
        {
            $this->estadoSolicitud = $estadoSolicitud;
        }

        /**
         * @return mixed
         */
        public function getFechaSolicitud()
        {
            return $this->fechaSolicitud;
        }

        /**
         * @param mixed $fechaSolicitud
         */
        public function setFechaSolicitud($fechaSolicitud)
        {
            $this->fechaSolicitud = $fechaSolicitud;
        }

        /**
         * @return mixed
         */
        public function getFechaEntrega()
        {
            return $this->fechaEntrega;
        }

        /**
         * @param mixed $fechaEntrega
         */
        public function setFechaEntrega($fechaEntrega)
        {
            $this->fechaEntrega = $fechaEntrega;
        }

        public function add(){
            $sql = "INSERT INTO solicitud(idDepen, tipoSolicitud, descripcion, fechaSolicitud) VALUES ('{$this->idDepen}','{$this->tipoSolicitud}','{$this->descripcion}', now())";
            return $this->con->consultaRetorno($sql);
        }

        public function ultimo(){
            $sql = "SELECT MAX(idSolicitud) AS idSolicitud FROM solicitud";
            $datos = $this->con->consultaRetorno($sql);
            $datos = $datos->fetch_array();
            return $datos[0];
        }

        public function mostrar(){
            $sql = "SELECT  FROM solicitud";
            $datos = $this->con->consultaRetorno($sql);
            return $datos;
        }


    }

    ?>