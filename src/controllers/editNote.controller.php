<?php
    require dirname(__DIR__) . "/controllers/noteController.php";

    session_start();

    //Si no hay datos de sesion, redirigir al login
    if(!count($_SESSION)){
        header("location: login");
    }

    //Si no recibo el id de la nota, redirigir al perfil
    if(!isset($_POST['note_id'])){
        header("location: profile");
    }

    //Inicializar variables que va a utilizar la vista
    $data['error'] = array();
    $user_id = $_SESSION['user_id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $note_id = $_POST['note_id'];

    //Si se envio el formulario
    if(isset($_POST['submit'])){
        $controller = new NoteController();
        try{
            $controller->updateNote($user_id, $note_id, $title, $description);
            header("location: profile");
        }catch(Throwable $th){
            array_push($data['error'], $th->getMessage());
        }
    }

    include dirname(__DIR__) . "/views/editNoteView.php";
?>