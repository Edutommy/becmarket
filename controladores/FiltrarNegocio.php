<?php 

namespace controladores;

require_once('../modelo/Negocio.php');
use modelo\Negocio as Negocio;

class FiltrarNegocio{
    private $tipo;

    public function __construct()
    {
        $this->tipo = $_POST['tipo'];
    }

    public function filtrar(){
        session_start();
        if(isset($_SESSION['user'])){
            if($_SESSION['user']['estado']==1){
                if($_SESSION['user']['tipo']==1){
                    $n = new Negocio();
                    $negocios = $n->tipoNegocio($this->tipo);
                    if($negocios == null){
                        $_SESSION['error']='No se encontraron negocios';
                        header("Location: ../vistas/cliente/cliente-negocio.php");
                    }else{
                        $_SESSION['buscar']=$this->tipo;
                        header("Location: ../vistas/cliente/cliente-negocio.php");
                    }
                }else{
                    $_SESSION['error'] ="Acceso denegado";
                    header("Location: ../vistas/cliente/cliente-negocio.php");
                }
            }else{
                $_SESSION['error'] ="Acceso denegado";
                header("Location: ../vistas/cliente/cliente-negocio.php");
            }
        }else{
            $_SESSION['error'] ="Acceso denegado";
            header("Location: ../vistas/cliente/cliente-negocio.php");
        }
    }
}
$obj = new FiltrarNegocio();
$obj->filtrar();