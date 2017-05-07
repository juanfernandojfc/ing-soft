<?php namespace Controllers;


/**
 * Class login
 * handles the user's login and logout process
 */
class Login
{
    /**
     * @var object The database connection
     */
    private $db_connection = null;
    /**
     * @var array Collection of error messages
     */
    public $error = 0;
    /**
     * @var array Collection of success / neutral messages
     */
    public $messages = array();

    /**
     * the function "__construct()" automatically starts whenever an object of this class is created,
     * you know, when you do "$login = new Login();"
     */
    public function __construct($arg)
    {
        // create/read session, absolutely necessary
        $this->dologinWithPostData($arg);
    }

    /**
     * log in with post data
     */
    private function dologinWithPostData($cadena)
    {
        $cadena['usuario']=strtoupper($cadena['usuario']);
        // check login form contents
        if (empty($cadena['usuario'])) {

            $this->error = 1;
        } elseif (empty($cadena['contra'])) {
            $this->error = 2;
        } elseif (!empty($cadena['usuario']) && !empty($cadena['contra'])) {

            // create a database connection, using the constants from config/db.php (which we loaded in index.php)
            $this->db_connection = new \mysqli("localhost", "root", "", "awds_proyecto");

            // change character set to utf8 and check it
            if (!$this->db_connection->set_charset("utf8")) {
                $this->error = 3;
            }

            // if no connection errors (= working database connection)
            if (!$this->db_connection->connect_errno) {

                // escape the POST stuff
                $user_name = $this->db_connection->real_escape_string($cadena['usuario']);

                // database query, getting all the info of the selected user (allows login via email address in the
                // username field)
                $sql = "SELECT u.idUser, e.idEmpleado, d.idDepen, u.idRol, u.login, u.clave, u.estado
                    FROM usuario AS u
                    INNER JOIN empleado AS e ON u.idUser = e.idUser 
                    INNER JOIN dependencia AS d ON e.idEmpleado = d.idEmpleado
                    WHERE u.login='{$user_name}'" ;
                $result_of_login_check = $this->db_connection->query($sql);

                // if this user exists
                if ($result_of_login_check->num_rows == 1) {

                    // get result row (as an object)
                    $result_row = $result_of_login_check->fetch_object();
                    // using PHP 5.5's password_verify() function to check if the provided password fits
                    // the hash of that user's password
                    if ($result_row->estado == "ACTIVO"){
                        if ($cadena['contra'] == $result_row->clave) {

                            // write user data into PHP SESSION (a file on your server)
                            $_SESSION['user_login_status'] = 1;
                            $_SESSION['user_name']=$cadena['usuario'];
                            $_SESSION['user_empleado']=$result_row->idEmpleado;
                            $_SESSION['user_dependencia']=$result_row->idDepen;
                            $_SESSION['user_id']=$result_row->idUser;
                            switch($result_row->idRol){

                                case 1:
                                    $_SESSION['user_rol']="jefeDependencia";
                                break;

                                case 2:
                                    $_SESSION['user_rol']="jefeSuministros";
                                break;

                                case 3:
                                    $_SESSION['user_rol']="admin";
                                break;

                                case 4:
                                    $_SESSION['user_rol']="root";
                                break;
                            }

                        } else {
                            $this->error = 4;
                        }
                    }else{
                        $this->error = 5;
                    }
                } else {
                    $this->error = 6;
                }
            } else {
                $this->error = 7;
            }
        }
    }

    /**
     * perform the logout
     */

    /**
     * simply return the current state of the user's login
     * @return boolean user's login status
     */
    public function isUserLoggedIn()
    {
        if (isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] == 1) {
            return true;
        }
        // default return
        return false;
    }

}
