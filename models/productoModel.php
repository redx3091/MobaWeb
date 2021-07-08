<?php

class Producto{

    private $id_p;
    private $tipo_id;
    private $nombre;
    private $descripcion;
    private $precio;
    private $stock;
    private $fecha;
    private $imagen;
    private $db;

    public function __construct(){
        $this->db = Database::connect();
    }

    //Getters
    public function getId(){
        return $this->id_p;
    }

    public function getTipo_id(){
        return $this->tipo_id;
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function getPrecio(){
        return $this->precio;
    }

    public function getDescripcion(){
        return $this->descripcion;
    }

    public function getStock(){
        return $this->stock;
    }

    public function getFecha(){
        return $this->fecha;
    }

    public function getImagen(){
        return $this->imagen;
    }

    public function getDb(){
        return $this->db;
    }

    //Setters
    public function setId($id_p){
        $this->id_p = $id_p;
    }

  
    public function setDescripcion($descripcion){
        $this->descripcion = $this->db->real_escape_string($descripcion);
    }

    public function setTipo_id($tipo_id){
        $this->tipo_id = $tipo_id;
    }

    public function setNombre($nombre){
        $this->nombre = $this->db->real_escape_string($nombre);
    }

    public function setPrecio($precio){
        $this->precio = $this->db->real_escape_string($precio);
    }

    public function setFecha($fecha){
        $this->fecha = $fecha;
    }

    public function setStock($stock){
        $this->stock = $this->db->real_escape_string($stock);
    }

    public function setImagen($imagen){
        $this->imagen = $imagen;
    }

    //guardar productos en base de datos
    public function save(){
        $sql = "INSERT INTO productos VALUES(NULL, {$this->getTipo_id()}, '{$this->getNombre()}', '{$this->getDescripcion()}', {$this->getPrecio()}, {$this->getStock()}, CURDATE(), '{$this->getImagen()}')";
        $save = $this->db->query($sql);
        // echo $sql;
        // echo $this->db->error;
        // die();
        $result = false;
        if($save){
            $result = true;
        }
        return $result;
    }
    //Obtener todos los productos de la abse de datos
    public function getAll(){
    
        $sql = "SELECT * FROM productos INNER JOIN tipos ON productos.tipo_id = tipos.id_t";
        // echo $sql;
        // echo $this->db->error;
        // die();
         $productos = $this->db->query($sql);
        return $productos;
    }

    public function getRamdon($limit){
        $productos = $this->db->query("SELECT * FROM productos INNER JOIN tipos ON productos.tipo_id = tipos.id_t ORDER BY RAND() LIMIT $limit");
        return $productos;
    }

    public function getAllbyOrderPrecio($orden){
    
        $sql = "SELECT * FROM productos INNER JOIN tipos ON productos.tipo_id = tipos.id_t ORDER BY precio $orden";
        // echo $sql;
        // echo $this->db->error;
        // die();
         $productos = $this->db->query($sql);
        return $productos;
    }

    public function getAllbyOrderTipo($orden){

        $sql = "SELECT * FROM productos INNER JOIN tipos ON productos.tipo_id = tipos.id_t ORDER BY $orden";
        // echo $sql;
        // echo $this->db->error;
        // die();
         $productos = $this->db->query($sql);
        return $productos;
    }

    public function getAllbyOrderFecha(){
        $sql = "SELECT * FROM productos INNER JOIN tipos ON productos.tipo_id = tipos.id_t ORDER BY fecha DESC";
        $productos = $this->db->query($sql);
        return $productos;
    }
    //obtener un producto de la base de datos por ID
    public function getOne(){
        $productos = $this->db->query("SELECT * FROM productos INNER JOIN tipos ON productos.tipo_id = tipos.id_t WHERE id_p={$this->getId()}");
        return $productos->fetch_object();
    }

    public function edit(){
        $sql = "UPDATE productos SET tipo_id={$this->getTipo_id()}, nombre='{$this->getNombre()}', descripcion='{$this->getDescripcion()}', precio={$this->getPrecio()}, stock={$this->getStock()}  ";

        if ($this->getImagen() != null) {
            $sql .= ", imagen='{$this->getImagen()}'";
        }

        $sql .= " WHERE id_p={$this->id_p};";


        $save = $this->db->query($sql);

        // echo $sql;
        // echo $this->db->error;
        // die();

        $result = false;
        if ($save) {
            $result = true;
        }
        return $result;
    }

    public function delete(){
        $sql = "DELETE FROM  productos  WHERE  id_p={$this->id_p}";
        $delete = $this->db->query($sql);

        $result = false;
        if ($delete) {
            $result = true;
        }
        return $result;
    }
}