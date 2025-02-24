<?php

require_once 'models/usuario.php';

class usuarioController{

    public function index() {
        echo 'Controlador Usuarios, Acción index';
    }
    //Método de registro
    public function registro() {
        require_once './views/usuario/registro.php';
    }

    //Método de guardado de usuarios
    public function save() {
        if(isset($_POST)){
           $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false; 
           $apellidos = isset($_POST['apellidos']) ? $_POST['apellidos'] : false; 
           $email = isset($_POST['email']) ? $_POST['email'] : false; 
           $password = isset($_POST['password']) ? $_POST['password'] : false; 
            
            if($nombre && $apellidos && $email && $password){
                $usuario = new Usuario();
                $usuario->setNombre($nombre);
                $usuario->setApellidos($apellidos);
                $usuario->setEmail($email);
                $usuario->setPassword($password);
                $save2 = $usuario->save();

                if($save2){
                    $_SESSION['register'] = "complete";
                }else{
                    $_SESSION['register'] = "failed";
                } 
            }else{
                $_SESSION['register'] = "failed";
            }
        }else{
            $_SESSION['register'] = "failed";
        }
        header("Location:".base_url."usuario/registro");
    }
}

?>