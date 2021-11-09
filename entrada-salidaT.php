<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Entrada y Salida</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  </head>
  <body>

  <font face="Lucida Bright">
      <font size=3>
    <nav class="teal lighten-2">
    <div class="nav-wrapper">
     <a class="brand-logo"><img src="img/cafe5.png" width="63px" height = "63px"></a>
     <ul id="nav-mobile" class="right hide-on-med-and-down">
       <li><a style="color:#403826">Área Para Agregar Productos</a></li>
     </ul>
    </div>
    </nav>

    <br>
      <center><h5 style="color:#7D431C">Plantilla de Trabajador</h5></center>
    

  <div>
    <table>
      <thead>
        <tr>
          <th style="color:#7D431C">ID</th>
          <th style="color:#7D431C">NOMBRE</th>
          <th style="color:#7D431C">PUESTO</th>
          <th style="color:#7D431C">SUELDO</th>
          <th style="color:#7D431C">BONIFICACIÓN</th>
          <th style="color:#7D431C">TOTAL DEVENGADO</th>
          <th style="color:#7D431C">IGSS</th>
          <th style="color:#7D431C">PRESTAMO</th>
          <th style="color:#7D431C">ANTICIPO</th>
          <th style="color:#7D431C">DESCUENTOS</th>
          <th style="color:#7D431C">LÍQUIDO</th>
        </tr>
      </thead>
      <tbody>
        <?php
          include('conexion.php');

                   $us=new conexion();
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

  <br>
      <center><h5 style="color:#7D431C">Prestaciones Laborales</h5></center>

  <div>
    <table>
      <thead>
        <tr>
          <th style="color:#7D431C">ID</th>
          <th style="color:#7D431C">NOMBRE</th>
          <th style="color:#7D431C">PUESTO</th>
          <th style="color:#7D431C">SUELDO</th>
          <th style="color:#7D431C">AGUINALDO</th>
          <th style="color:#7D431C">BONO 14</th>
          <th style="color:#7D431C">INDEM</th>
          <th style="color:#7D431C">VACACIONES</th>
          <th style="color:#7D431C">IGSS PAT</th>
          <th style="color:#7D431C">TOTAL</th>          
        </tr>
      </thead>
      <tbody>
        <?php          

                  $q="SELECT `id`, `nombre`, `puesto`, `sueldo`, `bonificación`, `total_devengado`, `igss`, `prestamo`, `anticipo` FROM `trabajadores`";
                  $rta=mysqli_query($us, $q);
                  while ($mostrar = mysqli_fetch_row($rta)){
        ?>
        <tr>
          <?php $aguinaldo=$mostrar['3']*0.0833;?>
          <?php $bono14=$mostrar['3']*0.0833;?>
          <?php $indem=$mostrar['3']*0.0833;?>
          <?php $vacaciones= ($mostrar['3']*15)/365 ;?>
          <?php $igssPat=$mostrar['3']*0.1267;?>
          <?php $total= ($aguinaldo+$bono14+$indem+$vacaciones+$igssPat) ;?>
          
          <td><?php echo $mostrar['0'] ?></td>
          <td><?php echo $mostrar['1'] ?></td>
          <td><?php echo $mostrar['2'] ?></td>
          <td><?php echo $mostrar['3'] ?></td>
          <td><?php echo $aguinaldo ?></td>
          <td><?php echo $bono14 ?></td>
          <td><?php echo $indem ?></td>
          <td><?php echo $vacaciones ?></td>
          <td><?php echo $igssPat ?></td>
          <td><?php echo $total ?></td>
          
          
        </tr>
        <?php
      }
        ?>
      </tbody>
    </table>
  </div>

    </font>
</font>

<div>

<form  action="agregar.html" method="post">
  <button class="btn waves-effect waves-light" type="submit" name="action"><font face="Lucida Bright">Agregar</font>
   <i class="material-icons right">add</i>
  </button>
</form>
<br>
<form  action="admin.html" method="post">
  <button class="btn waves-effect waves-light" type="submit" name="action"><font face="Lucida Bright">Regresar</font>
   <i class="material-icons right">keyboard_return</i>
  </button>
</form>

</div>
  </body>
</html>
