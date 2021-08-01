<?php

namespace controladores;

require_once('../modelo/Usuario.php');
use modelo\Usuario as Usuario;

class CambiarImagen{
    private $modelo;

    public function __construct()
    {
        $this->modelo = new Usuario();
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

        $codigo = $_SESSION['user']['codigo_usuario'];
        $this->modelo->cambiarFoto($foto,$codigo);

        $n = $this->modelo->actualizar($codigo);
        $_SESSION['user'] = $n[0];

        if($_SESSION['user']['tipo'] == 2){
            header("Location: ../vistas/vendedor/vendedor-datos.php");
        }else{
            header("Location: ../vistas/cliente/cliente-datos.php");
        }
        
    }

}
$obj = new CambiarImagen();
$obj->cambiar();