<?php

require_once 'models/categoria.php';


class categoriaController{
    public function index(){

        $categoria = new Categoria();
        $categorias = $categoria->getCategorias();

        require_once 'views/categoria/index.php';
    }

    public function crear() {
        // comprobando que el usuario es admin
        
        // Incluyendo la vista para la creación de las categorías
        require_once 'views/categoria/crear.php';
    }
    
}

?>