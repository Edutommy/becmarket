<?php
namespace controladores;

require_once('../modelo/Pedidos.php');
use modelo\Pedidos as Pedido;

class AgregarPedido{
    private $codeProducto;
    private $precio;

    public function __construct()
    {
        $this->codeProducto = $_POST['codeProducto'];
        $this->precio = $_POST['precio'];
    }

    public function nuevoPedido(){
        session_start();
        $pos = 0;
        if(isset($_SESSION['user'])){
            if ($_SESSION['user']['tipo'] == 1) {

                if (isset($_SESSION['newPedido'])) {
                    $asd = count($_SESSION['newPedido']);
                    $algo = 0;
                    #print_r($asd);
                    for ($i=0 ; $i <= $asd  ; $i++) { 
                        if ($_SESSION['newPedido'][$i]['codigo'] == $this->codeProducto) {
                            $_SESSION['newPedido'][$i]['cantidad'] = $_SESSION['newPedido'][$i]['cantidad'] + 1;
                            header('Location: ../vistas/cliente/cliente-ver-negocio.php');
                            return;
                        }
                        $algo = $algo + 1;
                    }
                    if($algo > 0){
                        $_SESSION['newPedido'][$asd]['codigo'] = $this->codeProducto;
                        $_SESSION['newPedido'][$asd]['cantidad'] = 1;
                        $_SESSION['newPedido'][$asd]['precio'] = $this->precio;
                        header('Location: ../vistas/cliente/cliente-ver-negocio.php');
                    }
                    header('Location: ../vistas/cliente/cliente-ver-negocio.php');
                    
                    
                }else{
                    $_SESSION['newPedido'][$pos]['codigo'] = $this->codeProducto;
                    $_SESSION['newPedido'][$pos]['cantidad'] = 1;
                    $_SESSION['newPedido'][$pos]['precio'] = $this->precio; 
                    header('Location: ../vistas/cliente/cliente-ver-negocio.php');
                }
                
            }else{
                $_SESSION['error'] = "tipo";
                header('Location: ../vistas/cliente/cliente-ver-negocio.php');
            }
        }else{
            $_SESSION['error'] = "sesion";
            header('Location: ../vistas/cliente/cliente-ver-negocio.php');
        }
    }

}
$obj = new AgregarPedido();
$obj->nuevoPedido();