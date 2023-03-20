<?php
    require_once dirname(__DIR__) ."/repository/validator.php";

    class NoteValidator extends Validator{
   
        public function validateTitle($title){
            if(empty($title)){
                $this->addError("title", "el título no puede estar vacío");
                return false;
            }
            if(strpos(substr($title, 0, 1), " ") !== false){
                $this->addError("title", "el título no puede comenzar con un espacio");
                return false;
            }
            if(!$this->validateMin($title, 1) || !$this->validateMax($title, 28)){
                $this->addError("title", "el título debe contener entre 1 y 28 caracteres");
                return false;
            }
            return true;
        }

        public function validateDescription($description){
            if(empty($description)){
                $this->addError("description", "la descripcion no puede estar vacia");
                return false;
            }
            return true;
        }
    }
?>