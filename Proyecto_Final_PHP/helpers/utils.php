<?php

class Utils{

     //Método para eliminar una sesión especifica
     public static function deleteSession($name){
        if(isset($_SESSION[$name])){
            $_SESSION[$name] = null;
            unset($_SESSION[$name]);
        }
        return $name;
    }


    public static function isAdmin() {
        if (!isset($_SESSION['admin'])) {
            header("Location:".base_url);
        }else{
            return true;
        }
    }

    public static function showCategorias(){
        // incluyendo el modelo
        require_once 'models/categoria.php';
        
        $categoria = new Categoria();
        $categorias = $categoria->getCategorias();
        
        return $categorias;
    }
}

?>