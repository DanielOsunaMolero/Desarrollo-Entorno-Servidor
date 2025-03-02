<?php

class Categoria
{
    private $id;
    private $nombre;
    private $db;

    // Constructor
    public function __construct()
    {
        $this->db = Database::connect();
    }

    // Métodos Getter y Setter
    function getId()
    {
        return $this->id;
    }

    function getNombre()
    {
        return $this->nombre;
    }

    function setId($id)
    {
        $this->id = $id;
    }

    function setNombre($nombre)
    {
        $this->nombre = $this->db->real_escape_string($nombre);
    }

    public function getCategorias()
    {
        $sql = "SELECT * FROM categorias ORDER BY nombre ASC";
        return $this->db->query($sql);
    }

    public function save()
    {
        $sql = "INSERT INTO categorias (nombre) VALUES ('{$this->getNombre()}')";
        $save = $this->db->query($sql);

        if (!$save) {
            error_log("Error en la consulta SQL: " . $this->db->error);
            return false;
        }

        return true;
    }

    public function getById($id)
    {
        $sql = "SELECT * FROM categorias WHERE id = {$id}";
        $result = $this->db->query($sql);
        return $result->fetch_object(); 
    }
}
?>
