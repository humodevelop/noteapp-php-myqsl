<?php
    class Routes{
        static function Run($path){
            switch ($path) {
                case '/':
                    include "src/controllers/login.controller.php";
                    break;
                case 'login':
                    include "src/controllers/login.controller.php";
                    break;
                case 'register':
                    include "src/controllers/register.controller.php";
                    break;
                case 'profile':
                    include "src/controllers/userProfile.controller.php";
                    break;
                case 'logout':
                    include "src/controllers/logout.controller.php";
                    break;
                case 'new':
                    include "src/controllers/newNote.controller.php";
                    break;
                case 'edit':
                    include "src/controllers/editNote.controller.php";
                    break;
                default:
                    include "src/controllers/404.controller.php";
                    break;
            }
        }
    }
?>