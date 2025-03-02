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
       
        require_once 'views/categoria/crear.php';
    }
    

    public function save() {
        Utils::isAdmin();
    
        if(isset($_POST) && isset($_POST['nombre'])) {
            $categoria = new Categoria();
            $categoria->setNombre($_POST['nombre']);
            
            if ($categoria->save()) {
                $_SESSION['categoria_success'] = "Categoría creada correctamente.";
            } else {
                $_SESSION['categoria_errors'][] = "Error al guardar la categoría.";
            }
        } else {
            $_SESSION['categoria_errors'][] = "El nombre de la categoría es obligatorio.";
        }
    
        header("Location:".base_url."categoria/index");
    }
    
    
}

?>