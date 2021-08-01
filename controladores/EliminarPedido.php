<?php

namespace controladores;

require_once('../modelo/Pedidos.php');

class EliminarPedido
{
    private $codeProducto;

    public function __construct()
    {
        $this->codeProducto = $_POST['eliminar'];
    }

    public function eliminarPedido()
    {
        session_start();
        $pos = 0;
        if (isset($_SESSION['user'])) {
            if ($_SESSION['user']['tipo'] == 1) {
                if (isset($_SESSION['newPedido'])) {
                    $asd = count($_SESSION['newPedido']);
                    $algo = 0;
                    for ($i = 0; $i < $asd; $i++) {
                        if ($_SESSION['newPedido'][$i]['codigo'] == $this->codeProducto) {
                            $_SESSION['newPedido'][$i]['cantidad'] = $_SESSION['newPedido'][$i]['cantidad'] - 1;
                        }
                        if ($_SESSION['newPedido'][$i]['cantidad'] == 0) {
                            unset($_SESSION['newPedido']);
                        }
                        header('Location: ../vistas/cliente/cliente-ver-negocio.php');
                        return;
                    }
                }
            } else {
                $_SESSION['error'] = "tipo";
                header('Location: ../vistas/cliente/cliente-ver-negocio.php');
            }
        } else {
            $_SESSION['error'] = "sesion";
            header('Location: ../vistas/cliente/cliente-ver-negocio.php');
        }
    }
}
$obj = new EliminarPedido();
$obj->eliminarPedido();
