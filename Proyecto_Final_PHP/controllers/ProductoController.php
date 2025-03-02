<?php

require_once 'models/producto.php';

class productoController
{
    public function index()
    {

        $producto = new Producto();

        $productos = $producto->getRandom(6);

        require_once './views/producto/destacados.php';
    }



    public function gestion()
    {

        Utils::isAdmin();


        $producto = new Producto();

        $productos = $producto->getProductos();


        require_once 'views/producto/gestion.php';
    }

    public function crear()
    {

        Utils::isAdmin();
        // incluyendo vista 
        require_once 'views/producto/crear.php';
    }

    public function save()
    {
        // comprobamos si es administrador
        Utils::isAdmin();


        if (isset($_POST)) {
            $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
            $descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : false;
            $precio = isset($_POST['precio']) ? $_POST['precio'] : false;
            $stock = isset($_POST['stock']) ? $_POST['stock'] : false;
            $categoria = isset($_POST['categoria']) ? $_POST['categoria'] : false;
            //$imagen = isset($_POST['imagen']) ? $_POST['imagen'] : false;

            if ($nombre && $descripcion && $precio && $stock && $categoria) {
                //Creamos objeto 
                $producto = new Producto();

                // Le damos valor a cada propiedad
                $producto->setNombre($nombre);
                $producto->setDescripcion($descripcion);
                $producto->setPrecio($precio);
                $producto->setStock($stock);
                $producto->setCategoria_id($categoria);

                // guardamos la imagen

                if (isset($_FILES['imagen'])) {
                    $file = $_FILES['imagen'];
                    $filename = $file['name'];
                    $mimetype = $file['type'];

                    if ($mimetype == 'image/jpg' || $mimetype == 'image/jpeg' || $mimetype == 'image/png' || $mimetype == 'image/gif') {

                        if (!is_dir('uploads/images')) {

                            mkdir('uploads/images', 0777, true);
                        }

                        move_uploaded_file($file['tmp_name'], 'uploads/images/' . $filename);
                        $producto->setImagen($filename);
                    }
                }

                $save = $producto->save();

                //comprobamos la insercion
                if ($save) {
                    $_SESSION['producto'] = 'complete';
                } else {
                    $_SESSION['producto'] = 'failed';
                }
            } else {
                $_SESSION['producto'] = 'failed';
            }
        } else {
            $_SESSION['producto'] = 'failed';
        }

        header('Location:' . base_url . 'producto/gestion');
    }

    //PARA HACER EL CRUD COMPLETO

    public function editar()
    {
        Utils::isAdmin();
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $producto = new Producto();
            $producto->setId($id);
            $pro = $producto->getById($id);
            require_once './views/producto/editar.php';
        } else {
            header("Location:" . base_url . "producto/gestion");
        }
    }

    public function update()
{
    Utils::isAdmin();

    if (isset($_POST['id'])) {
        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $precio = $_POST['precio'];
        $stock = $_POST['stock'];
        $categoria = $_POST['categoria'];

        error_log("Datos recibidos en el controlador:");
        error_log("ID: " . $id);
        error_log("Nombre: " . $nombre);
        error_log("Descripción: " . $descripcion);
        error_log("Precio: " . $precio);
        error_log("Stock: " . $stock);
        error_log("Categoría: " . $categoria);

        $producto = new Producto();
        $producto->setId($id);
        $producto->setNombre($nombre);
        $producto->setDescripcion($descripcion);
        $producto->setPrecio($precio);
        $producto->setStock($stock);
        $producto->setCategoria_id($categoria);

        // Manejo de imagen
        if (isset($_FILES['imagen']) && $_FILES['imagen']['size'] > 0) {
            $file = $_FILES['imagen'];
            $filename = time() . "_" . basename($file['name']);
            $mimetype = mime_content_type($file['tmp_name']);

            $allowedExtensions = ['image/jpeg', 'image/png', 'image/gif', 'image/jpg'];

            if (!in_array($mimetype, $allowedExtensions)) {
                $_SESSION['imagen_error'] = "Formato de imagen no válido. Solo se permiten JPG, PNG o GIF.";
                header("Location:" . base_url . "producto/editar&id=" . $id);
                exit();
            }

            $ruta_destino = 'uploads/images/' . $filename;
            if (move_uploaded_file($file['tmp_name'], $ruta_destino)) {
                $producto->setImagen($filename);
            } else {
                $_SESSION['imagen_error'] = "Error al subir la imagen.";
                header("Location:" . base_url . "producto/editar&id=" . $id);
                exit();
            }
        }

        // Intentar actualizar en la base de datos
        $update = $producto->update();

        if ($update) {
            $_SESSION['edit'] = "complete";
        } else {
            $_SESSION['edit'] = "failed";
        }
    }

    header("Location:" . base_url . "producto/gestion");
}




    public function eliminar()
    {
        Utils::isAdmin();
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $producto = new Producto();
            $producto->setId($id);
            $delete = $producto->delete();

            if ($delete) {
                $_SESSION['delete'] = 'complete';
            } else {
                $_SESSION['delete'] = 'failed';
            }
        } else {
            $_SESSION['delete'] = 'failed';
        }
        header("Location:" . base_url . "producto/gestion");
    }

    //PARA QUE CUANDO PULSES UNA CATEGORIA DEL NAVEGADOR TE MUESTRE TODOS LOS PRODUCTOS DE ELLA

    public function categoria()
{
    if (isset($_GET['id'])) {
        $categoria_id = $_GET['id'];

        // Obtenemos la categoría
        $categoria = new Categoria();
        $categoria->setId($categoria_id);
        $categoria_actual = $categoria->getById($categoria_id); 

       
        if (!$categoria_actual) {
            $_SESSION['error'] = "La categoría seleccionada no existe.";
            header("Location:" . base_url);
            exit();
        }

        
        $producto = new Producto();
        $productos = $producto->getByCategoria($categoria_id);

        require_once 'views/producto/categoria.php';
    } else {
        header("Location:" . base_url);
    }
}

}
