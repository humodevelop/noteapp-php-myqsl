<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/style.css">
    <title>Crear nota</title>
</head>
<body>
    <div class="container">
        <h1>Crear nota</h1>
        <form action="" method="post" class="form">
            <label for="title">Título</label>
            <input type="text" name="title" id="title" value="<?= $title ?>">
            <label for="description">Descripción</label>
            <textarea name="description" id="description" cols="30" rows="10"><?= $description ?></textarea>
            <button type="submit" class="form_button">Crear nota</button>
            <div class="form_error_container">
                <?php 
                    foreach ($data['error'] as $value) {
                        echo "<p class='form_error'>*$value</p>";
                    }
                ?>
            </div>
            <a href="profile">Volver</a>
        </form>
    </div>
</body>
</html>