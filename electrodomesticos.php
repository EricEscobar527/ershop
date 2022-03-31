<?php
session_start();
error_reporting(0);
$varsesion = $_SESSION['correo'];
if($varsesion == NULL || $varsesion = ''){
    header("location:index.php");
    die();
}?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Electrodomesticos</title>
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

<div class="container_alimentos">
<?php

            $objeto = new Conexion;
            $conexion = $objeto->Conectar();

            $consulta = "SELECT * FROM productos WHERE categoria = 'electrodomesticos'";

           $resultado = $conexion->prepare($consulta);
           $resultado->execute();
            
            while($row = $resultado->fetch(PDO::FETCH_ASSOC)){    
                $imagen = $row['imagen'];    
                $nombre = $row['nombre'];  
                $precio = $row['precio'];  
                $desccripcion = $row['descripcion'];
                $id = $row['id'];
    ?>
    <a href="articulo.php?id=<?php echo $id;?>">
    <div class="alimentos_img">
        <?php echo '<img class="img_alimentos" src="data:image/jpeg;base64,'.base64_encode($imagen).'"/>'; ?>
    </div>
    <div class="contenido">
    <div class="alimentos_nombre"><?php echo "<p>$nombre</p>"?></div>
    <div class="alimentos_descr"><?php echo "<p>$desccripcion</p>"?></div>
    <div class="alimentos_precio"><?php echo "<p>Precio: $ $precio,00</p>"?></div>
    </a>
    <div class="botones">
    <form action="validar_compra.php" method="POST">
                <input type="hidden" name="id_producto" value="<?php echo $row['id'];?>">
                <input class="btn_compra" type="submit" value="Comprar ahora">
            </form>
    <?php 
        $correo = $_SESSION['correo'];
        $producto = $row['id'];

        $objeto = new Conexion;
        $conexion = $objeto->Conectar();
     
       $revisar_carrito = "SELECT id_productos FROM carritos WHERE id_sesion = '$correo' AND id_productos = '$producto'";
     
        $resultado_carrito = $conexion->prepare($revisar_carrito);
        $resultado_carrito->execute();

        $carrito_ids = $resultado_carrito->fetchAll(\PDO::FETCH_OBJ);
    
     if ($carrito_ids){?>
        <form method="POST" action="eliminar_carrito_electrodomesticos.php?correo=<?php echo $_SESSION['correo'];?>">
                <input type="hidden" name="id_producto" value="<?php echo $row['id'];?>">
                <span class="btn_en_el_carrito">En el carrito</span>
                <input class="btn_carrito" type="submit" value="Quitar">
            </form>
<?php }else { ?>
        <form method="POST" action="agregar_carrito_electrodomesticos.php?correo=<?php echo $_SESSION['correo'];?>">
                <input type="hidden" name="id_producto" value="<?php echo $row['id'];?>">
                <input class="btn_carrito" type="submit" value="Agregar al carrito">
            </form>
            <?php  } ?>
    </div>
    </div>
    <?php  } ?>

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