<?php
/**
 * Created by PhpStorm.
 * User: Carlos Mario
 * Date: 19/11/2016
 * Time: 11:03 PM
 */

namespace Controllers;

    use Model\Empleado as empleado;
    use Model\User as user;
    use Model\Rol as rol;
    use Model\Dependencia as dependencia;

    class EmpleadoController{

        public function addControl($datos){

            $us = new user();

            $us->setIdRol(strtoupper($datos['rol']));
            $us->setLogin(strtoupper($datos['usuario']));
            $us->setClave($datos['contraseña']);
            $respUs = $us->add();

            if($respUs == 1){

                $emp = new empleado();

                $emp->setIdUser($us->ultimo());
                $emp->setCedula($datos['cedula']);
                $emp->setNombre(strtoupper($datos['nombre']));
                $emp->setApellido(strtoupper($datos['apellido']));
                $emp->setSexo($datos['genero']);
                $emp->setEmail($datos['correo']);
                $emp->setTelefono(strtoupper($datos['telefono']));
                $respEm = $emp->add();

                if($respEm == 1){


                    if (isset($datos['dependencia']) == false){
                        echo "1";
                    }else{
                        $dep = new dependencia();

                        $dep->setIdDependencia($datos['dependencia']);
                        $dep->setIdEmpleado($emp->ultimo());
                        $resp = $dep->editEmpleado();

                        echo $resp;
                    }


                }else{
                    $us->delete();
                    echo "";
                }
            }else{
                echo "";
            }
        }

        public function showData(){
            $emp = new empleado();
            $lista = \mysqli_fetch_all($emp->listar());

            if(count($lista) == 0){
                echo "";
            }else{
                echo json_encode($lista);
            }
        }

        public function showDataEmp($id){
            $emp = new empleado();
            $lista = \mysqli_fetch_all($emp->listarComplex($id['id']));

            if(count($lista) == 0){
                echo "";
            }else{
                echo json_encode($lista);
            }
        }

        public function showRols(){
            $rol = new rol();
            $lista = \mysqli_fetch_all($rol->listar());

            if(count($lista) == 0){
                echo "";
            }else{
                echo json_encode($lista);
            }
        }

        public function stadeRecord($arg){
            $us = new user();
            $us->setIdUser($arg['id']);
            if($arg['estado'] == "ACTIVO"){
                $us->setEstado("INACTIVO");
            }else{
                $us->setEstado("ACTIVO");
            }
            $resp = $us->activate();

            echo $resp;
        }

        public function updateRecord($arg){


            if ($arg['nombre']=="" || $arg['apellido']=="" || $arg['telefono']=="" || $arg['contraseña']==""){
                echo "";
            }else{

                $us = new user();
                $us->setIdUser($arg['idUser']);
                $us->setClave($arg['contraseña']);
                $us->updatePass();

                $emp = new empleado();
                $emp->setIdEmpleado($arg['idEmp']);
                $emp->setNombre(strtoupper($arg['nombre']));
                $emp->setApellido(strtoupper($arg['apellido']));
                $emp->setTelefono($arg['telefono']);
                $emp->edit();


                $dep = new dependencia();
                $dep->setIdDependencia($arg['dependencia']);
                $dep->setIdEmpleado($arg['idEmp']);
                $dep->nullDepen();
                $resp = $dep->editEmpleado();

                echo $resp;
            }
        }
    }

?>