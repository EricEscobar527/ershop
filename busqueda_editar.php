<?php 
error_reporting(0);
require_once "BD/conexion.php";
$tabla="";

$termino= "";

if(isset($_POST['productos']))
{
	$termino=$mysqli->real_escape_string($_POST['productos']);
	$consulta="SELECT * FROM productos WHERE nombre LIKE '%".$termino."%'";
}
$consultaBD=$mysqli->query($consulta);

if($consultaBD->num_rows>=1){
	echo '<table class="table">
		<tr class="bg-primary">
			<th style="background-color:black; color:white;">Nombre</th>
			<th style="background-color:black; color:white;">Precio</th>
			<th style="background-color:black; color:white;">Descripción</th>
			<th style="background-color:black; color:white;">Imagen</th>
			<th style="background-color:black; color:white;">Categoria</th>
            <th style="background-color:black; color:white;">Editar</th>
		</tr>';
	while($fila=$consultaBD->fetch_array(MYSQLI_ASSOC)){
		echo
        '<tr>
			<td>'.$fila['nombre'].'</td>
			<td>'.$fila['precio'].'</td>
			<td>'.$fila['descripcion'].'</td>
			<td>'.'<img style="width:100px;" src="data:image/jpeg;base64,'.base64_encode($fila['imagen']).'"/>'.'</td>
			<td>'.$fila['categoria'].'</td>
            <td>'.'<a style="padding-top:4px; padding-bottom:4px; padding-left:7px; padding-right:7px; text-decoration: none;" class="submit_registrar_producto" href="actualizar_producto.php?id='.$fila['id'].';">Editar</a>'.'</td>
		 </tr>
		';
	}
	echo "</tbody>
	</table>";
}
?>