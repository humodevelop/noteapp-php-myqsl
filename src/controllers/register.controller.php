<?php
    require_once dirname(__DIR__) . "/controllers/userController.php";

    session_start();

    //Si hay datos en la sesion, redirigir al perfil del usuario
    if(count($_SESSION)){
        header("location: userProfileController.php");
    }

    //Inicializar variables que va a utilizar la vista
    $username = "";
    $email = "";
    $password = "";
    $confirmPassword = "";
    $data = array();
    $data['error'] = array();
    $data['message'] = "";

    if(count($_POST)){
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirmPassword = $_POST['confirmPassword'];

        //Intentar crear el usuario
        $controller = new UserController();
        try {
            $controller->registerUser($username, $email, $password, $confirmPassword);
                echo $data['message'] = "Usuario creado exitosamente.";
        } catch (\Throwable $th) {
            array_push($data['error'], $th->getMessage());
        }
    }

    include dirname(__DIR__) . "/views/registerView.php";
?>