<?php
    include ("conexion.php");
    
   $correo = $_GET['correo'];
   $cliente = $_POST['cliente_nombre'];
   
   $objeto = new Conexion;
   $conexion = $objeto->Conectar();

  $actualizar = "INSERT INTO compras(id_sesion, id_productos, cliente, fecha) SELECT id_sesion, id_productos, '$cliente', NOW() FROM carritos WHERE id_sesion = '$correo'";

   $resultado = $conexion->prepare($actualizar);
   $resultado->execute();

   if($resultado){
       
    $objeto = new Conexion;
    $conexion = $objeto->Conectar();
 
   $eliminar = "DELETE FROM carritos WHERE id_sesion = '$correo '";
 
    $resultado = $conexion->prepare($eliminar );
    $resultado->execute();

  ?>
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


<div class="container_factura"> 
<label class="label_gracias" for="">Gracias por tu compra!!</label>


<?php
 $total = $_POST['total'];

$objeto = new Conexion;
$conexion = $objeto->Conectar();

$consulta = "SELECT CONCAT (nombre, ' ',  apellido_paterno) as nombre_completo FROM usuarios WHERE correo = '$correo'";

$resultado = $conexion->prepare($consulta);
$resultado->execute();

while($row = $resultado->fetch(PDO::FETCH_ASSOC)){    
    $nombre = $row['nombre_completo'];    
} 
?>
<div class="factura_compra">
    <h4>Hola: <?php echo $nombre;?></h4>
    <h4>Tu compra esta siendo procesada, ya solo falta depositar $<?php echo  $total;?>,00 al siguiente numero de cuenta bancaria XXXX-XXXX-XXXX-XXXX</h4>
<h4>Puedes realizar tu deposito en los siguientes lugares.</h4>
</div>
<div class="container_bancos">
    <img class="img_bancos" src="imagenes/bancos/banamex.jpg" alt="">
    <img class="img_bancos" src="imagenes/bancos/azteca.jpg" alt="">
    <img class="img_bancos" src="imagenes/bancos/bancomer.jpg" alt="">
    <img class="img_bancos" src="imagenes/bancos/scotiabank.jpg" alt="">
</div>

<?php
   $ids = $_POST['ids'];

   $objeto = new Conexion;
   $conexion = $objeto->Conectar();

  $producto_comprado = "SELECT ''productos.imagen, productos.nombre, productos.precio FROM productos INNER JOIN compras ON productos.id = compras.id_productos WHERE compras.id_sesion = '$correo'''";

   $resultado = $conexion->prepare($producto_comprado);
   $resultado->execute();

   while($row = $resultado->fetch(PDO::FETCH_ASSOC)){    
    $imagen = $row['imagen'];   
    $nombre = $row['nombre'];  
    $precio = $row['precio']; 

 ?>
 <label class="label_producto_comprado" for="">Producto(s) adquiridos</label>
<div class="producto_comprado">
<div ><?php echo '<img class="img_producto_comprado" src="data:image/jpeg;base64,'.base64_encode($imagen).'"/>'; ?></div>
<div class="nom_precio_comprado">
<h4><?php echo "<p>$nombre</p>"?></h4>
<h4><?php echo "<p>$ $precio,00</p>"?></h4>
</div>

</div>
<?php } ?>
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

    
<?php
}else{
echo '<script>alert("Error al agregar");parent.location = "principal.php"</script>'; 
}
?>