<?php 
/**
 * Created by WCaceres.
 * User: Wcaceres
 * Date: 17/03/2022
 * Time: 15:05
 */
class conexionsqlserver
{        
    public $_connection;
    private static $_instance; //The single instance
    private  $servidor="192.168.1.0";
    private $usuario="sa";
    private $password="$password";
    private $bd="Reportes"; 
    // Constructor
    public function __construct()
    {
        //$this->_connection = new mysqli($this->_host, $this->_username,$this->_password, $this->_database);
        $this->_connection =new PDO("sqlsrv:Server=".$this->servidor .";DataBase=".$this->bd."","".$this->usuario ."","".$this->password."");
        // Error handling
        $this->_connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        $this->_connection->setAttribute(PDO::SQLSRV_ATTR_ENCODING, PDO::SQLSRV_ENCODING_UTF8);
    }
     public function getConnection()
    {
        return $this->_connection;
    }
}
class conexionmysql
{        
    public $_connection;
    private static $_instance; //The single instance
    private $_dsn = 'mysql:dbname=dbmyql;host=192.168.1.0';
    private $_user = 'root';
    private $_password = 'root$';

    public static function getInstance()
    {
        if(!self::$_instance)
        { 
            self::$_instance = new self();
        }
        return self::$_instance;
    }
 
    // Constructor
    private function __construct()
    {
       

        $this->_connection =new PDO($this->_dsn, $this->_user, $this->_password);
      
    }
 
    // Magic method clone is empty to prevent duplication of connection
      public function __clone()
    {
        return false;
    }
    public function __wakeup()
    {
        return false;
    }
 

    public function getConnection()
    {
        return $this->_connection;
    }

    public function destroy(){
        self::$_instance = NULL;
    }

   
   
     
   
 
}



 ?>
