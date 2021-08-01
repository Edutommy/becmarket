<?php

namespace modelo;
require_once("Conexion.php");

class Pedidos{

    //NUEVO PEDIDO
    public function nuevoPedido($data){
        $stm = Conexion::conector()->prepare("INSERT INTO pedido VALUES(:A,:B,:C,:D,:E,:F,:G,:H,:I)");
        $stm->bindParam(":A",$data['codigo_pedido']);
        $stm->bindParam(":B",$data['fecha']);
        $stm->bindParam(":C",$data['hora']);
        $stm->bindParam(":D",$data['precio_Total']);
        $stm->bindParam(":E",$data['metodo_pago']);
        $stm->bindParam(":F",$data['monto']);
        $stm->bindParam(":G",$data['estado']);
        $stm->bindParam(":H",$data['compradorfk']);
        $stm->bindParam(":I",$data['negociofk']);
        return $stm->execute();
    }

    //quitar pedido
    public function quitarPedido($codigo){
        $stm = Conexion::conector()->prepare("DELETE FROM pedido WHERE codigo_pedido=:A");
        $stm->bindParam(":A",$codigo);
        return $stm->execute();
    }

    //PEDIDOS DEL NEGOCIO
    public function pedidosNegocio($estado,$negocio){
        $stm = Conexion::conector()->prepare("SELECT * FROM pedido WHERE estado=:A AND negociofk=:B");
        $stm->bindParam(":A",$estado);
        $stm->bindParam(":B",$negocio);
        $stm->execute();
        return $stm->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function historialNegocio($negocio){
        $stm = Conexion::conector()->prepare("SELECT * FROM pedido WHERE negociofk=:A AND estado='entregado' OR estado='rechazado'");
        $stm->bindParam(":A",$negocio);
        $stm->execute();
        return $stm->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function enCursoNegocio($negocio){
        $stm = Conexion::conector()->prepare("SELECT * FROM pedido WHERE negociofk=:A AND estado NOT LIKE 'entregado' AND estado NOT LIKE 'rechazado' AND estado NOT LIKE 'sin aceptar' ");
        $stm->bindParam(":A",$negocio);
        $stm->execute();
        return $stm->fetchAll(\PDO::FETCH_ASSOC);
    }

    //PEDIDOS DEL CLIENTE | ESTADO != ENTREGADO
    public function pedidosEnCursoCliente($cliente){
        $stm = Conexion::conector()->prepare("SELECT * FROM pedido WHERE compradorfk=:A AND estado NOT LIKE 'entregado' AND estado NOT LIKE 'rechazado'");
        $stm->bindParam(":A",$cliente);
        $stm->execute();
        return $stm->fetchAll(\PDO::FETCH_ASSOC);
    }

    //PEDIDOS DEL CLIENTE | ESTADO = ENTREGADO
    public function pedidosEntregadosCliente($cliente){
        $stm = Conexion::conector()->prepare("SELECT * FROM pedido WHERE compradorfk=:A AND estado='entregado' OR estado='rechazado'");
        $stm->bindParam(":A",$cliente);
        $stm->execute();
        return $stm->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function pedido($codigo){
        $stm = Conexion::conector()->prepare("SELECT * FROM pedido WHERE codigo_pedido=:A");
        $stm->bindParam(":A",$codigo);
        $stm->execute();
        return $stm->fetchAll(\PDO::FETCH_ASSOC);
    }

    //BUSCAR PEDIDO POR ESTADO
    public function buscarPorEstado($estado,$negocio){
        $stm = Conexion::conector()->prepare("SELECT * FROM pedido WHERE estado=:A AND negociofk=:B");
        $stm->bindParam(":A",$estado);
        $stm->bindParam(":B",$negocio);
        $stm->execute();
        return $stm->fetchAll(\PDO::FETCH_ASSOC);
    }

    //BUSCAR PEDIDO POR FECHA
    public function buscarPorFecha($fecha,$negocio){
        $stm = Conexion::conector()->prepare("SELECT * FROM pedido WHERE fecha=:A AND negociofk=:B");
        $stm->bindParam(":A",$fecha);
        $stm->bindParam(":B",$negocio);
        $stm->execute();
        return $stm->fetchAll(\PDO::FETCH_ASSOC);
    }

    //CAMBIAR ESTADO DEL PEDIDO
    public function cambiarEstado($estado,$pedido){
        $stm = Conexion::conector()->prepare("UPDATE pedido SET estado=:A WHERE codigo_pedido=:B");
        $stm->bindParam(":A", $estado);
        $stm->bindParam(":B", $pedido);
        return $stm->execute();
    }

}