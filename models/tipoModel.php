<?php

class Tipo{
    private $id;
    private $tipo;
    private $db;

    public function __construct(){
        $this->db = Database::connect();
    }

    //getters
    public function getId(){
        return $this->id;
    }

    public function getTipo(){
        return $this->tipo;
    }

    //setter
    public function setId($id){
        $this->id = $id;
    }

    public function setTipo($tipo){
        $this->tipo = $this->db->real_escape_string($tipo);
    }

    public function getAll(){
        $tipos = $this->db->query("SELECT * FROM tipos ORDER BY id_t");
        return $tipos;
    }
}