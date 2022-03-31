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
        
    </header>    

    <?php
include('conexion.php');
$id = $_GET["id"];
$producto = "SELECT * FROM productos WHERE id = '$id'";
?>
  <form id="form_actualizar" class="container_editar_producto" action="procesar_producto.php?id=<?php echo $id;?>" method="POST" enctype="multipart/form-data">
<table class="table_editar">
    <tr>
        <th>Nombre</th>
        <th>Precio</th>
        <th>Descripción</th>
        <th>Imagen</th>
        <th>Categoria</th>
        <th>Actualizar</th>
    </tr>
    <?php
        $objeto = new Conexion;
        $conexion = $objeto->Conectar();
        $resultadoDocentes = $conexion->prepare($producto);
        $resultadoDocentes->execute();
        while($row = $resultadoDocentes->fetch(PDO::FETCH_ASSOC)){ ?>
        <tr>
    <tr>
        <td><textarea name="nombre" id="nombre" cols="15" rows="5"><?php echo $row['nombre'];?></textarea></td>
        <td><input class="input_table_precio" type="number" name="precio" id="precio" value="<?php echo $row['precio'];?>"></td>
        <td><textarea name="descripcion" id="descripcion" cols="18" rows="10"><?php echo $row['descripcion'];?></textarea></td>
        <td class="input_editar_img"><input type="file" name="imagen" id="imagen" accept="image/*"></td>
        <td><select name="categoria" id="categoria">
        <option disabled selected value>Seleccionar</option>
            <option value="electronica">Electrónica</option>
            <option value="alimentos">Alimentos</option>
            <option value="electrodomesticos">Electrodomesticos</option>
            <option value="hogar">Para el hogar</option>
        </select></td>
        <td><input class="input_editar_adm" type="submit" value="Actualizar"></td>
    </tr>
    <?php } ?>
</table>

<script src="validar_actualizar.js"></script>
</body>
</html>