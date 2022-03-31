<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="JS/jquery-3.6.0.min.js"></script> 
    <link rel="stylesheet" href="reg.clientes.css">
</head>
<body>

<div class="container-login2">
    <form id="login_user" action="reg_user.php" method="POST">
    <Label class="label1">Clientes</Label>
    <br>
    <br>
    <label class="label2" for="">Datos personales</label>
    <br>
        <input class="correo" type="text" name="correo" id="correo" placeholder="Escribe tu correo electronico">
        <input class="contraseña" type="password" name="contraseña" id="contraseña" placeholder="Escribe una contraseña"> 
        <input class="nombre" type="text" name="nombre" id="nombre" placeholder="Escribe tu Nombre(s)">
        <input class="apellido1" type="text" name="apellido_paterno" id="apellido_paterno" placeholder="Escribe tu Apellido paterno">
        <input class="apellido2" type="text" name="apellido_materno" id="apellido_materno" placeholder="Escribe tu Apellido materno">
        <br>
        <br>
        <label class="label3" for="">Dirección</label>
        <br>
        <input class="celular" type="number" name="celular" id="celular" placeholder="Escribe tu celular">
        <input class="calle" type="text" name="calle" id="calle" placeholder="Escribe tu calle">
        <input class="colonia" type="text" name="colonia" id="colonia" placeholder="Escribe tu colonia">
        <input class="municipio" type="text" name="municipio" id="municipio" placeholder="Escribe tu municipio">
        <input class="estado" type="text" name="estado" id="estado" placeholder="Escribe tu estado">
        <input class="cp" type="number" name="cp" id="cp" placeholder="Escribe tu codigo postal">
        <br>
        <input type="submit" value="Registrar" id="submit" name="submit">
    </form>
</div>
    
<script src="reg_user_validacion.js"></script>
</body>
</html>