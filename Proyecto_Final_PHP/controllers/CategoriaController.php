<?php

require_once 'models/categoria.php';


class categoriaController{
    public function index(){

        $categoria = new Categoria();
        $categorias = $categoria->getCategorias();

        require_once 'views/categoria/index.php';
    }

    public function crear() {

        Utils::isAdmin();
        // Incluyendo la vista para la creación de las categorías
        require_once 'views/categoria/crear.php';
    }
    
    //guardar las nuevas categorías
    public function save() {

        Utils::isAdmin();
        if(isset($_POST) && isset($_POST['nombre'])){
            $categoria = new Categoria();
            $categoria->setNombre($_POST['nombre']);
            $categoria->save();
        }

        header("Location:".base_url."categoria/index");
    }
    
}

?>