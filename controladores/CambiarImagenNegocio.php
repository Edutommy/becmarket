<?php

namespace controladores;

require_once('../modelo/Negocio.php');
use modelo\Negocio as Negocio;

class CambiarImagenNegocio{
    private $modelo;

    public function __construct()
    {
        $this->modelo = new Negocio();
    }

    public function cambiar(){
        session_start();

        $nombre_foto = $_FILES['foto']['name'];
        $temp = $_FILES['foto']['tmp_name'];

        $nombre_foto = date('YmdHis',time()).$nombre_foto;
        if(is_uploaded_file($temp)){
            move_uploaded_file($temp,'../uploads/'.$nombre_foto);
            $foto = 'http://localhost/BECMarket/uploads/'.$nombre_foto;
        }else{
            $foto = $_SESSION['user']['imagen'];
        }

        $codigo = $_SESSION['negocio']['rut_negocio'];
        $this->modelo->cambiarImagen($foto,$codigo);

        $n = $this->modelo->buscarNegocio($codigo);
        $_SESSION['negocio'] = $n[0];

        header("Location: ../vistas/vendedor/vendedor-inicio.php");
        
    }
}
$obj = new CambiarImagenNegocio();
$obj->cambiar();