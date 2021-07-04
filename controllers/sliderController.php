<?php
require_once 'models/sliderModel.php';

class sliderController{

    public function panel(){
        Utils::isAdmin();

        $imagen = new Slider();
        $imagenes = $imagen->getImages();

        //renderizar vista
        require_once 'views/admin/panelAdmin.php';
    }

    public function gestion(){
		Utils::isAdmin();

		
	}

    //funcion para guardar imagenes carrucel
    public function save(){
        Utils::isAdmin();
        if(isset($_FILES['imagen'])){
            $imagen = new Slider();
            $file = $_FILES['imagen'];
            $filename = $file['name'];
            $mimetype = $file['type'];

            if($mimetype == "image/jpg" || $mimetype == "image/jpeg" || $mimetype == "image/png" || $mimetype == "image/gif"){
                if(!is_dir('uploads/images')){
                    mkdir('uploads/images', 0777, true);
                }

                $imagen->setImagen($filename);
                // var_dump($imagen);
                // die();

                move_uploaded_file($file['tmp_name'], 'uploads/images/'. $filename);
            }

            if(isset($imagen)){
                $save = $imagen->save();
            }else{
                $_SESSION['imagen'] = 'failed';
            }

            if($save){
                $_SESSION['imagen'] = 'complete';
            }else{
                $_SESSION['imagen'] = 'failed';
            }

        }else{
            $_SESSION['imagen'] = 'failed';
        }
        header('Location:'.base_url.'slider/panel');
    }

    public function eliminar(){
        Utils::isAdmin();
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
           
            $imagen = new Slider();
            $imagen->setId($id);
            $delete = $imagen->delete();
            

            if ($delete) {
                $_SESSION['delete'] = 'complete';
            } else {
                $_SESSION['delete'] = 'failed';
            }
        } else {
            $_SESSION['delete'] = 'failed';
        }
        header('Location:' . base_url . 'slider/panel');
    }
}