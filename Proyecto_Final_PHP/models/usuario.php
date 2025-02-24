<?php
//Definiendo la clase modelo para usuario, lo que tiene que ver con acciones de 
// usuario en la base de datos se relaciona aquí en el modelo
class Usuario{
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
        public function __construct() {
            $this->db = Database::connect();
        }
        //Métodos Getter and Setter
        function getId() {
            return $this->id;
        }
    
        function getNombre() {
            
            return $this->nombre;
        }
    
        function getApellidos() {
            return $this->apellidos;
        }
    
        function getEmail() {
            return $this->email;
        }
    
        function getPassword() {
            return password_hash($this->db->real_escape_string($this->password), PASSWORD_BCRYPT, ['cost' => 4]);
        }
    
        function getRol() {
            return $this->rol;
        }
    
        function getImagen() {
            return $this->imagen;
        }
    
        function setId($id) {
            $this->id = $id;
        }
    
        function setNombre($nombre) {
            //Se usa un método para validar que cada propiedad se obtenga en un string
            $this->nombre = $this->db->real_escape_string($nombre);
        }
    
        function setApellidos($apellidos) {
            $this->apellidos = $this->db->real_escape_string($apellidos);
        }
    
        function setEmail($email) {
            $this->email = $this->db->real_escape_string($email);
        }
    
        function setPassword($password) {
             
            $this->password =$password;
        }
    
        function setRol($rol) {
            $this->rol = $rol;
        }
    
        function setImagen($imagen) {
            $this->imagen = $imagen;
        }


        public function save(){
            $sql = "INSERT INTO usuarios"
                    . " VALUES(NULL, '{$this->getNombre()}', '{$this->getApellidos()}', "
                    . "'{$this->getEmail()}', '{$this->getPassword()}', 'user'"
                    . ", NULL);";
            $save = $this->db->query($sql);
            
            $result = false;
            if($save){
               $result = true; 
            }
            return $result;
        }

        

}