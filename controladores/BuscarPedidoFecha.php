<?php 

namespace controladores;

use modelo\Pedidos as Pedidos;

require_once("../modelo/Pedidos.php");

class BuscarPedidoFecha{
    private $fecha;

    public function __construct()
    {
        $this->fecha = $_POST['fecha'];
    }
    public function buscarFecha(){
        session_start();
        $negocio = $_SESSION['negocio']['rut_negocio'];
        $p = new Pedidos();
        $pedidos = $p->buscarPorFecha($this->fecha, $negocio);
        if($pedidos == null){
            $_SESSION['error']='No se encontro ningún pedido';
            header("Location: ../vistas/vendedor/vendedor-pedidos-historial.php");
        } else {
            $_SESSION['buscarfecha']=$this->fecha;
            header("Location: ../vistas/vendedor/vendedor-pedidos-historial.php");
        }
    }
}
$obj = new BuscarPedidoFecha();
$obj->buscarFecha();