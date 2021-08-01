<?php

namespace controladores;

require_once('../modelo/Pedidos.php');
use modelo\Pedidos as Pedidos;

class BuscarPedidoEstado{
    private $estado;

    public function __construct()
    {
        $this->estado = $_POST['estado'];
    }

    public function buscar(){
        session_start();
        $negocio = $_SESSION['negocio']['rut_negocio'];
        $p = new Pedidos();
        $pedidos = $p->buscarPorEstado($this->estado,$negocio);
        if($pedidos == null){
            $_SESSION['error']='No se encontro ningún pedido';
            header("Location: ../vistas/vendedor/vendedor-pedidos.php");
        }else{
            $_SESSION['buscar']=$this->estado;
            header("Location: ../vistas/vendedor/vendedor-pedidos.php");
        }
    }
}
$obj = new BuscarPedidoEstado();
$obj->buscar();