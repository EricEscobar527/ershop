<?php
    include ("conexion.php");
    error_reporting(0);

    $calle = $_POST['calle'];
    $colonia = $_POST['colonia'];
    $municipio = $_POST['municipio'];
    $estado = $_POST['estado'];
    $cp = $_POST['cp'];
    $numero = $_POST['numero'];
    $correo = $_GET['correo'];
 
   $objeto = new Conexion;
   $conexion = $objeto->Conectar();

    $actualizar = "UPDATE usuarios SET calle = '$calle', colonia = '$colonia', municipio = '$municipio', estado = '$estado', cp = '$cp', numero = '$numero' WHERE correo = '$correo'";

   $ActualizarUsuario = $conexion->prepare($actualizar);
   $ActualizarUsuario->execute();

   

    if($ActualizarUsuario){
        echo '<script>alert("Informacion Actualizada");parent.location = "editar_direccion.php"</script>'; 
  }else{
    echo '<script> alert("Error al Actualizar");parent.location = "editar_direccion.php"</script>';
  }

?>