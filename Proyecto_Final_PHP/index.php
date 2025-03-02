<?php


//Iniciar la sesión
session_start();
// Llamo a los controladores a través del autoload
require_once 'autoload.php'; // Archivo autoload
require_once 'config/db.php'; //Conexión a la base de datos.
require_once 'config/parameters.php'; // archivo de parametros
require_once 'helpers/utils.php';
require_once 'views/layout/header.php'; // layout header vista
require_once 'views/layout/sidebar.php'; // layout sidebar vista

//$db= Database::connect();
//Funciones para cargar controlador de errores
function show_error(){
    $error = new errorController();
    $error->index();
}

if(isset($_GET['controller'])){
    
   $nombre_controlador = $_GET['controller'].'Controller';
}elseif(!isset ($_GET['controller']) && !isset ($_GET['action'])){
    
    // configurado en el .htaccess 
    $nombre_controlador = controller_default;
}else{
    // Sino existe el error, llame la función de errores
    show_error();
    exit();
}

if(isset($nombre_controlador) && class_exists($nombre_controlador)){

    //Creo un nuevo objeto de la clase controladora
    $controlador = new $nombre_controlador();
    // Invocando los métodos automáticamente
    if(isset($_GET['action']) && method_exists($controlador, $_GET['action'])){
        $action = $_GET['action'];
        $controlador->$action();
    }elseif(!isset ($_GET['controller']) && !isset ($_GET['action'])){

        $action_default = action_default;
        $controlador->$action_default();
    }else{
        show_error();
    }
}else{
    show_error();
       
}
require_once 'views/layout/footer.php'; // layout footer