<?php
    include ("conexion.php");
    
    $correo = $_GET['correo'];
    $producto = $_POST['id_producto'];
   

   $objeto = new Conexion;
   $conexion = $objeto->Conectar();

  $actualizar = "INSERT INTO carritos(id_sesion, id_productoS) VALUES('$correo', '$producto')";

   $resultado = $conexion->prepare($actualizar);
   $resultado->execute();

   if($resultado){
    header("Location: articulo.php?id=$producto"); 
}else{
echo '<script>alert("Error al agregar");parent.location = "principal.php"</script>'; 
}
?>