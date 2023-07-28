<?php
date_default_timezone_set('America/Bogota');
$raiz = dirname(dirname(__FILE__));
require_once($raiz.'/valotablapc.php');  
require_once($raiz.'/vehiculos/controlador/vehiculoControlador.php');
$_REQUEST['opcion']='pregunteCambioPlaca';
$vehiculo = new vehiculoControlador($conexion);
?>