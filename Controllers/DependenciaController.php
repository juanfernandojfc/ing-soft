<?php
/**
 * Created by PhpStorm.
 * User: Carlos Mario
 * Date: 19/11/2016
 * Time: 4:36 PM
 */
namespace Controllers;

    use Model\Dependencia as dependencia;


    class DependenciaController{

        public function addControl($datos){

            if ($datos['nombre']=="" || $datos['direccion']=="" || $datos['telefono']==""){
                echo "";
            }else{
                $dep = new dependencia();
                $dep->setNombre(strtoupper($datos['nombre']));
                $dep->setDireccion(strtoupper($datos['direccion']));
                $dep->setTelefono($datos['telefono']);
                $resp = $dep->add();

                echo $resp;
            }

        }

        public function showData(){
            $dep = new dependencia();
            $lista = \mysqli_fetch_all($dep->listar());

            if(count($lista) == 0){
                echo "";
            }else{
                echo json_encode($lista);
            }
        }

        public function stadeRecord($arg){
            $dep = new dependencia();
            $dep->setIdDependencia($arg['identificador']);
            if($arg['estado'] == "ACTIVO"){
                $dep->setEstado("INACTIVO");
            }else{
                $dep->setEstado("ACTIVO");
            }
            $resp = $dep->activate();

            echo $resp;
        }

        public function updateRecord($arg){

            if ($arg['nombre']=="" || $arg['direccion']=="" || $arg['telefono']==""){
                echo "";
            }else{
                $dep = new dependencia();
                $dep->setIdDependencia($arg['id']);
                $dep->setNombre(strtoupper($arg['nombre']));
                $dep->setDireccion(strtoupper($arg['direccion']));
                $dep->setTelefono($arg['telefono']);
                $resp = $dep->update();

                echo $resp;
            }
        }

        public function depenNula(){
            $dep = new dependencia();
            $lista = \mysqli_fetch_all($dep->listarVacia());

            if(count($lista) == 0){
                echo "";
            }else{
                echo json_encode($lista);
            }
        }
    }
?>