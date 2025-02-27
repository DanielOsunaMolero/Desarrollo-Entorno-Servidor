<?php

require_once 'models/producto.php';

class productoController{
    public function index(){

        require_once './views/producto/destacados.php';
    }



    public function gestion() {
        
        Utils::isAdmin();

        
        $producto = new Producto();
        
        $productos = $producto->getProductos();

        
        require_once 'views/producto/gestion.php';
    }

    public function crear() {
        // Es un administrador?
        Utils::isAdmin();
        // incluyendo vista para la creación de los productos
        require_once 'views/producto/crear.php';

        
    }

    public function save(){
    
    }


}


?>