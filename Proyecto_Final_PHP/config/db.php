<?php

class Database{
    public static function connect(){
        $db = new mysqli('localhost','root','','tienda');

        $db->query("SET NAMES 'utf8'"); //para que se ponga en español todas las salidas de nombres
        return $db;
}
}

?>