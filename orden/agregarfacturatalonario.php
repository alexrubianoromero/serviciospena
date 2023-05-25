<?php
    include('../valotablapc.php');
    // echo 'agregar orden talonario';

    $sql = "update ordenes set nofacturatalonario =  '".$_REQUEST['nofacturatalonario']."' where id = '".$_REQUEST['id']."'    "; 
    $consulta = mysql_query($sql,$conexion);
    
    include('muestre_orden_sin_modif.php'); 



?>