<?php
require_once 'models/adminModel.php';
class adminController{

	public function log(){
    	//renderizar vista
    	require_once 'views/admin/login.php';
	}

	public function registro(){
		require_once 'views/admin/registro.php';
	}

	public function save(){
		if (isset($_POST)) {

			$nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
			$apellidos = isset($_POST['apellidos']) ? $_POST['apellidos'] : false;
			$email = isset($_POST['email']) ? $_POST['email'] : false;
			$password = isset($_POST['password']) ? $_POST['password'] : false;

			// var_dump($validar);
			//     exit;
			if ($nombre && $apellidos && $email && $password) {
				$usuario = new Admin();
				$usuario->setNombre($nombre);
				$usuario->setApellidos($apellidos);
				$usuario->setEmail($email);
				$usuario->setPassword($password);

                // var_dump($usuario);
                // die;
				$save = $usuario->save();
				if ($save) {
					$_SESSION['register'] = "complete";
				} else {
					$_SESSION['register'] = "failed";
				}
			} else {
				$_SESSION['register'] = 'failed';
			}
		} else {
			$_SESSION['register'] = "<strong class='alert_red'>Algo ha fallado:</strong>";
		}
		header("Location:" . base_url . 'admin/registro');
	}

public function login() {
    if(isset($_POST)){
        $usuario = new Admin();
        $usuario->setEmail($_POST['email']);
        $usuario->setPassword($_POST['password']);
        $identity = $usuario->login();

        //crear sesión
        if($identity && is_object($identity)){
            $_SESSION['identity'] = $identity;
            
            if($identity->rol == 'admin'){
                $_SESSION['admin'] = true;
            }
        }else{
            $_SESSION['error_login'] = "Usuario no existe!!";
        }
    }
    header('Location:' . base_url .'slider/panel');
}

public function logout(){
    if(isset($_SESSION['identity'])){
        unset($_SESSION['identity']);
    }

    if(isset($_SESSION['admin'])){
        unset($_SESSION['admin']);
    }
    header('Location:'.base_url);
}

}