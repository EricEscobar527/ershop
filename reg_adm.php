<?php
    include('conexion.php');

    $correo = $_POST['correo'];
    $contraseña = $_POST['contraseña'];

    
   $objeto = new Conexion;
   $conexion = $objeto->Conectar();

   $insertar = "INSERT INTO administradores VALUES ('$correo', '$contraseña')";

   $resultado = $conexion->prepare($insertar);
   $resultado->execute();

    
    if($resultado){
        echo '<script>alert("Administrador Registrado");parent.location = "index.php"</script>'; 

  }else{
    echo '<script>alert("Error al registrar");parent.location = "login_adm.php"</script>'; 
  }
?>