<?php
/**
 * Created by PhpStorm.
 * User: Carlos Mario
 * Date: 19/11/2016
 * Time: 11:06 PM
 */

namespace Controllers;

    use Model\Suministro as suministro;


    class SuministroController{

        public function addControl($datos){
            if ($datos['referencia']=="" || $datos['nombre']=="" || $datos['tipo']==""){
                echo "";
            }else{
                $sum = new suministro();
                $sum->setReferenciaSum(strtoupper($datos['referencia']));
                $sum->setNombreSum(strtoupper($datos['nombre']));
                $sum->setTipo(strtoupper($datos['tipo']));
                $resp = $sum->add();

                echo $resp;
            }

        }

        public function showData(){
            $sum = new suministro();
            $list = \mysqli_fetch_all($sum->listar());

            if(count($list) == 0){
                echo "";
            }else{
                echo json_encode($list);
            }
        }

        public function stadeRecord($arg){
            $sum = new suministro();
            $sum->setIdSuministro($arg['identificador']);
            if($arg['estado'] == "ACTIVO"){
                $sum->setEstado("INACTIVO");
            }else{
                $sum->setEstado("ACTIVO");
            }
            $resp = $sum->activate();

            echo $resp;
        }

        public function updateRecord($arg){
            if ($arg['referencia']=="" || $arg['nombre']==""){
                echo "Campos vacios";
            }else{
                $sum = new suministro();
                $sum->setReferenciaSum($arg['referencia']);
                $sum->setNombreSum(strtoupper($arg['nombre']));

                $resp = $sum->update();

                echo $resp;
            }
        }

        public function select(){
            $sum = new suministro();
            $list = \mysqli_fetch_all($sum->listarSelect());

            if(count($list) == 0){
                echo "";
            }else{
                echo json_encode($list);
            }
        }

        public function selectRef($arg){
            $sum = new suministro();
            $sum->setIdSuministro($arg['id']);
            $list = \mysqli_fetch_all($sum->showRef());

            if(count($list) == 0){
                echo "";
            }else{
                echo json_encode($list);
            }
        }

    }
?>