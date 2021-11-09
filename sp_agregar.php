<?php

$nombre=$_POST['Nombre'];
$puesto=$_POST['Puesto'];
$sueldo=$_POST['Sueldo'];
$prestamo=$_POST['Prestamo'];
$anticipo=$_POST['Anticipo'];

include('conexion.php');


           $us=new conexion();
           $q="INSERT INTO `trabajadores`(`nombre`, `puesto`, `sueldo`, `prestamo`, `anticipo`) VALUES ('$nombre','$puesto','$sueldo','$prestamo','$anticipo')";
           $rta=mysqli_query($us, $q);

           if (!$rta)
           {
             echo "No se Insertó";
           }
           else
           {
            header("location:agregar.html");
           }

?>
