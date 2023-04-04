<?php

session_start();

include('../valotablapc.php');

include('../funciones.php');



$sql_clientes = "select nombre,telefono,email,direccion,observaci,idcliente,identi,fecha_cumpleanos 

from $tabla3 as cli   ";







//inner join $tabla4 car  on (car.propietario = cli.idcliente)

//,placa,marca,color,modelo

//include('../colocar_links2.php');

echo '<div id="contenidos>">';

echo '<h3>CONSULTA GENERAL DE CLIENTES</h3>';

echo '<h3><a href = "captura_cliente.php" >NUEVO CLIENTE</a></h3>';



echo '<table border = "1" width = "80%" >';

echo '<tr><td>NOMBRE</td><td>IDENTIFICACION</td><td>CUMPLEANOS</td><td>TELEFONO</td><td>EMAIL</td><td>DIRECCION</td><td>VER MOTOS</td>';

//echo '<td>PLACA</td><td>MARCA</td><td>MODELO</td><td>HISTORIAL</td></tr>';

$consulta_clientes = mysql_query($sql_clientes,$conexion);

while($clientes = mysql_fetch_array($consulta_clientes))

	{

			echo '<tr>';	

			//echo '<td>'.$clientes[0].'</td>';

			echo '<td><a href ="muestre_datos_cliente.php?idcliente='.$clientes[5].'" >'.$clientes[0].'</a></td>';

			//echo '<a href="orden_detallado.php?idorden='.$ordenes['0'].'">Ver Detalle</a>';

			

			echo '<td>'.$clientes[6].'</td>';

			echo '<td>'.$clientes[7].'</td>';

			echo '<td>'.$clientes[1].'</td>';

			echo '<td>'.$clientes[2].'</td>';

			echo '<td>'.$clientes[3].'</td>';

			echo '<td><a href = "muestre_motos_cliente.php?idcliente='.$clientes[5].'">VER POR CLIENTE</a></td>';

			echo '</tr>';

	}

echo '</table>';

echo '</div>';

echo '<div id = "muestre">';

echo '</div>';





?>