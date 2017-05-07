<?php namespace Config;

//definir constanstes para referirse a los controladors
define('HOME','Controllers\\homeController');
define('USER','Controllers\\userController');
define('LOGIN','Controllers\\login');
define('DEPENDENCIA','Controllers\\DependenciaController');
define('COMPRA','Controllers\\CompraController');
define('EMPLEADO','Controllers\\EmpleadoController');
define('PROVEEDOR','Controllers\\ProveedorController');
define('SOLICITUD','Controllers\\SolicitudController');
define('SUMINISTRO','Controllers\\SuministroController');

use Config\Routing as R;
use Model\Proveedor;
use Model\Suministro;

class Router{

    /**
     * Router constructor.
     *
     * Todas la rutas van aqui como en laravel,syphony,lumen,slim.
     *
     * Usamos call_user_func o call_user_func_array para llamar
     * al controlador ya que el archivo de routing no lo hace
     * nativamente.
     *
     */
    public function __construct(){
        R::get('/', function(){
            if(isset($_SESSION['user_name'])){
                call_user_func(array(USER,'index'));
            }else{
                call_user_func(array(HOME,'index'));
            }
        });

        R::post('/login', function(){
            $arg = $_POST;
            call_user_func_array(array(HOME,'login'),array($arg));
        });

        R::get('/logout', function(){
            call_user_func(array(HOME,'logout'));
        });

        R::get('/user', function(){
            if(isset($_SESSION['user_name'])){
                call_user_func(array(USER,'index'));
            }else{
                call_user_func(array(HOME,'index'));
            }
        });

        R::get('/user/getCompra', function(){
            if(isset($_SESSION['user_name'])){
                call_user_func_array(array(USER,'vista'),array("getCompra"));
            }else{
                call_user_func(array(HOME,'index'));
            }
        });

        R::get('/user/getDependencia', function(){
            if(isset($_SESSION['user_name'])){
                call_user_func_array(array(USER,'vista'),array("getDependencia"));
            }else{
                call_user_func(array(HOME,'index'));
            }
        });

        R::get('/user/getEmpleado', function(){
            if(isset($_SESSION['user_name'])){
                call_user_func_array(array(USER,'vista'),array("getEmpleado"));
            }else{
                call_user_func(array(HOME,'index'));
            }
        });

        R::get('/user/getProveedor', function(){
            if(isset($_SESSION['user_name'])){
                call_user_func_array(array(USER,'vista'),array("getProveedor"));
            }else{
                call_user_func(array(HOME,'index'));
            }
        });

        R::get('/user/getSolicitud', function(){
            if(isset($_SESSION['user_name'])){
                call_user_func_array(array(USER,'vista'),array("getSolicitud"));
            }else{
                call_user_func(array(HOME,'index'));
            }
        });

        R::get('/user/getSuministro', function(){
            if(isset($_SESSION['user_name'])){
                call_user_func_array(array(USER,'vista'),array("getSuministro"));
            }else{
                call_user_func(array(HOME,'index'));
            }
        });

        R::get('/user/setCompra', function(){
            if(isset($_SESSION['user_name'])){
                call_user_func_array(array(USER,'vista'),array("setCompra"));
            }else{
                call_user_func(array(HOME,'index'));
            }
        });

        R::get('/user/setDependencia', function(){
            if(isset($_SESSION['user_name'])){
                call_user_func_array(array(USER,'vista'),array("setDependencia"));
            }else{
                call_user_func(array(HOME,'index'));
            }
        });

        R::get('/user/setEmpleado', function(){
            if(isset($_SESSION['user_name'])){
                call_user_func_array(array(USER,'vista'),array("setEmpleado"));
            }else{
                call_user_func(array(HOME,'index'));
            }
        });

        R::get('/user/setProveedor', function(){
            if(isset($_SESSION['user_name'])){
                call_user_func_array(array(USER,'vista'),array("setProveedor"));
            }else{
                call_user_func(array(HOME,'index'));
            }
        });

        R::get('/user/setSolicitud', function(){
            if(isset($_SESSION['user_name'])){
                call_user_func_array(array(USER,'vista'),array("setSolicitud"));
            }else{
                call_user_func(array(HOME,'index'));
            }
        });

        R::get('/user/setSuministro', function(){
            if(isset($_SESSION['user_name'])){
                call_user_func_array(array(USER,'vista'),array("setSuministro"));
            }else{
                call_user_func(array(HOME,'index'));
            }
        });

        R::post('/addDependencia', function(){
            if(isset($_SESSION['user_name'])){
                $arg = $_POST;
                call_user_func_array(array(DEPENDENCIA,'addControl'),array($arg));
            }else{
                call_user_func(array(HOME,'index'));
            }
        });

        R::post('/addCompra', function(){
            if(isset($_SESSION['user_name'])){
                $arg = $_POST;
                call_user_func_array(array(COMPRA,'addControl'),array($arg));
            }else{
                call_user_func(array(HOME,'index'));
            }
        });

        R::post('/addEmpleado', function(){
            if(isset($_SESSION['user_name'])){
                $arg = $_POST;
                call_user_func_array(array(EMPLEADO,'addControl'),array($arg));
            }else{
                call_user_func(array(HOME,'index'));
            }
        });

        R::post('/addProveedor', function(){
            if(isset($_SESSION['user_name'])){
                $arg = $_POST;
                call_user_func_array(array(PROVEEDOR,'addControl'),array($arg));
            }else{
                call_user_func(array(HOME,'index'));
            }
        });

        R::post('/addSolicitud', function(){
            if(isset($_SESSION['user_name'])){
                $arg = $_POST;
                call_user_func_array(array(SOLICITUD,'addControl'),array($arg));
            }else{
                call_user_func(array(HOME,'index'));
            }
        });

        R::post('/addSuministro', function(){
            if(isset($_SESSION['user_name'])){
                $arg = $_POST;
                call_user_func_array(array(SUMINISTRO,'addControl'),array($arg));
            }else{
                call_user_func(array(HOME,'index'));
            }
        });

        R::get('/depDisponibles', function(){
            if(isset($_SESSION['user_name'])){
                call_user_func(array(DEPENDENCIA,'depenNula'));
            }else{
                call_user_func(array(HOME,'index'));
            }
        });

        R::get('/roles', function(){
            if(isset($_SESSION['user_name'])){
                call_user_func(array(EMPLEADO,'showRols'));
            }else{
                call_user_func(array(HOME,'index'));
            }
        });

        R::get('/dataSuministro', function(){
            if(isset($_SESSION['user_name'])){
                call_user_func(array(SUMINISTRO,'showData'));
            }else{
                call_user_func(array(HOME,'index'));
            }
        });

        R::get('/dataDependencia', function(){
            if(isset($_SESSION['user_name'])){
                call_user_func(array(DEPENDENCIA,'showData'));
            }else{
                call_user_func(array(HOME,'index'));
            }
        });

        R::get('/dataProveedor', function(){
            if(isset($_SESSION['user_name'])){
                call_user_func(array(PROVEEDOR,'showData'));
            }else{
                call_user_func(array(HOME,'index'));
            }
        });

        R::get('/dataEmpleado', function(){
            if(isset($_SESSION['user_name'])){
                call_user_func(array(EMPLEADO,'showData'));
            }else{
                call_user_func(array(HOME,'index'));
            }
        });

        R::post('/dataEmpleadoUser', function(){
            if(isset($_SESSION['user_name'])){
                $arg = $_POST;
                call_user_func(array(EMPLEADO,'showDataEmp'));
                call_user_func_array(array(EMPLEADO,'showDataEmp'),array($arg));
            }else{
                call_user_func(array(HOME,'index'));
            }
        });

        R::post('/stadeSuministro', function(){
            if(isset($_SESSION['user_name'])){
                $arg = $_POST;
                call_user_func_array(array(SUMINISTRO,'stadeRecord'),array($arg));
            }else{
                call_user_func(array(HOME,'index'));
            }
        });

        R::post('/updateSuministro', function(){
            if(isset($_SESSION['user_name'])){
                $arg = $_POST;
                call_user_func_array(array(SUMINISTRO,'updateRecord'),array($arg));
            }else{
                call_user_func(array(HOME,'index'));
            }
        });

        R::post('/stadeDependencia', function(){
            if(isset($_SESSION['user_name'])){
                $arg = $_POST;
                call_user_func_array(array(DEPENDENCIA,'stadeRecord'),array($arg));
            }else{
                call_user_func(array(HOME,'index'));
            }
        });

        R::post('/updateDependencia', function(){
            if(isset($_SESSION['user_name'])){
                $arg = $_POST;
                call_user_func_array(array(DEPENDENCIA,'updateRecord'),array($arg));
            }else{
                call_user_func(array(HOME,'index'));
            }
        });

        R::post('/stadeProveedor', function(){
            if(isset($_SESSION['user_name'])){
                $arg = $_POST;
                call_user_func_array(array(PROVEEDOR,'stadeRecord'),array($arg));
            }else{
                call_user_func(array(HOME,'index'));
            }
        });

        R::post('/updateProveedor', function(){
            if(isset($_SESSION['user_name'])){
                $arg = $_POST;
                call_user_func_array(array(PROVEEDOR,'updateRecord'),array($arg));
            }else{
                call_user_func(array(HOME,'index'));
            }
        });

        R::post('/stadeEmpleado', function(){
            if(isset($_SESSION['user_name'])){
                $arg = $_POST;
                call_user_func_array(array(EMPLEADO,'stadeRecord'),array($arg));
            }else{
                call_user_func(array(HOME,'index'));
            }
        });

        R::post('/updateEmpleado', function(){
            if(isset($_SESSION['user_name'])){
                $arg = $_POST;
                call_user_func_array(array(EMPLEADO,'updateRecord'),array($arg));
            }else{
                call_user_func(array(HOME,'index'));
            }
        });

        R::get('/suministroSel', function(){
            if(isset($_SESSION['user_name'])){
                call_user_func(array(SUMINISTRO,'select'));
            }else{
                call_user_func(array(HOME,'index'));
            }
        });

        R::get('/proveedorSel', function(){
            if(isset($_SESSION['user_name'])){
                call_user_func(array(PROVEEDOR,'select'));
            }else{
                call_user_func(array(HOME,'index'));
            }
        });

        R::post('/proveedorRecord', function(){
            if(isset($_SESSION['user_name'])){
                $arg = $_POST;
                call_user_func_array(array(PROVEEDOR,'selectRef'),array($arg));
            }else{
                call_user_func(array(HOME,'index'));
            }
        });

        R::post('/suministroRecord', function(){
            if(isset($_SESSION['user_name'])){
                $arg = $_POST;
                call_user_func_array(array(SUMINISTRO,'selectRef'),array($arg));
            }else{
                call_user_func(array(HOME,'index'));
            }
        });

        R::post('/addSolicitud', function(){
            if(isset($_SESSION['user_name'])){
                $arg = $_POST;
                call_user_func_array(array(SOLICITUD,'addControl'),array($arg));
            }else{
                call_user_func(array(HOME,'index'));
            }
        });

        R::post('/addCompra', function(){
            if(isset($_SESSION['user_name'])){
                $arg = $_POST;
                call_user_func_array(array(COMPRA,'addControl'),array($arg));
            }else{
                call_user_func(array(HOME,'index'));
            }
        });

        R::get('/dataSolicitud', function(){
            if(isset($_SESSION['user_name'])){
                call_user_func(array(SOLICITUD,'showData'));
            }else{
                call_user_func(array(HOME,'index'));
            }
        });

        R::dispatch();

    }
    
}

?>