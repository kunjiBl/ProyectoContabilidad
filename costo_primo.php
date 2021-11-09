<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Costo Primo</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  </head>
  <body>

  <font face="Lucida Bright">      
    <nav class="teal lighten-2">
    <div class="nav-wrapper">
     <a class="brand-logo"><img src="img/cafe5.png" width="63px" height = "63px"></a>
     <ul id="nav-mobile" class="right hide-on-med-and-down">
       <li><a style="color:#403826">Área Para Agregar Productos</a></li>
     </ul>
    </div>
    </nav>

  <div>
    <div>
      <table>
        <thead>
        
        <form  action="costo_primo.php" method="post" >
        
        <button  class="btn waves-effect brown darken-1" type="submit" name="1" value="1"><font face="Lucida Bright">Cafe</font>  
        </button>
        <button class="btn waves-effect brown darken-1" type="submit" name="1" value="2"><font face="Lucida Bright">Cafe Expresso<?php?></font>  
        </button>
        <button class="btn waves-effect brown darken-1" type="submit" name="1" value="3"><font face="Lucida Bright">Cafe Americano</font>  
        </button>
        </form>

          <tr>
            <th style="color:#7D431C">Producto</th>
            <th style="color:#7D431C">Precio</th>
            <th style="color:#7D431C">Cantidad</th>
            <th style="color:#7D431C">Precio*Cantidad</th>
          </tr>
        </thead>

          

        <tbody>
          <?php          
            $boton1 = $_POST['1'];

            $arrayPrecio = array();
            $arrayCantidad = array();
            $total = array();
            $sumaTotal = 0;
            include('conexion.php');
            
                    $us=new conexion();
                    $q="SELECT i.`id`,i.`producto`,  i.`precio`, i.`cantidad`, i.`tipoProducto`  FROM `inventario`i ";
                    $rta=mysqli_query($us, $q);
                    while ($mostrar = mysqli_fetch_row($rta)){

                      

                      if ( ($mostrar['4']=="Cafe" ) && ($boton1==1)) {
                        $precio = $mostrar['2'];
                         $cantidad = $mostrar['3'];
                        $contId = $mostrar['0'];
                        $arrayPrecio[$contId] = $precio;
                        $arrayCantidad[$contId] = $cantidad;
                      
                        $total[$contId] =   $arrayPrecio[$contId] * $arrayCantidad[$contId] ;
                        $sumaTotal = array_sum($total);
                      
          ?>
          <tr>
            <td><?php echo $mostrar['1']?></td>
            <td><?php echo $mostrar['2']?></td>
            <td><?php echo $mostrar['3']?></td>
            <td><?php echo $total[$contId]?></td>
          </tr>        
          
          <?php  
            }else if ( ($mostrar['4']=="Cafe Expresso" ) && ($boton1==2)) {
              $precio = $mostrar['2'];
               $cantidad = $mostrar['3'];
              $contId = $mostrar['0'];
              $arrayPrecio[$contId] = $precio;
              $arrayCantidad[$contId] = $cantidad;
            
              $total[$contId] =   $arrayPrecio[$contId] * $arrayCantidad[$contId] ;
              $sumaTotal = array_sum($total);      
         
          ?>
          <tr>
          <td><?php echo $mostrar['1']?></td>
          <td><?php echo $mostrar['2']?></td>
          <td><?php echo $mostrar['3']?></td>
          <td><?php echo $total[$contId]?></td>
        </tr>

          <?php     
          }else if ( ($mostrar['4']=="Cafe Americano" ) && ($boton1==3)) {
            $precio = $mostrar['2'];
             $cantidad = $mostrar['3'];
            $contId = $mostrar['0'];
            $arrayPrecio[$contId] = $precio;
            $arrayCantidad[$contId] = $cantidad;
          
            $total[$contId] =   $arrayPrecio[$contId] * $arrayCantidad[$contId] ;
            $sumaTotal = array_sum($total);    

          ?>

          <tr>
          <td><?php echo $mostrar['1']?></td>
          <td><?php echo $mostrar['2']?></td>
          <td><?php echo $mostrar['3']?></td>
          <td><?php echo $total[$contId]?></td>
        </tr>


          <?php     
          } 
        } 
          ?>
          

        </tbody>
      </table>

      
      <center><h6 style="color:#7D431C">Materia Prima Directa (suma total precio* cantidad) =  <?php echo $sumaTotal ?></h6></center>
      <br>

    </div>

    <br>
      <center><h5 style="color:#7D431C">Plantilla de trabajador</h5></center>

    <div>
      <table>
        <thead>
          <tr>
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
            $liquidoArray = array();
        
            $q="SELECT `id`, `nombre`, `puesto`, `sueldo`, `bonificación`, `total_devengado`, `igss`, `prestamo`, `anticipo` FROM `trabajadores`";
                    $rta=mysqli_query($us, $q);
                    while ($mostrar = mysqli_fetch_row($rta)){

                      $dev=$mostrar['3']+$mostrar['4'];
                      $IGSS=$mostrar['3']*0.0483;
                      $desc=$IGSS+$mostrar['7']+$mostrar['8'];
                      $liquido=  $dev-$desc;
                      $manoObra = 0;

                      if( ($mostrar['2'] == "Barista") || ($mostrar['2'] == "Cocinero") ){
                        $liquidoArray["1-($liquido)"] = $liquido;
                      }
                      $manoObra = array_sum($liquidoArray);  
                      
    
          ?>
          <tr>  
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
            <!--<td><a href="sp_eliminarT.php? Id=<?php echo $mostrar['0'] ?>" style="color:#9D1010">Eliminar</a></td>-->
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
          $totalDevengado = array();
          $arrayPrestaciones = array();

                  $q="SELECT `id`, `nombre`, `puesto`, `sueldo`, `bonificación`, `total_devengado`, `igss`, `prestamo`, `anticipo` FROM `trabajadores`";
                  $rta=mysqli_query($us, $q);
                  while ($mostrar = mysqli_fetch_row($rta)){
                    
                    $idArray = $mostrar['0'];
                    $totalDevengado[$idArray] = $mostrar['3']+$mostrar['4'];;
                  
                  
        ?>
        <tr>
          
          <?php $aguinaldo=$mostrar['3']*0.0833;?>
          <?php $bono14=$mostrar['3']*0.0833;?>
          <?php $indem=$mostrar['3']*0.0833;?>
          <?php $vacaciones= ($mostrar['3']*15)/365 ;?>
          <?php $igssPat=$mostrar['3']*0.1267;?>
          <?php $totalPrestaciones= ($aguinaldo+$bono14+$indem+$vacaciones+$igssPat) ;?>
          <?php $arrayPrestaciones[$idArray] = $totalPrestaciones?>

          <td><?php echo $mostrar['0'] ?></td>
          <td><?php echo $mostrar['1'] ?></td>
          <td><?php echo $mostrar['2'] ?></td>
          <td><?php echo $mostrar['3'] ?></td>
          <td><?php echo $aguinaldo ?></td>
          <td><?php echo $bono14 ?></td>
          <td><?php echo $indem ?></td>
          <td><?php echo $vacaciones ?></td>
          <td><?php echo $igssPat ?></td>
          <td><?php echo $totalPrestaciones ?></td>
          
          
        </tr>
        <?php
        
        #EN CASO DE QUE SOLO DEBA CALCULAR BARISTA Y COCINERO COOLOR UN IF 
        #if( ($mostrar['2'] == "Barista") || ($mostrar['2'] == "Cocinero") ){}       
      }
      $totalManoObra = array_sum($arrayPrestaciones) + array_sum($totalDevengado);
      
        ?>
      </tbody>
    </table>
  </div>

  <center><h6 style="color:#7D431C">Mano de obra Directa (total devengado + total prestaciones) = <?php echo $totalManoObra ?> </h6></center>

  <br>
  <center><h5>Costo Primo</h5></center>
    
    <div>
      <table>
        <thead>
          <tr>
            <th style="color:#7D431C">Materia Prima Directa</th>
            <th style="color:#7D431C">Mano de Obra Directa</th>
            <th style="color:#7D431C">Costo Primo</th>
          </tr>
        </thead>

          

        <tbody>
          

          <tr>
            <td><?php echo $sumaTotal?></td>
            <td><?php echo $totalManoObra?></td>
            <td><?php echo $totalManoObra + $sumaTotal?></td>
          </tr>

        </tbody>
      </table>
    </div>

  </div>

</font>

<div>

<br>
<form  action="admin.html" method="post">
  <button class="btn waves-effect waves-light" type="submit" name="action"><font face="Georgia">Regresar</font>
   <i class="material-icons right">keyboard_return</i>
  </button>
</form>

</div>
  </body>
</html>
