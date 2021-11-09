   <?php
    class conexion extends mysqli
    {
       public function __construct()
       {
                $servidor="localhost";
                $basadatos="sis_inventario";
                $usuario="root";
                $password="";

                parent::__construct($servidor,$usuario,$password,$basadatos);
                $this->query("SET NAMES 'utf8';");
                $this->connect_errno ? die("Error en la conexion") : $error="Conectado a ".$basadatos;

                unset($error);
	   }
	}
?>
