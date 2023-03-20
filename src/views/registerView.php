<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/style.css">
    <title>Registro</title>
</head>
<body>
    <div class="container">
        <h1>Registro</h1>
        <form action="<?php $_SERVER['PHP_SELF']?>" method="post" class="form">
            <div>
                <label for="username" class="form_input_title">Usuario</label>
                <input type="text" name="username" id="username" class="form_input" value="<?= $username?>">
            </div>      
            <div>
                <label for="email" class="form_input_title">Email</label>
                <input type="text" name="email" id="email" class="form_input" value="<?= $email?>">
            </div>
            <div>
                <label for="password" class="form_input_title">Contraseña</label>
                <input type="password" name="password" id="password" class="form_input" value="<?= $password?>">
            </div>
            <div>
                <label for="confirmPassword" class="form_input_title">Confirmar contraseña</label>
                <input type="password" name="confirmPassword" id="confirmPassword" class="form_input">
            </div>
            <input type="submit" value="Registrarse" name="register" class="form_button">
            <div class="form_error_container">
                <?php 
                    foreach ($data['error'] as $value) {
                        echo "<p class='form_error'>*$value</p>";
                    }
                ?>
            </div>
            <a href="login">¿Ya tenés una cuenta?</a>
        </form>
    </div>
</body>
</html>