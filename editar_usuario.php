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
    <title>Editar direccion</title>
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
                <li><a href="">Mi cuenta</a></li>
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

   <div class="container_editar">
     
 <?php
include ("conexion.php");

$correo = $_GET['correo'];

$objeto = new Conexion;
$conexion = $objeto->Conectar();

$consulta = "SELECT CONCAT (nombre, ' ',  apellido_paterno) as nombre_completo, calle, colonia, municipio, cp, numero, estado FROM usuarios WHERE correo = '$correo'";

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
<div class="img_nom">
   <div> <img class="img_usuario" src="imagenes/usuario/usuario.png" alt=""></div>
   <div><h4><?php echo "<p>$nombre</p>"?></h4></div>
</div>

<div class="direccion">
    <form id="form_direccion" action="procesar_direccion.php?correo=<?php echo $correo;?>" method="POST">
   <div class="input_calle"><input type="text" value="<?php echo $calle?>" name="calle" id="calle"></div>
   <div><input type="text" value="<?php echo $colonia?>" name="colonia" id="colonia"></div>
   <div><input type="text" value="<?php echo $municipio?>" name="municipio" id="municipio"></div>
   <div><input type="text" value="<?php echo $estado?>" name="estado" id="estado"></div>
   <div><input type="number" value="<?php echo $cp?>" name="cp" id="cp"></div>
   <div><input class="input_numero" type="number" value="<?php echo $numero?>" name="numero" id="numero"></div>
   <input type="submit" value="Actualizar" class="btn_editar_usuario">
   </form>
   </div>
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
    <script src="validar_direccion.js"></script>
</body>
</html>