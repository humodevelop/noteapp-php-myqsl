<?php
    require_once dirname(__DIR__) . "/repository/note.html.php";
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta content="text/javascript" charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/style.css?<?php echo time(); ?>">
    <title><?php echo $username ?></title>
</head>
<body>
    <nav id="profile_nav">    
        <a href="new" class="profile_nav_button">Crear nota</a>
        <a href="logout" class="profile_nav_button">Cerrar sesión</a>
    </nav>
    
    <div id="notes_container">
        <?php
            foreach($data['notes'] as $note){
                echo Note_Html::Render($note['note_id'], $note['title'], $note['description']);
            }
        ?>
    </div>
</body>
</html>