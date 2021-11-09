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
      <font size=4>
    <nav class="teal lighten-2">
    <div class="nav-wrapper">
     <a class="brand-logo"><img src="img/cafe5.png" width="63px" height = "63px"></a>
     <ul id="nav-mobile" class="right hide-on-med-and-down">
       <li><a style="color:#403826">Área Para Agregar Productos</a></li>
     </ul>
    </div>
    </nav>

  <div>


  <center><h5 style="color:#713B20">Cafe</h5></center>

    <table>
      <thead>
        <tr>
          <th style="color:#7D431C">ID</th>
          <th style="color:#7D431C">PRODUCTO</th>
          <th style="color:#7D431C">PRECIO UNITARIO (Q)</th>
          <th style="color:#7D431C">UNIDAD DE MEDIDA</th>
          <th style="color:#7D431C">CANTIDAD</th>
          <th style="color:#7D431C">PRECIO TOTAL (Q)</th>
        </tr>
      </thead>
      <tbody>
        <?php
          include('conexion.php');

                   $us=new conexion();
                   $q="SELECT `id`, `producto`, `precio`, `medida`, `cantidad`, `tipoProducto` FROM `inventario`";
                   $rta=mysqli_query($us, $q);
                   while ($mostrar = mysqli_fetch_row($rta)){

                  if($mostrar['5'] == "Cafe"){
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
        }
        ?>
      </tbody>
    </table>
  </div>

  <div>
    <br>
  <center><h5 style="color:#713B20">Cafe Expresso</h5></center>

    <table>
      <thead>
        <tr>
          <th style="color:#7D431C">ID</th>
          <th style="color:#7D431C">PRODUCTO</th>
          <th style="color:#7D431C">PRECIO UNITARIO (Q)</th>
          <th style="color:#7D431C">UNIDAD DE MEDIDA</th>
          <th style="color:#7D431C">CANTIDAD</th>
          <th style="color:#7D431C">PRECIO TOTAL (Q)</th>
        </tr>
      </thead>
      <tbody>
        <?php                             
                   $rta=mysqli_query($us, $q);
                   while ($mostrar = mysqli_fetch_row($rta)){

                  if($mostrar['5'] == "Cafe Expresso"){
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
        }
        ?>
      </tbody>
    </table>
  </div>

  <div>
  <br>
  <center><h5 style="color:#713B20">Cafe Americano</h5></center>

    <table>
      <thead>
        <tr>
          <th style="color:#7D431C">ID</th>
          <th style="color:#7D431C">PRODUCTO</th>
          <th style="color:#7D431C">PRECIO UNITARIO (Q)</th>
          <th style="color:#7D431C">UNIDAD DE MEDIDA</th>
          <th style="color:#7D431C">CANTIDAD</th>
          <th style="color:#7D431C">PRECIO TOTAL (Q)</th>
        </tr>
      </thead>
      <tbody>
        <?php                             
                   $rta=mysqli_query($us, $q);
                   while ($mostrar = mysqli_fetch_row($rta)){

                  if($mostrar['5'] == "Cafe Americano"){
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
        }
        ?>
      </tbody>
    </table>
  </div>

  </font>
</font>
<div>

<form  action="agregar1.php" method="post">
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
