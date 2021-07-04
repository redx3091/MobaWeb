<?php

class Utils{
    public static function deleteSession($name){
        if (isset($_SESSION[$name])) {
            $_SESSION[$name] = null;
        }
        return $name;
    }

    public static function isAdmin(){
        if (!isset($_SESSION['admin'])) {
            header("Location:" . base_url);
        } else {
            return true;
        }
    }

    public static function isIdentity(){
        if (!isset($_SESSION['identity'])) {
            header("Location:" . base_url);
        } else {
            return true;
        }
    }

    public static function showTipos(){
        require_once 'models/tipoModel.php';
        $tipos = new Tipo();
        $tipos = $tipos->getAll();
        return $tipos;
    }

    //mostramos los stats del carrito almacenados
    // y hacemos operaciones matematicas para dar un total de compra
    public static function statsCarrito(){
        $stats = array(
            'count' => 0,
            'total' => 0
        );
        if(isset($_SESSION['carrito'])){
            $stats['count'] = count($_SESSION['carrito']);
            
            foreach($_SESSION['carrito'] as $producto){ 
                $stats['total'] += $producto['precio']*$producto['unidades'];
            }
        }
        return $stats;
    }
 
    public static function showStatus($status){
        $value = 'Pendiente';
        
        if($status == 'confirm'){
            $value = 'Pendiente';
        }elseif($status == 'preparation'){
            $value = 'En Preparación';
        }elseif($status == 'ready'){
            $value = 'Preparado para envió y recolección';
        }elseif($status == 'sended'){
            $value = "Enviado";
        }

        return $value;
    }

}