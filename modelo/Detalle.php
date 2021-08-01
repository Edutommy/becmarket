<?php

namespace modelo;
require_once("Conexion.php");

class Detalle{
    public function detallePedido($pedido){
        $stm = Conexion::conector()->prepare("SELECT * FROM detalle WHERE codigo_pedido=:A");
        $stm->bindParam(":A",$pedido);
        $stm->execute();
        return $stm->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function nuevoDetalle($data){
        $stm = Conexion::conector()->prepare("INSERT INTO detalle VALUES(:A,:B,:C,:D,:E)");
        $stm->bindParam(":A",$data['codigo_pedido']);
        $stm->bindParam(":B",$data['codigo_producto']);
        $stm->bindParam(":C",$data['nombre_producto']);
        $stm->bindParam(":D",$data['cantidad']);
        $stm->bindParam(":E",$data['precioUnit']);
        return $stm->execute();
    }
}