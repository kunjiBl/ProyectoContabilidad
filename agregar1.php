<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Agregar Productos</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="js/index.js"></script>
  </head>
  <body>

    <font face="Lucida Bright">
      <nav class="teal lighten-2">
        <div class="nav-wrapper">
          <a class="brand-logo"><img src="img/cafe5.png" width="63px" height = "63px" ></a>
          <ul id="nav-mobile" class="right hide-on-med-and-down">
            <li><a>Área Para Agregar Productos</a></li>
          </ul>
        </div>
      </nav>
      
      <div>
        <form  action="sp_agregar1.php" method="post" >
          
          
          
          <div class="row">
            <form class="col s12" method="post" action="user.php" >
              <div class="row">
                
                <div class="input-field col s12" >
                  <i class="material-icons prefix">dns</i>
                  
                  
                  
                  <select name="tipoProducto" id="tipoProducto">
                    <option value="Cafe"  selected>cafe</option>
                    <option value="Cafe Expresso">cafe Expresso</option>
                    <option value="Cafe Americano">cafe Americano</option>
                    
                  </select>
                  
                  <label>Tipo Producto</label>
                </div>
                
                <div class="input-field col s12">
              <i class="material-icons prefix">shopping_cart</i>
              <select name="Producto" id="producto">
                <option value="Azucar"  selected>Azucar</option>
                <option value="Agua">Agua</option>
                
                <option value="" id="productoDinamico"></option>              
                
              </select>
              
              <label>Producto</label>
            </div>
            
            
            
            <div class="input-field col s12">
              <i class="material-icons prefix">attach_money</i>
              <input type="text" name="Precio">
              <label>Precio</label>
            </div>
            <div class="input-field col s12">
              <i class="material-icons prefix">poll</i>
              <input type="text" name="Medida">
              <label>Medida</label>
            </div>
            <div class="input-field col s12" id="HOlaaaa">
              <i class="material-icons prefix">production_quantity_limits</i>
              <input type="text" name="Cantidad">
              <label>Cantidad</label>
            </div>
          </div>
          <button class="btn waves-effect waves-light" type="submit" name="action"><font face="Georgia">Agregar</font>
          <i class="material-icons right">add</i>
        </button>
      </form>
    </div>
    
  </form>
</div>

<script type="text/javascript">
        let cafeExpresso = "Café en Grano";
        let cafeAmericano ="Canela en Polvo";
        
        
        
        document.getElementById("tipoProducto").addEventListener("change",(e)=>{

          if(e.target.value === "Cafe Expresso"){
            
            document.getElementById("productoDinamico").value = "Café en Grano"
            document.getElementById("productoDinamico").textContent = "Café en Grano"
            document.querySelectorAll(".dropdown-content li")[5].innerHTML = "<span>Café en Grano</span>"
            
            
          }else if(e.target.value === "Cafe Americano"){
            document.getElementById("productoDinamico").value = "Canela en Polvo";
            document.getElementById("productoDinamico").textContent = "Canela en Polvo";
            document.querySelectorAll(".dropdown-content li")[5].innerHTML = "<span>Canela en Polvo</span>"
            
          }else if(e.target.value === "Cafe"){
            document.getElementById("productoDinamico").value = "Café Molido";
            document.getElementById("productoDinamico").textContent = "Café Molido";
            document.querySelectorAll(".dropdown-content li")[5].innerHTML = "<span>Café Molido</span>"
            
          }
        })

    </script>

<form  action="entrada-salida.php" method="post">
  
  <button class="btn waves-effect waves-light" type="submit" name="action"><font face="Georgia">Regresar</font>
  <i class="material-icons right">keyboard_return</i>
</button>

</form>
</font>
</body>
</html>
