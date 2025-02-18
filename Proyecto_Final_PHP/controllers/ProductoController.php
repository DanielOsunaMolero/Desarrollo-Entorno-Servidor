<?php


class productoController{
    public function index(){
        echo "Controlador productos , Accion index";
        require_once './views/producto/destacados.php';
    }
}

?>