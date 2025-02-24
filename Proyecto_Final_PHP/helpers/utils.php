<?php

class Utils{

     //Método para eliminar una sesión especifica, pasada por el parametro $name
     public static function deleteSession($name){
        if(isset($_SESSION[$name])){
            $_SESSION[$name] = null;
            unset($_SESSION[$name]);
        }
        return $name;
    }
}

?>