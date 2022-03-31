<?php
    include ("conexion.php");

    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    $descripcion = $_POST['descripcion'];
    $imagen = addslashes(file_get_contents($_FILES['imagen']['tmp_name']));
    $categoria = $_POST['categoria'];
    $id = $_GET['id'];

   $objeto = new Conexion;
   $conexion = $objeto->Conectar();

    $actualizar = "UPDATE productos SET nombre = '$nombre', precio = '$precio', descripcion = '$descripcion', imagen = '$imagen', categoria = '$categoria' WHERE id = '$id'";

   $Actualizarproducto = $conexion->prepare($actualizar);
   $Actualizarproducto->execute();

   

    if($Actualizarproducto){
        echo '<script>alert("Producto actualizado");parent.location = "administrador.php"</script>'; 
  }else{
    echo '<script> alert("Error al Actualizar");parent.location = "administrador.php"</script>';
  }

?>