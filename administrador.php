<?php
session_start();
error_reporting(0);
$varsesion = $_SESSION['correo'];
if($varsesion == NULL || $varsesion = ''){
    header("location:index.php");
    die();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="estilos.css">
    <script src="JS/jquery-3.6.0.min.js"></script> 
    <script src="tab_administrador.js"></script>
</head>
<body>
<header>
        <input type="checkbox" id="btn-menu">
        <label for="btn-menu"><img class="img_menu" src="imagenes/wallpaper/menu.png" alt=""></label>
        <nav class="menu">
            <ul>
                <li class="nuevo_producto"><a href="#tab1">Agregar producto</a></li>
                <li class="ventas"><a href="#tab2">Ventas</a></li>
                <li class="editar_producto"><a href="#tab3">Editar producto</a></li>
                <li><a href="cerrar_sesion.php">Cerrar sesión</a></li>
            </ul>
        </nav>
    </header>    
<div class="formularios">
    <form id="tab1" class="form_nuevo_producto" action="nuevo_producto.php" method="POST" enctype="multipart/form-data">
        <div class="form_container_producto">
            <div>
                <input type="text" name="nombre" id="nombre" placeholder="Nombre del prducto">
            </div>
            <div>
                <input type="number" name="precio" id="precio" placeholder="Precio">
            </div>
            <div>
                <textarea rows="6" cols="45" name="descripción" id="descripcion" placeholder="Descripción del producto"></textarea> 
            </div>
            <div>
                <label for="">Imagen del producto</label>
                <input type="file" name="imagen" id="imagen" accept="image/*">
            </div>
            <div>
                <label for="">Selecciona la categoria</label>
                <select name="categoria" id="categoria">
                    <option disabled selected value>Selecciona una opción</option>
                    <option value="electronica">Electrónica</option>
                    <option value="alimentos">Alimentos</option>
                    <option value="electrodomesticos">Electrodomesticos</option>
                    <option value="hogar">Para el hogar</option>
                 
                </select>
            </div>
            </div>
            
            <input class="submit_registrar_producto" type="submit" value="Registar producto">
    </form>

<form class="form_ventas" id="tab2" method="POST">
    <div class="ventas_hijo">
<label for="">Buscar ventas</label>
<br>
<br>
<select name="mes" id="mes">
    <option value="01">Enero</option>
    <option value="02">Febrero</option>
    <option value="03">Marzo</option>
    <option value="04">Abril</option>
    <option value="05">Mayo</option>
    <option value="06">Junio</option>
    <option value="07">Julio</option>
    <option value="08">Agosto</option>
    <option value="09">Septiembre</option>
    <option value="10">Octubre</option>
    <option value="11">Noviembre</option>
    <option value="12">Diciembre</option>

</select>
<button class="btn_buscar_ventas" type="button" id="enviar">Buscar</button>
</div>

<div id="resultado_mes"></div>
</form>

    <form id="tab3" class="form_editar_producto" action="" method="POST">
        <label for="">Editar productos</label>
<input class="input_buscar_producto_editar" type="text" name="buscar" id="buscar" placeholder="Escribe el nombre del producto">
<div id="tabla_resultados">
    
</div>
    </form>
    </div>
  


    <script src="buscar_editar.js"></script>
    <script src="validar_producto.js"></script>
</body>
</html>