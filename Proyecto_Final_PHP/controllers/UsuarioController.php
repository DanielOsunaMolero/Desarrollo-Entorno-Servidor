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

    public function gestion()
    {
        Utils::isAdmin();

        $usuario = new Usuario();
        $usuarios = $usuario->getAll();

        require_once './views/usuario/gestion.php';
    }


    //metodo para guardar usuarios
    public function save()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            session_start();


            $nombre = trim($_POST['nombre']);
            $apellidos = trim($_POST['apellidos']);
            $email = trim($_POST['email']);
            $password = trim($_POST['password']);

            $errors = [];

            // Validaciones
            if (!preg_match("/^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+$/", $nombre) || strlen($nombre) < 2) {
                $errors['nombre'] = "El nombre debe contener solo letras y al menos 2 caracteres.";
            }

            if (!preg_match("/^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+$/", $apellidos) || strlen($apellidos) < 2) {
                $errors['apellidos'] = "Los apellidos deben contener solo letras y al menos 2 caracteres.";
            }

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors['email'] = "Introduce un email válido.";
            }

            if (strlen($password) < 6 || !preg_match("/[A-Z]/", $password) || !preg_match("/[0-9]/", $password)) {
                $errors['password'] = "La contraseña debe tener al menos 6 caracteres, una mayúscula y un número.";
            }

            // si hay errores redirige al formulario
            if (!empty($errors)) {
                $_SESSION['errors'] = $errors;
                header("Location: " . base_url . "usuario/registro");
                exit();
            }


            $usuario = new Usuario();
            $usuario->setNombre($nombre);
            $usuario->setApellidos($apellidos);
            $usuario->setEmail($email);
            $usuario->setPassword(password_hash($password, PASSWORD_BCRYPT));

            $save = $usuario->save();

            if ($save) {
                $_SESSION['register'] = "complete";
            } else {
                $_SESSION['register'] = "failed";
            }
        } else {
            $_SESSION['register'] = "failed";
        }


        header("Location: " . base_url . "usuario/registro");
        exit();
    }

    //solo para admins
    public function saveAdmin()
    {
        Utils::isAdmin();

        if (isset($_POST)) {
            $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
            $apellidos = isset($_POST['apellidos']) ? $_POST['apellidos'] : false;
            $email = isset($_POST['email']) ? $_POST['email'] : false;
            $password = isset($_POST['password']) ? $_POST['password'] : false;
            $rol = isset($_POST['rol']) ? $_POST['rol'] : 'user';

            if ($nombre && $apellidos && $email && $password) {
                $usuario = new Usuario();
                $usuario->setNombre($nombre);
                $usuario->setApellidos($apellidos);
                $usuario->setEmail($email);
                $usuario->setPassword($password);
                $usuario->setRol($rol);

                $save = $usuario->saveAdmin();

                if ($save) {
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

        header("Location:" . base_url . "usuario/gestion");
    }

    //solo admins
    public function crear()
    {
        Utils::isAdmin();
        require_once './views/usuario/crear.php';
    }



    public function editar()
    {
        if (isset($_SESSION['identity'])) {
            $id = isset($_GET['id']) ? $_GET['id'] : $_SESSION['identity']->id;
            // Si no se pasa ID, usa el del usuario autenticado
            $usuario = new Usuario();
            $usuario->setId($id);
            $usu = $usuario->getById($id);


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
            $rol = isset($_POST['rol']) ? $_POST['rol'] : 'user';

            $usuario = new Usuario();
            $usuario->setId($id);
            $usuario->setNombre($nombre);
            $usuario->setApellidos($apellidos);
            $usuario->setEmail($email);


            if (isset($_SESSION['admin'])) {
                $usuario->setRol($rol);
            }

            $update = $usuario->update();


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


    public function eliminar()
    {
        Utils::isAdmin();

        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $usuario = new Usuario();
            $usuario->setId($id);
            $delete = $usuario->delete();

            if ($delete) {
                $_SESSION['delete'] = 'complete';
            } else {
                $_SESSION['delete'] = 'failed';
            }
        } else {
            $_SESSION['delete'] = 'failed';
        }

        header("Location:" . base_url . "usuario/gestion");
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
                //Comprobamos si es  o no admin
                if ($identity->rol == 'admin') {
                    $_SESSION['admin'] = true;
                }
            } else {
                $_SESSION['error_login'] = 'Identificación fallida !!';
            }
        }
        header("Location:" . base_url);
    }



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


    public function updateAdmin()
    {
        Utils::isAdmin();

        if (isset($_POST['id'])) {
            $id = $_POST['id'];
            $nombre = trim($_POST['nombre']);
            $apellidos = trim($_POST['apellidos']);
            $email = trim($_POST['email']);
            $password = isset($_POST['password']) && !empty($_POST['password']) ? password_hash($_POST['password'], PASSWORD_BCRYPT) : null;
            $rol = $_POST['rol'];

            $usuario = new Usuario();
            $usuario->setId($id);
            $usuario->setNombre($nombre);
            $usuario->setApellidos($apellidos);
            $usuario->setEmail($email);
            $usuario->setRol($rol);


            $usuario_actual = $usuario->getById($id);
            $imagen_guardada = $usuario_actual->imagen;

            // Manejo de imagen
            if (isset($_FILES['imagen']) && $_FILES['imagen']['size'] > 0) {
                $file = $_FILES['imagen'];
                $filename = time() . "_" . basename($file['name']);
                $mimetype = mime_content_type($file['tmp_name']);

                $allowedExtensions = ['image/jpeg', 'image/png', 'image/gif', 'image/jpg'];

                if (!in_array($mimetype, $allowedExtensions)) {
                    $_SESSION['imagen_error'] = "Formato de imagen no válido. Solo JPG, PNG o GIF.";
                    header("Location:" . base_url . "usuario/editar&id=" . $id);
                    exit();
                }

                $ruta_destino = 'uploads/usuarios/' . $filename;

                if (move_uploaded_file($file['tmp_name'], $ruta_destino)) {

                    if (!empty($usuario_actual->imagen)) {
                        $ruta_imagen_anterior = 'uploads/usuarios/' . $usuario_actual->imagen;
                        if (file_exists($ruta_imagen_anterior)) {
                            unlink($ruta_imagen_anterior);
                        }
                    }


                    $imagen_guardada = $filename;
                } else {
                    $_SESSION['imagen_error'] = "Error al subir la imagen.";
                    header("Location:" . base_url . "usuario/editar&id=" . $id);
                    exit();
                }
            }


            $usuario->setImagen($imagen_guardada);


            $update = $usuario->update();

            $_SESSION['edit'] = $update ? "complete" : "failed";
        }

        header("Location:" . base_url . "usuario/gestion");
    }
}
