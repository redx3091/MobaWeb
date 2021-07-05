<?php

class Pedido{
    private $id;
    private $nombres;
    private $apellidos;
    private $nombreempresa;
    private $ciudad;
    private $departamento;
    private $pais;
    private $direccion;
    private $telefono;
    private $email;
    private $coste;
    private $estado;
    private $fecha;
    private $hora;
    private $db;

    public function __construct(){
        $this->db = Database::connect();
    }

    //geteters
    public function getId(){
        return $this->id;
    }

    public function getNombres(){
        return $this->nombres;
    }

    public function getApellidos(){
        return $this->apellidos;
    }

    public function getNombreempresa(){
        return $this->nombreempresa;
    }
 
    public function getCiudad(){
        return $this->ciudad;
    }

    public function getDepartamento(){
        return $this->departamento;
    }

    public function getPais(){
        return $this->pais;
    }

    /**
     * Get the value of direccion
     */ 
    public function getDireccion(){
        return $this->direccion;
    }

    public function getTelefono(){
        return $this->telefono;
    }

    public function getEmail(){
        return $this->email;
    }

    public function getFecha(){
        return $this->fecha;
    }
 
    public function getEstado(){
        return $this->estado;
    }

    public function getCoste(){
        return $this->coste;
    }

    public function getHora(){
        return $this->hora;
    }

    //setters
    public function setId($id){
        $this->id = $id;
    }

    public function setCiudad($ciudad){
        $this->ciudad = $this->db->real_escape_string($ciudad);
    }

    public function setApellidos($apellidos){
        $this->apellidos = $this->db->real_escape_string($apellidos);
    }

    public function setNombres($nombres){
        $this->nombres = $this->db->real_escape_string($nombres);
    }

    public function setNombreempresa($nombreempresa){
        $this->nombreempresa = $this->db->real_escape_string($nombreempresa);
    }

    public function setDepartamento($departamento){
        $this->departamento = $this->db->real_escape_string($departamento);
    }
 
    public function setPais($pais){
        $this->pais = $this->db->real_escape_string($pais);
    }

    public function setDireccion($direccion){
        $this->direccion = $this->db->real_escape_string($direccion);
    }

    public function setTelefono($telefono){
        $this->telefono = $this->db->real_escape_string($telefono);
    }

    public function setEmail($email){
        $this->email = $this->db->real_escape_string($email);
    }

    public function setCoste($coste){
        $this->coste = $coste;
    }

    public function setEstado($estado){
        $this->estado = $estado;
    }

    public function setFecha($fecha){
        $this->fecha = $fecha;
    }

    public function setHora($hora){
        $this->hora = $hora;
    }

    public function save(){
        $sql = "INSERT INTO pedidos VALUES(NULL, '{$this->getNombres()}', '{$this->getApellidos()}', '{$this->getNombreempresa()}','{$this->getCiudad()}', '{$this->getDepartamento()}', '{$this->getPais()}', '{$this->getDireccion()}', {$this->getTelefono()}, '{$this->getEmail()}', {$this->getCoste()}, 'confirm', CURDATE(), CURTIME())";
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

    public function getIDPedido(){
        $sql = "SELECT id FROM pedidos ORDER BY id DESC LIMIT 1";
        $query = $this->db->query($sql);
        

        return $query->fetch_object();
    }

    public function save_relacion(){
        $sql = "SELECT LAST_INSERT_ID() as 'pedido';";
        $query = $this->db->query($sql);
        $pedido_id = $query->fetch_object()->pedido;
        
        // var_dump($pedido_id);
        // die;
        foreach($_SESSION['carrito'] as $elemento){
            $producto = $elemento['producto'];
            
            $insert ="INSERT INTO lineas_pedidos VALUES(NULL, {$pedido_id}, {$producto->id_p}, {$elemento['unidades']})";
            $save = $this->db->query($insert);
            
        }

        $result = false;
        if($save){
            $result = true;
        }
        return $result;
    }

    public function getOneByid($id){
        $sql = "SELECT nombre, apellidos, ciudad, departamento, pais, coste, direccion FROM pedidos WHERE id={$id}";
        
        $pedido = $this->db->query($sql);
        return $pedido->fetch_object();
    }

    public function getProductosByPedido($id_pedido){
        // SELECT pr.*, lp.unidades FROM productos pr INNER JOIN lineas_pedidos lp ON pr.id_p = lp.producto_id WHERE lp.pedido_id=517126402
        $sql = "SELECT pr.*, lp.unidades FROM productos pr INNER JOIN lineas_pedidos lp ON pr.id_p = lp.producto_id WHERE lp.pedido_id=$id_pedido";
        $producto =  $this->db->query($sql);
        return $producto;
    }

    public function getAll(){
        $productos = $this->db->query("SELECT * FROM pedidos ORDER BY id DESC");
        return $productos;
    }

    public function edit(){
        $sql = "UPDATE pedidos SET estado='{$this->getEstado()}' ";
        $sql .= " WHERE id={$this->getId()};";


        $save = $this->db->query($sql);

        $result = false;
        if ($save) {
            $result = true;
        }
        return $result;
    }

    public function getOne(){
        $productos = $this->db->query("SELECT * FROM pedidos WHERE id={$this->getId()}");
        return $productos->fetch_object();
    }

}