<?php
    include ("conexion.php");
    
    $correo = $_GET['correo'];
    $producto = $_POST['id_producto'];
   

   $objeto = new Conexion;
   $conexion = $objeto->Conectar();

  $actualizar = "DELETE FROM carritos WHERE id_sesion = '$correo' AND id_productos = '$producto'";

   $resultado = $conexion->prepare($actualizar);
   $resultado->execute();

   if($resultado){
    header("Location: articulo.php?id=$producto"); 
}else{
echo '<script>alert("Error al Eliminar");parent.location = "principal.php"</script>'; 
}
   
?>