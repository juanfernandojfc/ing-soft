<?php
/**
 * Created by PhpStorm.
 * User: Carlos Mario
 * Date: 19/11/2016
 * Time: 11:01 PM
 */

namespace Controllers;

use Model\Compra as compra;
use Model\DetalleCompra as detalle;
use Model\Ofimatico as ofimatico;
use Model\Suministro as suministro;

    class CompraController{

        public function addControl($arg){

            $compra = new compra();
            $compra->setFechaCompra($arg['fecha']);
            $compra->setIdProv($arg['nit']);
            $compra->setIdResponsable($_SESSION['user_empleado']);

            $total= 0;
            $detalles = $arg['detalles'];
            foreach ($detalles as $valor){
                $total += ($valor['cantidad'] * $valor['valorUnitario']);
            }

            $compra->setValorTotal($total);
            $resp = $compra->add();

            foreach ($detalles as $valor){
                $detalle = new detalle();
                $suministro = new suministro();
                $suministro->setIdSuministro($valor['idSuministro']);
                $detalle->setIdCompra($compra->ultimo());
                $detalle->setIdSuministro($valor['idSuministro']);
                $detalle->setCantidad($valor['cantidad']);
                $detalle->setValorUnitario($valor['valorUnitario']);
                $detalle->add();
                $suministro->setStock($suministro->showStock()+$valor['cantidad']);
                $suministro->updateStock();
            }

            $ofimaticos = $arg['ofimaticos'];

            if(isset($ofimaticos)){
                foreach ($ofimaticos as $valor){
                    $ofimatico = new ofimatico();
                    $ofimatico->setIdSuministro($valor['idSuministro']);
                    $ofimatico->setCodSerial($valor['codSerial']);
                    $ofimatico->add();
                }
                echo $resp;
            }else{
                echo $resp;
            }
        }

    }

?>