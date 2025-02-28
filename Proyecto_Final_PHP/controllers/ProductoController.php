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
        // Es un administrador?
        Utils::isAdmin();
        // incluyendo vista para la creación de los productos
        require_once 'views/producto/crear.php';
    }

    public function save()
    {
        // Es un administrador?
        Utils::isAdmin();

        //¿Llegan datos por POST?
        if (isset($_POST)) {
            $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
            $descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : false;
            $precio = isset($_POST['precio']) ? $_POST['precio'] : false;
            $stock = isset($_POST['stock']) ? $_POST['stock'] : false;
            $categoria = isset($_POST['categoria']) ? $_POST['categoria'] : false;
            //$imagen = isset($_POST['imagen']) ? $_POST['imagen'] : false;

            if ($nombre && $descripcion && $precio && $stock && $categoria) {
                //Creamos objeto de la clase modelo
                $producto = new Producto();

                // Le damos valor a cada propiedad, mediante los datos del formulario
                $producto->setNombre($nombre);
                $producto->setDescripcion($descripcion);
                $producto->setPrecio($precio);
                $producto->setStock($stock);
                $producto->setCategoria_id($categoria);

                // Guardar la imagen

                if (isset($_FILES['imagen'])) {
                    $file = $_FILES['imagen'];
                    $filename = $file['name'];
                    $mimetype = $file['type'];

                    if ($mimetype == 'image/jpg' || $mimetype == 'image/jpeg' || $mimetype == 'image/png' || $mimetype == 'image/gif') {

                        if (!is_dir('uploads/images')) {

                            mkdir('uploads/images', 0777, true);
                        }
                        //Guardar el archivo en la carpeta o directorio
                        move_uploaded_file($file['tmp_name'], 'uploads/images/' . $filename);
                        $producto->setImagen($filename);
                    }
                }

                $save = $producto->save();

                //Comprobamos si se inserta bien
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
        // Redirección al listado de productos en gestión
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

            $producto = new Producto();
            $producto->setId($id);
            $producto->setNombre($nombre);
            $producto->setDescripcion($descripcion);
            $producto->setPrecio($precio);
            $producto->setStock($stock);
            $producto->setCategoria_id($categoria);

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

            $update = $producto->update();
            $_SESSION['edit'] = $update ? "complete" : "failed";
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

            // Obtener la categoría correctamente
            $categoria = new Categoria();
            $categoria->setId($categoria_id);
            $categoria_actual = $categoria->getById(); // Ahora sí funcionará

            // Obtener productos de la categoría seleccionada
            $producto = new Producto();
            $productos = $producto->getByCategoria($categoria_id);

            require_once 'views/producto/categoria.php';
        } else {
            header("Location:" . base_url);
        }
    }
}
