<?php
    include('conexion.php');

    $correo = $_POST['correo'];
    $contraseña = $_POST['contraseña'];
    $nombre = $_POST['nombre'];
    $apellido_paterno = $_POST['apellido_paterno'];
    $apellido_materno = $_POST['apellido_materno'];
    $celular = $_POST['celular'];
    $calle = $_POST['calle'];
    $colonia = $_POST['colonia'];
    $municipio = $_POST['municipio'];
    $estado = $_POST['estado'];
    $cp = $_POST['cp'];
    
   $objeto = new Conexion;
   $conexion = $objeto->Conectar();

   $insertar = "INSERT INTO usuarios(nombre, apellido_paterno, apellido_materno, correo, contraseña, numero, calle, colonia, municipio, estado, cp ) VALUES ('$nombre', '$apellido_paterno', '$apellido_materno', '$correo', '$contraseña', '$celular', '$calle', '$colonia', '$municipio', '$estado', '$cp')";

   $resultado = $conexion->prepare($insertar);
   $resultado->execute();

    
    if($resultado){
        echo '<script>alert("Cliente Registrado");parent.location = "index.php"</script>'; 

  }else{
    echo '<script>alert("Error al registrar");parent.location = "login_user.php"</script>'; 
  }
?>