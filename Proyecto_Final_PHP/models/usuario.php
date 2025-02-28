<?php
//Definiendo la clase modelo para usuario, lo que tiene que ver con acciones de 
// usuario en la base de datos se relaciona aquí en el modelo
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

        $rol = $this->rol ? $this->rol : 'user'; //para que se puedan crear usuarios que sean admin tambie
        $sql = "INSERT INTO usuarios"
            . " VALUES(NULL, '{$this->getNombre()}', '{$this->getApellidos()}', "
            . "'{$this->getEmail()}', '{$this->getPassword()}', 'user'"
            . ", NULL);";
        $save = $this->db->query($sql);

        $result = false;
        if ($save) {
            $result = true;
        }
        return $result;
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

    public function update() {
        $sql = "UPDATE usuarios SET nombre='{$this->getNombre()}', 
                                    apellidos='{$this->getApellidos()}',
                                    email='{$this->getEmail()}'";
        
        // Solo permitir cambiar el rol si está definido (solo los admins lo definirán)
        if ($this->getRol()) {
            $sql .= ", rol='{$this->getRol()}'";
        }
        
        $sql .= " WHERE id={$this->getId()}";
    
        $update = $this->db->query($sql);
        return $update ? true : false;
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

    // Obtener usuario por ID
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
            $verify = password_verify($password, $usuario->password);

            if ($verify) {
                $result = $usuario;
            }
        }
        return $result;
    }
}
