<?php

require_once 'models/productoModel.php';
require_once 'models/sliderModel.php';

class inicioController
{
    public function index(){
        //slider llenado
        $imagen = new Slider();
        $imagenes = $imagen->getAll(9);
        // var_dump($imagenes);

        //destacados llenado
        $producto = new Producto();
        $productos = $producto->getRamdon(4);
        //rennderizar vista
        require_once 'views/inicio/content-central.php';
    }
}
