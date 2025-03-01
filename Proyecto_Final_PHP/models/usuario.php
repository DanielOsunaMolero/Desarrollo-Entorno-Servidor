<?php

class Usuario
{
    //Definiendo propiedades del usuario = Campos de la base de datos
    private $id;
    private $nombre;
    private $apellidos;
    private $email;
    private $password;
    private $rol;
    private $imagen;
    private $db;

    // Constructor
    public function __construct()
    {
        $this->db = Database::connect();
    }
    //Métodos Getter and Setter
    function getId()
    {
        return $this->id;
    }

    function getNombre()
    {

        return $this->nombre;
    }

    function getApellidos()
    {
        return $this->apellidos;
    }

    function getEmail()
    {
        return $this->email;
    }

    function getPassword()
    {
        return password_hash($this->db->real_escape_string($this->password), PASSWORD_BCRYPT, ['cost' => 4]);
    }

    function getRol()
    {
        return $this->rol;
    }

    function getImagen()
    {
        return $this->imagen;
    }

    function setId($id)
    {
        $this->id = $id;
    }

    function setNombre($nombre)
    {
        //Se usa un método para validar que cada propiedad se obtenga en un string
        $this->nombre = $this->db->real_escape_string($nombre);
    }

    function setApellidos($apellidos)
    {
        $this->apellidos = $this->db->real_escape_string($apellidos);
    }

    function setEmail($email)
    {
        $this->email = $this->db->real_escape_string($email);
    }

    function setPassword($password)
    {

        $this->password = $password;
    }

    function setRol($rol)
    {
        $this->rol = $rol;
    }

    function setImagen($imagen)
    {
        $this->imagen = $imagen;
    }


    public function save()
{
    try {
        // Comprobar si la conexión está activa
        if (!$this->db) {
            throw new Exception("Error: No hay conexión con la base de datos.");
        }

        // Preparar la consulta SQL con placeholders
        $stmt = $this->db->prepare("INSERT INTO usuarios (nombre, apellidos, email, password) 
                                    VALUES (?, ?, ?, ?)");

        // Verificar si la preparación de la consulta falló
        if (!$stmt) {
            throw new Exception("Error al preparar la consulta: " . $this->db->error);
        }

        // Bind de parámetros
        $hashed_password = password_hash($this->password, PASSWORD_BCRYPT);
        $stmt->bind_param("ssss", $this->nombre, $this->apellidos, $this->email, $hashed_password);

        // Ejecutar la consulta
        $success = $stmt->execute();

        // Si la ejecución falla, mostrar el error de MySQL
        if (!$success) {
            throw new Exception("Error en la ejecución de la consulta: " . $stmt->error);
        }

        return true;
    } catch (Exception $e) {
        error_log("Error en el registro de usuario: " . $e->getMessage());
        echo "Ocurrió un error: " . $e->getMessage(); // Muestra el error en pantalla para depuración
        return false;
    }
}


    public function saveAdmin()
    {
        $sql = "INSERT INTO usuarios"
            . " VALUES(NULL, '{$this->getNombre()}', '{$this->getApellidos()}', "
            . "'{$this->getEmail()}', '{$this->getPassword()}', '{$this->getRol()}'"
            . ", NULL);";
        $save = $this->db->query($sql);

        return $save ? true : false;
    }


    public function crear()
    {
        Utils::isAdmin(); // Solo administradores pueden acceder
        require_once './views/usuario/crear.php';
    }

    public function update()
    {
        $sql = "UPDATE usuarios SET 
                nombre = '{$this->getNombre()}', 
                apellidos = '{$this->getApellidos()}',
                email = '{$this->getEmail()}'";

        if (!empty($this->password)) {
            $sql .= ", password = '{$this->password}'"; // La contraseña ya viene hasheada
        }

        // Solo actualizar el rol si el usuario es admin
        if (isset($_SESSION['admin']) && $_SESSION['admin']) {
            $sql .= ", rol = '{$this->getRol()}'";
        }

        $sql .= " WHERE id = '{$this->getId()}'";

        return $this->db->query($sql);
    }





    public function delete()
    {
        $sql = "DELETE FROM usuarios WHERE id = {$this->getId()}";
        $delete = $this->db->query($sql);
        return $delete ? true : false;
    }


    // Método para obtener todos los usuarios para el admin
    public function getAll()
    {
        $sql = "SELECT * FROM usuarios";
        $usuarios = $this->db->query($sql);
        return $usuarios;
    }


    public function getById($id)
    {
        $sql = "SELECT * FROM usuarios WHERE id = $id";
        $usuario = $this->db->query($sql);
        return $usuario->fetch_object();
    }


    //Método para login de usuarios
    public function login()
    {
        $result = false;
        $email = $this->email;
        $password = $this->password;
        //Miramos si el usuario existe en la BBDD
        $sql = "SELECT * FROM usuarios WHERE email = '$email'";
        $login = $this->db->query($sql);

        if ($login && $login->num_rows == 1) {

            $usuario = $login->fetch_object();
            //Verificar si la contraseña es correcta
            $verify = password_verify($password, $usuario->password); //Usamospassword verify 

            if ($verify) {
                $result = $usuario;
            }
        }
        return $result;
    }
}
