<?php
/**
 * Created by PhpStorm.
 * User: Carlos Mario
 * Date: 20/11/2016
 * Time: 9:30 PM
 */

namespace Model;


    class Rol{
        private $id;
        private $nombre;

        public function __construct(){
            $this->con= new conexion();
        }

        /**
         * @return mixed
         */
        public function getId()
        {
            return $this->id;
        }

        /**
         * @param mixed $id
         */
        public function setId($id)
        {
            $this->id = $id;
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

        public function listar(){
            $sql = "SELECT * FROM rol";
            $datos = $this->con->consultaRetorno($sql);
            return $datos;
        }

        public function add(){
            $sql = "INSERT INTO rol(nombreRol) VALUES ('{$this->nombre}')";
            $this->con->consultaSimple($sql);
        }

    }

?>