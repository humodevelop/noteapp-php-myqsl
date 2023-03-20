<?php
    require_once "routes.php";
    class Router{
        static function Run(){
            //Directorio donde está el index.
            $folderPath = dirname($_SERVER['SCRIPT_NAME']);
            //Obtener la URI y quitarle la cantidad de caracteres del directorio donde estoy.
            $url = substr($_SERVER['REQUEST_URI'], strlen($folderPath));
            //Divido el url en partes por el separador: "/".
            $parameters = explode("/", $url);
            //Filtro el array por strings vacios
            $parameters = array_filter($parameters);
            //Re indexo los valores para que el array empiece en [0] y no retenga las keys originales
            $parameters = array_values($parameters);
            //Chequeo que exista un valor después de la URL principal, si no es así lo establezco como "/" que indica la dirección RAÍZ.
            $parameters[0] = strtolower($parameters[0] ?? "/");
            
            //Ejecutar las rutas.
            Routes::Run($parameters[0]);
        }
    }
?>