<?php

require_once 'models/pedidoModel.php';

class pedidoController{
    public function hacer(){
        require_once 'views/pedido/hacer.php';
    }

    public function add(){
        
        if(isset($_SESSION['carrito'])){
            // $id = rand();
        
            $nombres = isset($_POST['nombres']) ? $_POST['nombres'] : false;
            $apellidos = isset($_POST['apellidos']) ? $_POST['apellidos'] : false;
            $empresa = isset($_POST['empresa']) ? $_POST['empresa'] : NULL;
            $ciudad = isset($_POST['ciudad']) ? $_POST['ciudad'] : false;
            $departamento = isset($_POST['departamento']) ? $_POST['departamento'] : false;
            $pais = isset($_POST['pais']) ? $_POST['pais'] : false;
            $direccion = isset($_POST['direccion']) ? $_POST['direccion'] : false;
            $telefono = isset($_POST['telefono']) ? $_POST['telefono'] : false;
            $correo = isset($_POST['email']) ? $_POST['email'] : false;


            $stats = Utils::statsCarrito();
            $coste = $stats['total'];

            if($nombres && $apellidos &&  $ciudad && $departamento && $pais && $direccion && $telefono && $correo){
                $pedido = new Pedido();
                // $pedido->setId($id);
                $pedido->setNombres($nombres);
                $pedido->setApellidos($apellidos);
                $pedido->setNombreempresa($empresa);
                $pedido->setCiudad($ciudad);
                $pedido->setDepartamento($departamento);
                $pedido->setPais($pais);
                $pedido->setDireccion($direccion);
                $pedido->setTelefono($telefono);
                $pedido->setEmail($correo);
                $pedido->setCoste($coste);

                // var_dump($pedido);
                // die();
                //guardarpedido
                $save = $pedido->save();

                //guardar relacion pedido
                $save_relacion  = $pedido->save_relacion();


                //obtener id del pedido 
                $ped = new Pedido();
                $pedido_id = $ped->getIDPedido();
                // var_dump($pedido);
                // var_dump($save);
                // var_dump($save_relacion);
                // var_dump($pedido_id);
                // die();

                if($save && $save_relacion){
                    $_SESSION['pedido'] = "complete";
                    $_SESSION['id'] = $pedido_id;
                }else{
                    $_SESSION['pedido'] = "failed";
                }
            }else{
                $_SESSION['pedido'] = "failed";
            }
            header('Location:' .base_url. 'pedido/confirmado');
        }else{
            header('Location:' .base_url);
        }
    }

    public function confirmado(){
        
        if(isset($_SESSION['id'])){
            $id_pedido = $_SESSION['id'];
            $pedido = new Pedido();
            // $pedido->setId($id_pedido);
            $pedido = $pedido->getOneByid($id_pedido->id);
            
            $productos_pedido = new Pedido();
            $productos = $productos_pedido->getProductosByPedido($id_pedido->id);
        }

        if(isset($_SESSION['carrito'])){
            Utils::deleteSession('carrito');
        }
        
        // var_dump($_SESSION['id']);
        require_once 'views/pedido/confirmado.php';
    }

    public function gestion(){
        Utils::isAdmin();
        $gestion = true;

        $pedido = new Pedido();
        $pedidos= $pedido->getAll();
        require_once 'views/pedido/gestion.php';
    }

    public function estado(){
        Utils::isAdmin();
        if(isset($_POST['pedido_id']) && isset($_POST['estado'])){
            //recolecion datos formulario 
            $id = $_POST['pedido_id'];
            $estado = $_POST['estado'];

            //update del pedido
            $pedido = new pedido();
            
            $pedido->setEstado($estado);
            $pedido= $pedido->edit();

            header("Location:".base_url.'pedido/detalle&id=' .$id);
        }else{
            header("Location:".base_url);
        }
    }

    public function detalle(){

        if(isset($_GET['id'])){
            $id = $_GET['id'];

            //Sacar el pedido
            // Sacar el pedido
			$pedido = new Pedido();
			$pedido->setId($id);
			$pedido = $pedido->getOne();

            //sacar los productos
            $pedido_productos = new Pedido();
            $productos = $pedido_productos->getProductosByPedido($id);

            require_once 'views/pedido/detalle.php';
        }else{
            header("Location:".base_url.'pedido/mis_pedidos');
        }

        
    }

    public function consultarPedido(){

        require_once 'views/pedido/consulta.php';
    }
    public function mi_pedido(){
        $id_pedido = $_POST['numeropedido'];
        if(isset($_POST['numeropedido'] )){
            $pedido = new Pedido();
            $pedidos = $pedido->getOnePed($id_pedido);

            $ped = new Pedido();
            $peds = $ped->getProductosByPedido($id_pedido);
        }
        require_once 'views/pedido/mi_pedido.php';
    }
    
}