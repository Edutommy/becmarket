<?php

namespace controladores;

require_once('../modelo/Pedidos.php');
use modelo\Pedidos as Pedido;

class CambiarEstadoPedido{
    private $estado;
    private $pedido;

    public function __construct()
    {
        $this->estado = $_POST['estado'];
        $this->pedido = $_POST['pedido'];
    }

    public function cambiar(){
        session_start();
        $pedido = new Pedido();
        if (isset($_SESSION['user'])) {
            if($_SESSION['user']['tipo']==2){
                $pedido->cambiarEstado($this->estado,$this->pedido);
                header('Location: ../vistas/vendedor/vendedor-pedidos.php');
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
$obj = new CambiarEstadoPedido();
$obj->cambiar();