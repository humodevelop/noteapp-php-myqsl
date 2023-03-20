<?php
    //Clase que devuelve la estructura HTML de una Nota
    class Note_Html{
        static function Render($note_id, $title, $description){
            return
                "<div class='note_card'>
                    <div class='note_header'>
                        <div class='note_title'>{$title}</div>
                        <div class='note_menu'><img src='public/img/more-icon.svg'/ alt='opciones'>
                            <div class='note_menu_container'>
                                <form action='edit' method='post'>    
                                    <input type='hidden' name='title' value='{$title}'>
                                    <input type='hidden' name='description' value='{$description}'>
                                    <input type='hidden' name='note_id' value='{$note_id}'>
                                    <button type='submit' class='note_menu_button'>Editar</button>
                                </form>
                                <form method='post'>
                                    <input type='hidden' name='delete_note' value='{$note_id}'>
                                    <button type='submit' class='note_menu_button'>Eliminar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <pre class='note_description'>{$description}</pre>
                </div>";
        }
    }
?>
