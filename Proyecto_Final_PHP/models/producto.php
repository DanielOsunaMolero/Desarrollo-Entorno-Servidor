<?php
//Definiendo la clase modelo para producto, lo que tiene que ver con acciones de 
// usuario en la base de datos se relaciona aquí en el modelo
class Producto{
    //Definiendo propiedades del usuario = Campos de la base de datos
    private $id;
    private $categoria_id;
    private $nombre;
    private $descripcion;
    private $precio;
    private $stock;
    private $oferta;
    private $fecha;
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
    
        function getCategoria_id() {
            return $this->categoria_id;
        }
    
        function getNombre() {
            return $this->nombre;
        }
    
        function getDescripcion() {
            return $this->descripcion;
        }
    
        function getPrecio() {
            return $this->precio;
        }
    
        function getStock() {
            return $this->stock;
        }
    
        function getOferta() {
            return $this->oferta;
        }
    
        function getFecha() {
            return $this->fecha;
        }
    
        function getImagen() {
            return $this->imagen;
        }
    
        function setId($id) {
            $this->id = $id;
        }
    
        function setCategoria_id($categoria_id) {
            $this->categoria_id = $categoria_id;
        }
    
        function setNombre($nombre) {
            // se pasa función para comprobar texto en los inputs de inserción de productos
            $this->nombre = $this->db->real_escape_string($nombre);
        }
    
        function setDescripcion($descripcion) {
            $this->descripcion = $this->db->real_escape_string($descripcion);
        }
    
        function setPrecio($precio) {
            $this->precio = $this->db->real_escape_string($precio);
        }
    
        function setStock($stock) {
            $this->stock = $this->db->real_escape_string($stock);
        }
    
        function setOferta($oferta) {
            $this->oferta = $this->db->real_escape_string($oferta);
        }
    
        function setFecha($fecha) {
            $this->fecha = $fecha;
        }
    
        function setImagen($imagen) {
            $this->imagen = $imagen;
        }

        //Método para seleccionar los productos de la BD
    public function getProductos() {
        //Consulta a la base de datos
        $productos = $this->db->query("SELECT * FROM productos ORDER BY id DESC;");
        return $productos;
    }

    //Escogemos uno aleatorio 
    public function getRandom($limit) {
        $productos = $this->db->query("SELECT * FROM productos ORDER BY RAND() LIMIT $limit;");
        return $productos;
    }

    public function save(){
        $sql = "INSERT INTO productos"
                . " VALUES(NULL,{$this->getCategoria_id()}, '{$this->getNombre()}', '{$this->getDescripcion()}', "
                . "{$this->getPrecio()}, {$this->getStock()}, 0"
                . ", CURDATE(), '{$this->getImagen()}');";
        $save = $this->db->query($sql);
    //La oferta siempre tiene 0
        
        $result = false;
        if($save){
           $result = true; 
        }
        return $result;
    }

    public function getById($id)
    {
        $sql = "SELECT * FROM productos WHERE id = {$id}";
        $producto = $this->db->query($sql);

        return $producto->fetch_object(); 
    }

    public function update()
    {
        $sql = "UPDATE productos SET 
                categoria_id = '{$this->categoria_id}', 
                nombre = '{$this->nombre}', 
                descripcion = '{$this->descripcion}', 
                precio = '{$this->precio}', 
                stock = '{$this->stock}'";
        
        
        if (!empty($this->imagen)) {
            $sql .= ", imagen = '{$this->imagen}'";
        }

        $sql .= " WHERE id = '{$this->id}'";

        return $this->db->query($sql);
    }

    public function delete()
    {
        $sql = "DELETE FROM productos WHERE id = '{$this->id}'";
        return $this->db->query($sql);
    }
    public function getByCategoria($categoria_id)
{
    $sql = "SELECT * FROM productos WHERE categoria_id = {$categoria_id}";
    return $this->db->query($sql);
}

}