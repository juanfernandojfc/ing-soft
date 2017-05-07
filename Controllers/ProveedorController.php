<?php
/**
 * Created by PhpStorm.
 * User: Carlos Mario
 * Date: 19/11/2016
 * Time: 11:11 PM
 */

namespace Controllers;

    use Model\Proveedor as proveedor;

    class ProveedorController
    {
        public function addControl($datos){

            if($datos['nit']=="" || $datos['nombre']=="" || $datos['direccion']=="" || $datos['telefono']==""){
                echo "";

            }else{
                $prov = new proveedor();
                $prov->setNit($datos['nit']);
                $prov->setNombre(strtoupper($datos['nombre']));
                $prov->setDireccion(strtoupper($datos['direccion']));
                $prov->setTelefono($datos['telefono']);
                $resp = $prov->add();

                echo $resp;
            }

        }

        public function showData(){
            $prov = new proveedor();
            $lista = \mysqli_fetch_all($prov->listar());

            if(count($lista) == 0){
                echo "";
            }else{
                echo json_encode($lista);
            }
        }

        public function stadeRecord($arg){
            $prov = new proveedor();
            $prov->setIdProveedor($arg['identificador']);
            if($arg['estado'] == "ACTIVO"){
                $prov->setEstado("INACTIVO");
            }else{
                $prov->setEstado("ACTIVO");
            }
            $resp = $prov->activate();

            echo $resp;
        }

        public function updateRecord($datos){
            if($datos['nit']=="" || $datos['nombre']=="" || $datos['direccion']=="" || $datos['telefono']==""){
                echo "";

            }else{
                $prov = new proveedor();
                $prov->setIdProveedor($datos['id']);
                $prov->setNit($datos['nit']);
                $prov->setNombre(strtoupper($datos['nombre']));
                $prov->setDireccion(strtoupper($datos['direccion']));
                $prov->setTelefono($datos['telefono']);
                $resp = $prov->update();

                echo $resp;
            }
        }

        public function select(){
            $prov = new proveedor();
            $list = \mysqli_fetch_all($prov->listarSelect());

            if(count($list) == 0){
                echo "";
            }else{
                echo json_encode($list);
            }
        }

        public function selectRef($arg){
            $prov = new proveedor();
            $prov->setIdProveedor($arg['id']);
            $list = \mysqli_fetch_all($prov->showRef());

            if(count($list) == 0){
                echo "";
            }else{
                echo json_encode($list);
            }
        }
    }
?>