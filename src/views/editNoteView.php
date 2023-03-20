<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/style.css">
    <title>Editar nota</title>
</head>
<body>
    <div class="container">
        <h1>Editar nota</h1>
        <form method="post" class="form" >
            <input type='hidden' name='note_id' value='<?= $note_id ?>'>
            <label for="title">Título</label>
            <input type="text" name="title" id="title" value="<?= $title ?>">
            <label for="description">Descripción</label>
            <textarea name="description" id="description" cols="30" rows="10"><?= $description ?></textarea>
            <input type="submit" name="submit" class="form_button" value="Editar nota">
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