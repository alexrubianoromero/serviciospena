<?php

$raiz = dirname(dirname(dirname(__file__)));

require_once($raiz.'/movil/vista/movilVista.php');
require_once($raiz.'/movil/model/UsuarioModel.php');



class movilControlador{

    private $vista;
    private $model; 

    public function __construct($conexion){

                //   echo '<pre>';

                //   print_r($_REQUEST);

                //   echo '</pre>';

                //   die();    

        $this->vista =  new movilVista();
        $this->model =  new UsuarioModel();

        

        if(!isset($_REQUEST['opcion'])){

             $this->pantallaLogueo();

        }       



        if($_REQUEST['opcion']=='menuPrincipal'){

             $this->menuPrincipal();

        }          
        if($_REQUEST['opcion']=='verificarCredenciales'){

             $this->verificarCredenciales($_REQUEST);

        }          
        if($_REQUEST['opcion']=='preguntarNuevaClave'){
             $this->preguntarNuevaClave($_REQUEST);
        }          

        if($_REQUEST['opcion']=='salirSistema'){

             $this->salirSistema();

        }  
        if($_REQUEST['opcion']=='actualizarClave'){

             $this->actualizarClave($_REQUEST);

        }  
    }

    public function pantallaLogueo(){

        $this->vista->pantallaLogueo();

    }

    public function menuPrincipal(){

        $this->vista->menuPrincipal();

    } 

   

    public function salirSistema(){

        $this->vista->pantallaLogueo();

    } 
    public function verificarCredenciales($request){

       $validacion =  $this->model->verificarCredenciales($request);
       //    $validacion['valida'] = 1;
       if($validacion['valida'] == 1)
       {
           //aqui se define si las credenciales estan bien 
           // echo '<br>estatus de sesion '.session_status().'<br>';
           // echo '<pre>';
           // print_r($_SESSION);
           // echo '</pre>';
           if (!isset($_SESSION)) { session_start(); }
           
           $_SESSION['id_usuario'] = $validacion['datos']['id_usuario'];
           $_SESSION['usuario'] = $validacion['datos']['login'];
           $_SESSION['nivel'] = $validacion['datos']['nivel'];
           // echo '<br>despues de iniciada '.session_status().'<br>';
           // echo '<pre>';
           // print_r($_SESSION);
           // echo '</pre>';
           // echo '<br>estadus'.session_status().'<br>';
           // session_destroy();
           // echo '<br>estatus despues de destroy'.session_status().'<br>';
           // die();
           $this->menuPrincipal();
           
        }
        else{
            $this->vista->htmlLogueo();
        }
        
    } 
public function preguntarNuevaClave($request)
{
    $this->vista->preguntarNuevaClave($request);
    
}

public function actualizarClave($request)
{
    $infoUser =  $this->model->verificarClaveActual($request);
        //  echo '<pre>';
        //    print_r($infoUser);
        //    echo '</pre>';
        //    die(); 
    if($infoUser['clave'] == $request['claveAnterior'])
    {
        $this->model->actualizarClave($request);
        echo 'Clave Actualizada'; 
    }
    else {
        echo 'Clave anterior Incorrecta'; 
    }
    
}

}



?>