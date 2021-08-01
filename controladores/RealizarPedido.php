<?php
namespace controladores;

require_once('../modelo/Pedidos.php');

use DateTime;
use DateTimeZone;
use modelo\Pedidos as Pedido;

require_once('../modelo/Detalle.php');
use modelo\Detalle as Detalle;

require_once('../modelo/Producto.php');
use modelo\Producto as Producto;

class RealizarPedido{
    private $negocio;
    private $total;
    private $monto;

    public function __construct()
    {
        $this->negocio = $_POST['negocio'];
        $this->total = $_POST['total'];
        $this->monto = $_POST['monto'];
    }

    public function realizar(){
        $objeto = new DateTime();
        $objeto->setTimezone(new DateTimeZone('America/Santiago'));
        session_start();
        if (isset($_SESSION['user'])) {
            if ($_SESSION['user']['tipo'] == 1) {
                $pedido = new Pedido();
                $detalle = new Detalle();
                $producto = new Producto();
                $codePedido = rand(111111,999999);
                $fecha = $objeto->format('Y-m-d');
                $hora =  $objeto->format('H:i');
                $estado = 'sin aceptar';
                $metodo = 'efectivo';
                $cliente = $_SESSION['user']['codigo_usuario'];
                $data=[
                    'codigo_pedido'=>$codePedido,
                    'fecha'=>$fecha,
                    'hora'=>$hora,
                    'precio_Total'=>$this->total,
                    'metodo_pago'=>$metodo,
                    'monto'=>$this->monto,
                    'estado'=>$estado,
                    'compradorfk'=>$cliente,
                    'negociofk'=>$this->negocio
                ];
                $cp = $pedido->nuevoPedido($data);
                if($cp==1){
                    $contador = count($_SESSION['newPedido']);
                    $cd = 0;
                    for ($i=0; $i < $contador; $i++) { 
                        $codeProducto = $_SESSION['newPedido'][$i]['codigo'];
                        $qty = $_SESSION['newPedido'][$i]['cantidad'];
                        $unit = $_SESSION['newPedido'][$i]['precio'];
                        $p = $producto->buscarCodigo($codeProducto);
                        $a = $p[0];
                        $nombreProd = $a['nombre'];

                        $dataD = [
                            'codigo_pedido'=>$codePedido,
                            'codigo_producto'=>$codeProducto,
                            'nombre_producto'=>$nombreProd,
                            'cantidad'=>$qty,
                            'precioUnit'=>$unit
                        ];
                        
                        $cd = $cd + $detalle->nuevoDetalle($dataD);
                    }
                    if ($cd > 0) {
                        header("Location: ../vistas/cliente/cliente-confirmacion.php");
                    }else{
                        $pedido->quitarPedido($codePedido);
                        $_SESSION['error'] = "error detalle";
                        header("Location: ../vistas/cliente/cliente-realizar-pedido.php");
                    }
                    
                }else{
                    $_SESSION['error'] = "error pedido";
                    header("Location: ../vistas/cliente/cliente-realizar-pedido.php");
                }
            }else{
                $_SESSION['error'] = "tipo";
                header('Location: ../vistas/cliente/cliente-realizar-pedido.php');
            }
        }else{
            $_SESSION['error'] = "sesion";
            header('Location: ../login.php');
        }
    }

}
$obj = new RealizarPedido();
$obj->realizar();