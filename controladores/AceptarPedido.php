<?php

namespace controladores;

require_once('../modelo/Pedidos.php');
use modelo\Pedidos as Pedido;

class AceptarPedido{
    private $aceptar;
    private $rechazar;

    public function __construct()
    {
        $this->aceptar = $_POST['aceptar'];
        $this->rechazar = $_POST['rechazar'];
    }

    public function procesar(){
        session_start();
        $pedido = new Pedido();
        if (isset($_SESSION['user'])) {
            if($_SESSION['user']['tipo']==2){
                if(isset($this->aceptar)){
                    $estado = 'aceptado';
                    $codigo = $this->aceptar;
                    $pedido->cambiarEstado($estado,$codigo);
                    header('Location: ../vistas/vendedor/vendedor-pedidos.php');
                }else{
                    $estado = 'rechazado';
                    $codigo = $this->rechazar;
                    $pedido->cambiarEstado($estado,$codigo);
                    header('Location: ../vistas/vendedor/vendedor-pedidos.php');
                }
            }else{
                $_SESSION['acceso'] = "tipo";
                header('Location: ../vistas/vendedor/vendedor-pedido-detalle.php');
            }
        }else{
            $_SESSION['acceso'] = "sesion";
            header('Location: ../vistas/vendedor/vendedor-pedido-detalle.php');
        }
    }

}
$obj = new AceptarPedido();
$obj->procesar();