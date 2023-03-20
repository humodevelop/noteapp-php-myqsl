<?php
    require dirname(__DIR__) . "/controllers/noteController.php";

    session_start();

    //Si no hay datos de sesion, redirigir al login
    if(!count($_SESSION)){
        header("location: login");
    }

    $user_id = $_SESSION['user_id'];
    //Inicializar variables que va a utilizar la vista
    $title = "";
    $description = "";
    $data['error'] = array();

    //Si recibi datos por POST
    if(isset($_POST['title']) || isset($_POST['description']) ){
        
        $title = $_POST['title'];
        $description = $_POST['description'];
        
        //Intentar crear la nota
        $controller = new NoteController();
        try{
            $controller->createNote($user_id, $title, $description);
            header("location: profile");
        }catch (Throwable $th){
            array_push($data['error'], $th->getMessage());
        }
    }

    include dirname(__DIR__) . "/views/newNoteView.php";
?>