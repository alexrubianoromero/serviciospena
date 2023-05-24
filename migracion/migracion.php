<?php
$raiz = dirname(dirname(__FILE__));
// echo $raiz;
require_once($raiz.'/conexion/Conexion.php');
class migracion extends Conexion
{
    public function __construct()
    {
        $this->migrarClientes();
    }
    


    public function migrarClientes()
    
    {
        // $sql = "select * from migracion_temporal  where cedula = '3014446872' ";
        $sql = "select * from migracion_temporal ";
        $consulta = mysql_query($sql,$this->connectMysql());
        $registros = $this->get_table_assoc($consulta);
        
        foreach($registros as $registro)
        {
            if($registro['nombre']=='' || $registro['nombre']=='')
            {

            }
            else{
                $existeCedula = $this->busqueIdentificacion($registro['cedula']);
                echo '<br>Arreglo<pre>'; 
                print_r($existeCedula);
                echo '</pre>fin arreglo<br>';
                if($existeCedula['filas']==0)
                {
                    echo 'no existe la cedula';
                    $this->crearCliente($registro);
                    $ultimoIdCliente = $this->traerUltimoidCliente0(); 
                    $idCliente = $ultimoIdCliente;
                    echo 'despues de crearlo es '. $idCliente; 
                }
                else 
                {
                    $idCliente = $existeCedula['idCliente'];
                }
                $this->crearVehiculo($registro,$idCliente); 
                echo '<br>'.$registro['placa']. ' idcliente '.$idCliente.' Almacenado'.' filas '.$$existeCedula['filas'];
            }
            // die('primera interaccion');
        }
    }

    public function busqueIdentificacion($cedula)
    {
        $respu = [];
        $sql="select * from cliente0 where identi = '".$cedula."'   "; 
        $consulta = mysql_query($sql,$this->connectMysql());
        $filas = mysql_num_rows($consulta);

        echo ' <br>filasconsulta  '.$filas; 
        if($filas>0)
        {
            $infoCliente = mysql_fetch_assoc($consulta); 
            $idCliente = $infoCliente['idcliente'];
        }
        else {
           $idCliente = 0; 
        }
        $respu['filas'] = $filas; 
        $respu['idCliente'] = $idCliente; 
        return $respu;
    } 

    public function crearCliente($registro)
    {
        if($registro['nombre']=='')
        {
            // echo '<br>'.$registro['placa'];
            $sql = "insert into cliente0 (identi,nombre,telefono,direccion,id_empresa) 
            values ('".$registro['id']."','Sin Informacion','Sin Informacion','Sin Informacion','50')"; 
            echo '<br>'.$sql; 
        }
        else
        {
            $sql = "insert into cliente0 (identi,nombre,telefono,direccion,id_empresa) 
            values ('".$registro['cedula']."','".$registro['nombre']."','".$registro['telefono']."'
            ,'".$registro['direccion']."','50')"; 
        }

        $consulta = mysql_query($sql,$this->connectMysql());
    }
    
    public function traerUltimoidCliente0()
    {
        $sql = "select max(idcliente) as idcliente from cliente0 ";
        $consulta = mysql_query($sql,$this->connectMysql());
        $arrId = mysql_fetch_assoc($consulta); 
        return $arrId['idcliente']; 
    }
    
    public function crearVehiculo($registro,$idcliente)
    {
        $sql = "insert into carros (placa,tipo,propietario,id_empresa) 
        values ('".$registro['placa']."','".$registro['tipo']."','".$idcliente."','50')"; 
        $consulta = mysql_query($sql,$this->connectMysql());
    }


}

$clase = new migracion();



?>