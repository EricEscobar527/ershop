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
	echo "
	<table class='responsive-table table table-hover table-bordered'>
	<tbody>";
	while($fila=$consultaBD->fetch_array(MYSQLI_ASSOC)){
		echo "<tr>
		<td style='border: none'><a style='text-decoration: none; color: black; font-family: Roboto, Arial, sans-serif; font-weight: bold; font-size: 13px;' href='articulo.php?id=".$fila['id']."'>".$fila['nombre']."</a></td>	
		</tr>";
	}
	echo "</tbody>
	</table>";
}
?>