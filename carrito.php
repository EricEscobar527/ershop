<?php
session_start();
error_reporting(0);
$varsesion = $_SESSION['correo'];
if($varsesion == NULL || $varsesion = ''){
    header("location:index.php");
    die();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito</title>
    <link rel="stylesheet" href="estilos.css">
    <script src="JS/jquery-3.6.0.min.js"></script> 
</head>
<body>
<header>
<div class="logo">
        <a href="principal.php">
            <img src="imagenes/logo/cooltext402039614369500.png" alt="">
            </a>
        </div>

        <?php 
            include ("conexion.php");
            $correo = $_SESSION['correo'];
            $objeto = new Conexion;
            $conexion = $objeto->Conectar();

            $consulta = "SELECT COUNT(id_productos) AS total_productos FROM carritos WHERE id_sesion = '$correo'";           
            $resultado = $conexion->prepare($consulta);
            $resultado->execute();
            while($row = $resultado->fetch(PDO::FETCH_ASSOC)){    
                $total_productos = $row['total_productos'];
            }?> 
        <div class="div_carrito_logo">
            <a href="carrito.php">
                <img class="carrito_logo" src="imagenes/carrito/carrito-de-compras.png" alt="">
                <span class="span_carrito_total">(<?php echo $total_productos;?>)</span>
            </a>
        </div>
    
        <input type="checkbox" id="btn-menu">
        <label for="btn-menu"><img class="img_menu" src="imagenes/wallpaper/menu.png" alt=""></label>
        <nav class="menu">
            <ul>
                <li><a href="alimentos.php">Alimentos</a></li>
                <li><a href="electrodomesticos.php">Electrodomesticos</a></li>
                <li><a href="electronica.php">Electronica</a></li>
                <li><a href="hogar.php">Para el hogar</a></li>
                <li><a href="mi_cuenta.php">Mi cuenta</a></li>
                <li><a href="cerrar_sesion.php">Cerrar sesión</a></li>
            </ul>
        </nav>
    </header>

    <div class="search">
   <input class="form-control mr-sm-4" type="text" name="termino" id="termino" placeholder="Buscar articulo......" aria-label="Search">
   <section class="content-area">
   <div class="table-area" id="tabla_resultados">
   </div>
   </section>
   </div>

   <label for="" class="titulo_carrito">Carrito</label>
 
            <?php 

            $correo = $_SESSION['correo'];
            $objeto = new Conexion;
            $conexion = $objeto->Conectar();

            $consulta = "SELECT COUNT(id_productos) AS total_productos FROM carritos WHERE id_sesion = '$correo'";           
            $resultado = $conexion->prepare($consulta);
            $resultado->execute();
            while($row = $resultado->fetch(PDO::FETCH_ASSOC)){    
                $total_productos = $row['total_productos'];
            }?>  

   <div class="container_carrito">
       <?php if($total_productos == 0){ ?>
        <label for="" class="no_hay_productos">No hay articulos</label>
        <?php }else{  ?>
       <div class="articulos_carrito">
   <?php 
   
            $correo = $_SESSION['correo'];

            $objeto = new Conexion;
            $conexion = $objeto->Conectar();

            $consulta = "SELECT productos.imagen, productos.nombre, productos.precio, productos.id FROM productos INNER JOIN carritos ON productos.id = carritos.id_productos WHERE carritos.id_sesion = '$correo'";           
            $resultado = $conexion->prepare($consulta);
            $resultado->execute();
            
            while($row = $resultado->fetch(PDO::FETCH_ASSOC)){    
                $imagen = $row['imagen'];    
                $nombre = $row['nombre'];  
                $precio = $row['precio'];  
                $id = $row['id'];
              ?>  
<div class="carrito_img"><?php echo '<img class="img_carrito" src="data:image/jpeg;base64,'.base64_encode($imagen).'"/>'; ?></div>
<div class="carrito_nombre"><?php echo "<p>$nombre</p>"?></div>
<div class="carrito_precio"><?php echo "<p>$ $precio,00</p>"?></div>
<form method="POST" action="eliminar_carrito_sesion.php?correo=<?php echo $_SESSION['correo'];?>">
<input type="hidden" name="id_producto" value="<?php echo $id;?>">
<input class="carrito_boton" type="submit" value="Eliminar">
</form>
    <?php }  ?>

<div class="div_comprar_carrito">
<?php 
   $correo = $_SESSION['correo'];

   $objeto = new Conexion;
   $conexion = $objeto->Conectar();

   $consulta = "SELECT SUM(productos.precio) AS precio FROM productos INNER JOIN carritos ON productos.id = carritos.id_productos WHERE carritos.id_sesion = '$correo'";           
   $resultado = $conexion->prepare($consulta);
   $resultado->execute();
   
   while($row = $resultado->fetch(PDO::FETCH_ASSOC)){    
       $precios = $row['precio'];

    }
     ?> 

    <form action="comprar_carrito.php" method="POST">
        <label for="">Total:$<?php echo $precios;?>,00</label>
        <br>
        <input class="btn_comprar_carrito" type="submit" value="Realizar compra">
    </form>
</div>
   </div>
   <?php }  ?>
   </div>
   
   <footer>
    <div class="footer_container">
        <h2>Desarrollado por: Eric Antonio Escobar Colin</h2>
        <h4>Estudiante del Tecnologico de Estudios Superiores De Cuautitlan Izcalli</h4>
        <h4>Ingenieria en sistemas computacionales</h4>

           <div class="redes">
               <a target="_blank" href="https://www.linkedin.com/in/eric-antonio-escobar-colin-41ab4621b/"><img src="imagenes/Redes_Sociales/linkedin.png" alt=""></a>
               <a target="_blank" href="https://www.facebook.com/EricEscobar527/"><img src="imagenes/Redes_Sociales/facebook.png" alt=""></a>
               <a target="_blank" href="https://twitter.com/eric_escobar527"><img src="imagenes/Redes_Sociales/twitter.png" alt=""></a>
           </div>

       </div>
    </footer>


    
    <script src="buscar.js"></script>
</body>
</html>