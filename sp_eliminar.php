<?php

$id=$_GET['Id'];


include('conexion.php');


           $us=new conexion();
           $q="	DELETE FROM `inventario` WHERE id like $id ";
           $rta=mysqli_query($us, $q);

           if (!$rta)
           {
             echo "No se Eliminó";
           }
           else
           {
            header("location:entrada-salida.php");
           }

?>
