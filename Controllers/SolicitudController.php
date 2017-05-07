<?php
/**
 * Created by PhpStorm.
 * User: Carlos Mario
 * Date: 19/11/2016
 * Time: 11:05 PM
 */

namespace Controllers;

use Model\Solicitud as solicitud;
use Model\DetalleSolicitud as detalle;


    class SolicitudController{

        public function addControl($arg){

            $solicitud = new solicitud();
            $solicitud->setDescripcion($arg['descripcion']);
            $solicitud->setTipoSolicitud($arg['tipo']);
            $solicitud->setIdDepen($_SESSION['user_dependencia']);
            $resp = $solicitud->add();

            if ($resp == 1){
                $detalles = $arg['detalles'];
                foreach ($detalles as $valor){
                    $detalle = new detalle();
                    $detalle->setIdSolicitud($solicitud->ultimo());
                    $detalle->setIdSuministro($valor['idSuministro']);
                    $detalle->setCantidad($valor['cantidad']);
                    $detalle->add();
                }

                echo $resp;
            }else{
                echo $resp;
            }

        }

    }

?>