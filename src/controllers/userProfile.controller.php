<?php
    require dirname(__DIR__) . "/controllers/noteController.php";

    session_start();

    //Si no hay datos de sesion, redirigir al login
    if(!count($_SESSION)){
        header("location: login");
    }

    //Inicializar variables que va a utilizar la vista
    $username = $_SESSION['username'] ?? null;
    $user_id = $_SESSION['user_id'] ?? null;
    $data['notes'] = array();

    $controller = new NoteController();

    //Si recibo un POST queriendo borrar una tarea
    if(isset($_POST['delete_note'])){
        $note_id = $_POST['delete_note'];
        $controller->deleteNote($_SESSION['user_id'], $note_id);
    }
    
    //CARGAR TODAS LAS TAREAS
    $data['notes'] = $controller->getNotes($_SESSION['user_id']);

    include dirname(__DIR__) . "/views/userProfileView.php";
?>