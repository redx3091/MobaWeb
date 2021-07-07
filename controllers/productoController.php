<?php

require_once 'models/productoModel.php';

class productoController{

    public function tienda(){

        if(isset($_POST['orderby'])) {
            $resulst = $_POST['orderby'];  
 
        }else{
             $resulst = 'id_p';
                $orden = $resulst;
                $producto = new Producto();
                $productos = $producto->getAllbyOrderTipo($orden);
            
        }

        if($resulst == 'id_p'){
            $orden = $resulst;
            $producto = new Producto();
            $productos = $producto->getAllbyOrderTipo($orden);
        }

        if($resulst == 'tipo'){
            $orden = $resulst;
            $producto = new Producto();
            $productos = $producto->getAllbyOrderTipo($orden);
        }
        if($resulst == 'fecha'){
            $orden = $resulst;
            $producto = new Producto();
            $productos = $producto->getAllbyOrderFecha($orden);
        }

        if($resulst == 'DESC'){
            $orden = $resulst;
            $producto = new Producto();
            $productos = $producto->getAllbyOrderPrecio($orden);
        }

        if($resulst == 'ASC'){
            $orden = $resulst;
            $producto = new Producto();
            $productos = $producto->getAllbyOrderPrecio($orden);
        }
        require_once 'views/producto/tienda.php';
    }

    public function ver(){
        
        if(isset($_GET['id_p'])){
            $id = $_GET['id_p'];
    
            $producto = new Producto();
            $producto->setId($id);
            
            $pro = $producto->getOne();
          }
          
          require_once 'views/producto/ver.php';
    }
    
    public function crear(){
        Utils::isAdmin();
        //renderizar vista
        require_once 'views/producto/crear.php';
    }

    public function gestion(){
        Utils::isAdmin();
        $producto = new Producto();
        $productos = $producto->getAll();

        // var_dump($productos);
        //renderizar vista
        require_once 'views/producto/gestion.php';
    }


    public function save(){
        Utils::isAdmin();
        if(isset($_POST)){
            $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
            $descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : false;
            $precio = isset($_POST['precio']) ? $_POST['precio'] : false;
            $stock = isset($_POST['stock']) ? $_POST['stock'] : false;
            $tipo = isset($_POST['tipo']) ? $_POST['tipo'] : false;

            if($nombre && $descripcion && $precio && $stock && $tipo){
                $producto = new Producto();
                $producto->setNombre($nombre);
                $producto->setDescripcion($descripcion);
                $producto->setPrecio($precio);
                $producto->setStock($stock);
                $producto->setTipo_id($tipo);

                //guardar imagen
                if(isset($_FILES['imagen'])){
                    $file = $_FILES['imagen'];
                    $filename = $file['name'];
                    $mimetype = $file['type'];

                    if($mimetype == "image/jpg" || $mimetype == "image/jpeg" || $mimetype == "image/png" || $mimetype == "image/gif"){
                        //creamos carpeta de almacenamiento de imagenes
                        if(!is_dir('uploads/imgproduct')){
                            mkdir('uploads/imgproduct', 0777, true);
                        }

                        $producto->setImagen($filename);

                        move_uploaded_file($file['tmp_name'], 'uploads/imgproduct/' . $filename);
                    }
                }
                // die();
                if(isset($_GET['id_p'])) {
                    $id = $_GET['id_p'];
                    $producto->setId($id);
                    $save = $producto->edit();

                }else{
                    $save = $producto->save();
                }
                if($save){
                    $_SESSION['producto'] = 'complete';
                }else{
                    $_SESSION['producto'] = 'failed';
                }
            }else{
                $_SESSION['producto'] = 'failed';
            }
        }else{
            $_SESSION['producto'] = 'failed';
        }
        header('Location:' . base_url . "producto/gestion");
    }

    public function editar(){
        Utils::isAdmin();
        if (isset($_GET['id_p'])) {
            $id = $_GET['id_p'];
            $edit = true;

            $producto = new Producto();
            $producto->setId($id);
            $pro = $producto->getOne();

            require_once 'views/producto/crear.php';
        } else {
            header('Location:' . base_url . 'producto/gestion');
        }
    }

    public function eliminar(){
        Utils::isAdmin();

        if (isset($_GET['id_p'])) {
            $id_p = $_GET['id_p'];
            $producto = new Producto();
            $producto->setId($id_p);
            // var_dump($producto);
            // die();
            $delete = $producto->delete();

            if ($delete) {
                $_SESSION['delete'] = 'complete';
            } else {
                $_SESSION['delete'] = 'failed';
            }
        } else {
            $_SESSION['delete'] = 'failed';
        }
        header('Location:' . base_url . 'producto/gestion');
    }
}