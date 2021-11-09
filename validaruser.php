<?php
         
          include('conexion.php');

          class validarusuario
          {
                public function validaruser($user,$pass)
                {
                     $us=new conexion();
                     $q="SELECT * FROM `usuarios` WHERE `user` = '$user' AND `password`='$pass' ;";
                     $usuario=$us->query($q);
                     $us->close();
                     return $usuario;
				}       
		  }
?>