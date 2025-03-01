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
    if (isset($_SESSION['identity'])) {
        $id = isset($_GET['id']) ? $_GET['id'] : $_SESSION['identity']->id; // Si no se pasa ID, usa el del usuario autenticado
        $usuario = new Usuario();
        $usuario->setId($id);
        $usu = $usuario->getById($id);

        // Permitir la edición solo si es admin o si edita su propio perfil
        if ($_SESSION['identity']->id == $usu->id || isset($_SESSION['admin'])) {
            require_once './views/usuario/editar.php';
        } else {
            header("Location:" . base_url);
        }
    } else {
        header("Location:" . base_url);
    }
}


public function update()
{
    if (isset($_SESSION['identity']) && isset($_POST['id'])) {
        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $apellidos = $_POST['apellidos'];
        $email = $_POST['email'];
        $rol = isset($_POST['rol']) ? $_POST['rol'] : 'user'; // Solo los admins verán esta opción

        $usuario = new Usuario();
        $usuario->setId($id);
        $usuario->setNombre($nombre);
        $usuario->setApellidos($apellidos);
        $usuario->setEmail($email);

        // Solo los admins pueden modificar el rol
        if (isset($_SESSION['admin'])) {
            $usuario->setRol($rol);
        }

        $update = $usuario->update();

        // Si el usuario está editando su propio perfil, actualizar la sesión
        if ($update && $_SESSION['identity']->id == $id) {
            $_SESSION['identity']->nombre = $nombre;
            $_SESSION['identity']->apellidos = $apellidos;
            $_SESSION['identity']->email = $email;
            $_SESSION['edit'] = "complete";
        } else {
            $_SESSION['edit'] = "failed";
        }
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
