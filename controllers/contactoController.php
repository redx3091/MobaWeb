<?php

class contactoController{

    public function index(){

        //renderizando vista
        require_once 'views/contacto/contacto.php';
    }

    public function send(){
        $nombre = $_POST['nombre'];
        $telefono = $_POST['telefono'];
        $mail = $_POST['email'];

        $header = 'From: ' . $mail . " \r\n";
        $header .= "X-Mailer: PHP/" . phpversion() . " \r\n";
        $header .= "Mime-Version: 1.0 \r\n";
        $header .= "Content-Type: text/plain";

        $mensaje = "Este mensaje fue enviado por " . $nombre . ",\r\n";
        $mensaje .= "Su e-mail es: " . $mail . " \r\n";
        $mensaje .= "Su Telefono es:" . $telefono . "\r\n";
        $mensaje .= "Mensaje: " . $_POST['mensaje'] . " \r\n";
        $mensaje .= "Enviado el " . date('d/m/Y', time());

        $para = 'crivlaayacon@gmail.com';
        $asunto = 'Mensaje de mi sitio web';

        mail($para, $asunto, utf8_decode($mensaje), $header);

        header("Location:". base_url. 'contacto/index');
    }
}