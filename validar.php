<?php
include ("conexion.php");

$tipo = $_POST['tipo_usuario'];
$correo = $_POST['correo'];
$contraseña = $_POST['contraseña'];
session_start();

$_SESSION['correo']=$correo;

switch($tipo){
    case $tipo == 'usuarios':

$objeto = new Conexion;
$conexion = $objeto->Conectar();

$usuarios = "SELECT * FROM usuarios WHERE correo = '$correo' AND contraseña = '$contraseña'"; 

$resultado = $conexion->prepare($usuarios);
$resultado->execute();

$filas_usuarios = $resultado->fetch(PDO::FETCH_ASSOC);

if($filas_usuarios){
    header("location:principal.php");
}else{
    ?> 
    <?php
    echo '<script>alert("Error de autentificación");parent.location = "index.php"</script>'; 
    ?>
    <?php
};
    break;

    case $tipo == 'administradores': 

 $objeto = new Conexion;
$conexion = $objeto->Conectar();

$administradores = "SELECT * FROM administradores WHERE correo = '$correo' AND contraseña = '$contraseña'"; 

$resultado = $conexion->prepare($administradores);
$resultado->execute();

$filas_administradores = $resultado->fetch(PDO::FETCH_ASSOC);

if($filas_administradores){
    header("location:administrador.php");
}else{
    ?> 
    <?php
    echo '<script>alert("Error de autentificación");parent.location = "index.php"</script>'; 
    ?>
    <?php
};
        break;
}


