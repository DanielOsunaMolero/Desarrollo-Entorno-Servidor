<?php

require_once 'models/usuario.php';

class usuarioController
{

    public function index()
    {
        Utils::isAdmin(); // Solo el admin puede ver esta página
        $usuario = new Usuario();
        $usuarios = $usuario->getAll();

        require_once './views/usuario/gestion.php';
    }
    //Método de registro
    public function registro()
    {
        require_once './views/usuario/registro.php';
    }

    public function gestion() {
        Utils::isAdmin(); // Asegura que solo los admins puedan acceder
    
        $usuario = new Usuario();
        $usuarios = $usuario->getAll(); // Método para obtener todos los usuarios
    
        require_once './views/usuario/gestion.php';
    }
    

    //Método de guardado de usuarios
    public function save()
    {
        if (isset($_POST)) {
            $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
            $apellidos = isset($_POST['apellidos']) ? $_POST['apellidos'] : false;
            $email = isset($_POST['email']) ? $_POST['email'] : false;
            $password = isset($_POST['password']) ? $_POST['password'] : false;

            if ($nombre && $apellidos && $email && $password) {
                $usuario = new Usuario();
                $usuario->setNombre($nombre);
                $usuario->setApellidos($apellidos);
                $usuario->setEmail($email);
                $usuario->setPassword($password);
                $save2 = $usuario->save();

                if ($save2) {
                    $_SESSION['register'] = "complete";
                } else {
                    $_SESSION['register'] = "failed";
                }
            } else {
                $_SESSION['register'] = "failed";
            }
        } else {
            $_SESSION['register'] = "failed";
        }
        header("Location:" . base_url . "usuario/registro");
    }

    public function saveAdmin() {
        Utils::isAdmin(); // Solo los administradores pueden crear usuarios
    
        if(isset($_POST)){
            $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false; 
            $apellidos = isset($_POST['apellidos']) ? $_POST['apellidos'] : false; 
            $email = isset($_POST['email']) ? $_POST['email'] : false; 
            $password = isset($_POST['password']) ? $_POST['password'] : false; 
            $rol = isset($_POST['rol']) ? $_POST['rol'] : 'user'; // Si no selecciona, es 'user' por defecto
            
            if($nombre && $apellidos && $email && $password){
                $usuario = new Usuario();
                $usuario->setNombre($nombre);
                $usuario->setApellidos($apellidos);
                $usuario->setEmail($email);
                $usuario->setPassword($password);
                $usuario->setRol($rol); // Se establece el rol
    
                $save = $usuario->saveAdmin();
    
                if($save){
                    $_SESSION['register'] = "complete";
                } else {
                    $_SESSION['register'] = "failed";
                } 
            } else {
                $_SESSION['register'] = "failed";
            }
        } else {
            $_SESSION['register'] = "failed";
        }
    
        header("Location:".base_url."usuario/gestion");
    }

    public function crear() {
        Utils::isAdmin(); // Solo administradores pueden acceder
        require_once './views/usuario/crear.php';
    }
    
    

    public function editar()
    {
        Utils::isAdmin();
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $usuario = new Usuario();
            $usuario->setId($id);
            $usu = $usuario->getById($id);
            require_once './views/usuario/editar.php';
        } else {
            header("Location:" . base_url . "usuario/gestion");
        }
    }

    public function update()
    {
        Utils::isAdmin();
        if (isset($_POST['id'])) {
            $id = $_POST['id'];
            $nombre = $_POST['nombre'];
            $apellidos = $_POST['apellidos'];
            $email = $_POST['email'];
            $rol = $_POST['rol'];

            $usuario = new Usuario();
            $usuario->setId($id);
            $usuario->setNombre($nombre);
            $usuario->setApellidos($apellidos);
            $usuario->setEmail($email);
            $usuario->setRol($rol);

            $update = $usuario->update();
            $_SESSION['edit'] = $update ? "complete" : "failed";
        }
        header("Location:" . base_url . "usuario/gestion");
    }

    public function eliminar() {
        Utils::isAdmin(); // Solo administradores pueden eliminar usuarios
    
        if(isset($_GET['id'])) {
            $id = $_GET['id'];
            $usuario = new Usuario();
            $usuario->setId($id);
            $delete = $usuario->delete();
    
            if($delete) {
                $_SESSION['delete'] = 'complete';
            } else {
                $_SESSION['delete'] = 'failed';
            }
        } else {
            $_SESSION['delete'] = 'failed';
        }
    
        header("Location:".base_url."usuario/gestion");
    }
    

    //Método para Login de usuarios
    public function login()
    {

        if (isset($_POST)) {
            // Identificar al usuario
            //Consultamos a la BBDD
            $usuario = new Usuario();
            $usuario->setEmail($_POST['email']);
            $usuario->setPassword($_POST['password']);

            $identity = $usuario->login();


            if ($identity && is_object($identity)) {
                $_SESSION['identity'] = $identity;
                //Comprobamos si es  o no
                if ($identity->rol == 'admin') {
                    $_SESSION['admin'] = true;
                }
            } else {
                $_SESSION['error_login'] = 'Identificación fallida !!';
            }
        }
        header("Location:" . base_url);
    }


    //Método para logout de usuarios
    public function logout()
    {
        if (isset($_SESSION['identity'])) {
            unset($_SESSION['identity']);
        }
        if (isset($_SESSION['admin'])) {
            unset($_SESSION['admin']);
        }
        header("Location:" . base_url);
    }
}
