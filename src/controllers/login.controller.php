<?php
    require dirname(__DIR__) . "/controllers/userController.php";

    session_start();

    //Si hay datos en el array SESSION, redirigir a la página del usuario
    if(count($_SESSION)){
        header("location: profile");
    }

    //Inicialización
    $username = $_POST['username'] ?? null;
    $password = $_POST['password'] ?? null;
    $data = null;
    $data['error'] = array();

    //Si hay un nombre de usuario y una contraseña intentar iniciar sesión
    if(isset($username) && isset($password)){
        try {
            $controller = new UserController();
            //Obtener datos del usuario
            $user = $controller->getUser($username, $password);
            //Si obtuvo un dato
            if($user)
            {
                //Inicializar variables de sesión
                $_SESSION['user_id'] = $user['user_id'];
                $_SESSION['username'] = $user['username'];
                //Redirigir a la página del usuario
                header('location: profile');
            }
        } catch (\Throwable $th) {
            array_push($data['error'], $th->getMessage());
        }
    }
    //Cargar la vista
    include dirname(__DIR__) . "/views/loginView.php";
?>