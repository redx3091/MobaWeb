<?php

class Slider{
    private $id;
    private $imagen;

    private $db;

    public function __construct(){
        $this->db = Database::connect();
    }

    public function getId(){
        return $this->id;
    }

    public function getImagen(){
        return $this->imagen;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function setImagen($imagen){
        $this->imagen = $imagen;
    }

    public function save(){
        $sql = "INSERT slider VALUES(NULL, '{$this->getImagen()}');"; 
        $save =  $this->db->query($sql);
        // echo $sql;
        // echo $this->db->error;
        // die();
        $result = false;
        if($save){
            $result = true;
        }

        return $result;
    }

    public function getImages(){
        $imagenes = $this->db->query("SELECT * FROM slider ORDER BY id");
        return $imagenes;
    }
    public function getOneImage($id){
        $imagenes = $this->db->query("SELECT imagen FROM slider WHERE id=$id");
        return $imagenes->fetch_object();  
    }

    public function getAll($limit){
        $imagenes = $this->db->query("SELECT * FROM slider ORDER BY id DESC LIMIT $limit");

        // echo $imagenes;
        // echo $this->db->error;
        // die();
        return $imagenes;
    }

    public function delete(){
        $sql = "DELETE FROM slider WHERE id={$this->id}";
        $delete = $this->db->query($sql);
        $result = false;
        if ($delete) {
            $result = true;
        }
        return $result;
    }
}