<?php

$tipoProducto=$_POST['tipoProducto'];
$producto=$_POST['Producto'];
$precio=$_POST['Precio'];
$medida=$_POST['Medida'];
$cantidad=$_POST['Cantidad'];

include('conexion.php');


           $us=new conexion();

           $q="INSERT INTO `inventario`(`producto`, `precio`, `medida`, `cantidad`, `tipoProducto`) VALUES ('$producto','$precio','$medida','$cantidad', '$tipoProducto')";
           $rta=mysqli_query($us, $q);

           if (!$rta)
           {
             echo "No se Insertó";
           }
           else
           {
            header("location:agregar1.php");
           }

?>
