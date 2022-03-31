<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>

<div class="container-login">

    <form id="index" class="" action="validar.php" method="POST">
        <label for="">Bienvenido</label>
        <input type="text" name="correo" id="correo" placeholder="Correo electronico">
        <input type="password" name="contraseña" id="contraseña" placeholder="Contraseña">
        <select class="select_login" name="tipo_usuario" id="select">
        <option disabled selected value>Tipo de usuario</option>
        <option value="usuarios">Cliente</option>
        <option value="administradores">Administrador</option>
        </select>
        <input type="submit" value="Ingresar">
    </form>
    <div class="recuperar">
    <h4>¿No tienes cuenta? <a href="registrar_usuarios.php">Registrate</a></h4>
    </div>
</div>
    
<script src="index_validacion.js"></script>
</body>
</html>

