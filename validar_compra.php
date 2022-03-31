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
    <title>Mis compras</title>
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

<?php
include ("conexion.php");

$correo = $_SESSION['correo'];

$objeto = new Conexion;
$conexion = $objeto->Conectar();

$consulta = "SELECT CONCAT (nombre, ' ',  apellido_paterno, ' ', apellido_materno) as nombre_completo, calle, colonia, municipio, cp, numero, estado FROM usuarios WHERE correo = '$correo'";

$resultado = $conexion->prepare($consulta);
$resultado->execute();

while($row = $resultado->fetch(PDO::FETCH_ASSOC)){    
    $nombre = $row['nombre_completo'];    
    $calle = $row['calle'];  
    $colonia = $row['colonia'];    
    $municipio = $row['municipio'];  
    $cp = $row['cp'];    
    $numero = $row['numero'];   
    $estado = $row['estado'];  
} 
?>
   <div class="validar_compra">
       <label for="">Dirección de envio</label> <a href="editar_direccion.php">Cambiar dirección</a>
   <div class="direccion_envio">
   <div><?php echo "<p>Calle: $calle </p>"?></div>
   <div><?php echo "<p>Colonia: $colonia</p>"?></div>
   <div><?php echo "<p>Municipio: $municipio</p>"?></div>
   <div><?php echo "<p>Estado: $estado</p>"?></div>
   <div><?php echo "<p>Codigo postal: $cp</p>"?></div>
   <div><?php echo "<p>Telefono: $numero</p>"?></div>
     </div>


     <?php
            $id = $_POST['id_producto']; 

            $objeto = new Conexion;
            $conexion = $objeto->Conectar();

            
            $consulta = "SELECT * FROM productos WHERE id = '$id'";

           $resultado = $conexion->prepare($consulta);
           $resultado->execute();
            
            while($row = $resultado->fetch(PDO::FETCH_ASSOC)){    
            ?> 

<label for="">Datos del producto</label>
     <div class="compra_producto">
         <div class="compra_img_precio">
     <div ><?php echo '<img class="compra_img" src="data:image/jpeg;base64,'.base64_encode($row['imagen']).'"/>'; ?></div>
    <div class="compra_nom_precio">
        <div><?php echo $row['nombre'];?></div>
        <div>Precio: $<?php echo $row['precio'];?>,00</div>
     </div>
        </div>

<div class="btn_finalizar_compra">
<label for="">Resumen del pedido</label>
<br>
<label for="">Total: $<?php echo $row['precio'];?>,00</label>
     <form action="finalizar_compra.php?correo=<?php echo $_SESSION['correo'];?>" method="POST">
     <input type="hidden" name="id_producto" value="<?php echo $row['id'];?>">
     <input type="hidden" name="total" value="<?php echo $row['precio'];?>">
     <input type="hidden" name="cliente_nombre" value="<?php echo $nombre?>">
         <input type="submit" value="Finalizar compra">
     </form>
</div>
     </div>
     <?php }?> 
   </div>;

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