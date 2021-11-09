<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Vista de Datos Completos</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  </head>
  <body bgcolor="#FCF3CF">
  <font face="Lucida Bright">
    <div align="right">
      <form  action="admin.html" method="post">
        <button class="btn waves-effect waves-light" type="submit" name="action"><font face="Georgia">Regresar</font>
         <i class="material-icons right">keyboard_return</i>
        </button>
      </form>
    </div>
    <div align="center">

      <br>
      <h5>INVENTARIO</h5>
      <br>

      <div>
        <table>
          <thead>
            <tr>
              <th>ID</th>
              <th>PRODUCTO</th>
              <th>PRECIO UNITARIO (Q)</th>
              <th>UNIDAD DE MEDIDA</th>
              <th>CANTIDAD</th>
              <th>PRECIO TOTAL (Q)</th>
            </tr>
          </thead>
          <tbody>
            <?php
              include('conexion.php');

                       $us=new conexion();
                       $q="SELECT `id`, `producto`, `precio`, `medida`, `cantidad` FROM `inventario`";
                       $rta=mysqli_query($us, $q);
                       while ($mostrar = mysqli_fetch_row($rta)){
            ?>
            <tr>
              <?php $total=$mostrar['2']*$mostrar['4'];?>
              <td><?php echo $mostrar['0'] ?></td>
              <td><?php echo $mostrar['1'] ?></td>
              <td><?php echo $mostrar['2'] ?></td>
              <td><?php echo $mostrar['3'] ?></td>
              <td><?php echo $mostrar['4'] ?></td>
              <td><?php echo $total ?></td>
              <td><a href="sp_eliminar.php? Id=<?php echo $mostrar['0'] ?>" style="color:#9D1010">Eliminar</a></td>
            </tr>
            <?php
            }
            ?>
          </tbody>
        </table>
      </div>

      <br>
      <h5>PLANILLA DE TRABAJADORES</h5>
      <br>

      <div>
        <table>
          <thead>
            <tr>
              <th>ID</th>
              <th>NOMBRE</th>
              <th>PUESTO</th>
              <th>SUELDO</th>
              <th>BONIFICACIÓN</th>
              <th>TOTAL DEVENGADO</th>
              <th>IGSS</th>
              <th>PRESTAMO</th>
              <th>ANTICIPO</th>
              <th>DESCUENTOS</th>
              <th>LÍQUIDO</th>
            </tr>
          </thead>
          <tbody>
            <?php
                       $q="SELECT `id`, `nombre`, `puesto`, `sueldo`, `bonificación`, `total_devengado`, `igss`, `prestamo`, `anticipo` FROM `trabajadores`";
                       $rta=mysqli_query($us, $q);
                       while ($mostrar = mysqli_fetch_row($rta)){
            ?>
            <tr>
              <?php $dev=$mostrar['3']+$mostrar['4'];?>
              <?php $IGSS=$mostrar['3']*0.0483;?>
              <?php $desc=$IGSS+$mostrar['7']+$mostrar['8'];?>
              <?php $liquido=$dev-$desc;?>
              <td><?php echo $mostrar['0'] ?></td>
              <td><?php echo $mostrar['1'] ?></td>
              <td><?php echo $mostrar['2'] ?></td>
              <td><?php echo $mostrar['3'] ?></td>
              <td><?php echo $mostrar['4'] ?></td>
              <td><?php echo $dev ?></td>
              <td><?php echo $IGSS ?></td>
              <td><?php echo $mostrar['7'] ?></td>
              <td><?php echo $mostrar['8'] ?></td>
              <td><?php echo $desc ?></td>
              <td><?php echo $liquido ?></td>
              <td><a href="sp_eliminarT.php? Id=<?php echo $mostrar['0'] ?>" style="color:#9D1010">Eliminar</a></td>
            </tr>
            <?php
          }
            ?>
          </tbody>
        </table>
      </div>


    </div>
    </font>
  </body>
</html>
