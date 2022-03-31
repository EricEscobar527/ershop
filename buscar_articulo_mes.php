<?php

require_once "BD/conexion.php";

$mes = $_POST['mes'];

$consulta = "SELECT id_sesion, productos.nombre, cliente, DATE_FORMAT(fecha, '%d/%m/%y') AS fecha FROM compras INNER JOIN productos ON productos.id = compras.id_productos WHERE month(fecha) = '$mes'"; 

$consultaBD=$mysqli->query($consulta);
$i=1;

         if($consultaBD->num_rows>=1){
            echo '<table class="tabla_mes">
                <tr class="">
                    <th style="background-color:black; color:white;">No</th>
                    <th style="background-color:black; color:white;">Producto</th>
                    <th style="background-color:black; color:white;">Cliente</th>
                    <th style="background-color:black; color:white;">Correo</th>
                    <th style="background-color:black; color:white;">Fecha</th>
                </tr>';
            while($row=$consultaBD->fetch_array(MYSQLI_ASSOC)){
                echo
                '<tr>
                    <td>'.$i++.'</td>
                    <td>'.$row['nombre'].'</td>
                    <td>'.$row['cliente'].'</td>
                    <td>'.$row['id_sesion'].'</td>
                    <td>'.$row['fecha'].'</td>
                 </tr>
                ';
            }
            echo "</tbody>
            </table>";
        }else{
            echo '<p class="resultado_mes">No hay ventas en este mes</p>';
        }
            ?>
