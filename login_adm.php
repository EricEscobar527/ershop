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
    <form action="reg_adm.php" id="reg_adm" method="POST">
    <Label>Administrador</Label>
        <input type="text" name="correo" id="correo" placeholder="Escribe tu correo electronico">
        <input type="password" name="contraseña" id="contraseña" placeholder="Escribe una contraseña">
        <input type="submit" value="Registrar" id="submit" name="submit">
    </form>
</div>
    
<script src="reg_adm_validacion.js"></script>
</body>
</html>