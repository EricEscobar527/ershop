<?php
    include('conexion.php');

    $imagen = addslashes(file_get_contents($_FILES['imagen']['tmp_name']));
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    $descripción = $_POST['descripción'];
    $categoria = $_POST['categoria'];



            $objeto = new Conexion;
            $conexion = $objeto->Conectar();
         
            $insertar = "INSERT INTO productos VALUES ('', '$nombre', '$precio', '$descripción', '$imagen', '$categoria')";
         
            $resultado = $conexion->prepare($insertar);
            $resultado->execute();
         
             
             if($resultado){
                 echo '<script>alert("Producto registrado");parent.location = "administrador.php"</script>'; 
         
           }else{
             echo '<script>alert("Error al registrar");parent.location = "administrador.php"</script>'; 
           }

        
    
?>