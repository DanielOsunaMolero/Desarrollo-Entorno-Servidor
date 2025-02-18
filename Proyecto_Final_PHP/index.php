<?php
  session_start();

  require_once 'autoload.php';

  if (isset($_GET['controller'])) {
    $nombre_controlador = $_GET['controller'] . 'Controller';
  } else {
    echo "La página que buscas no existe";
    exit();
  }


  if (class_exists($nombre_controlador)) {
    $controlador = new $nombre_controlador();
    
    if (isset($_GET['accion']) && method_exists($controlador, $_GET['accion'])) {
      $accion = $_GET['accion'];
      $controlador->$accion();
    } 
    else {
      echo "La página que buscas no existe";
    }
  } else {
    echo "La página que buscas no existe";
  }

  ?>