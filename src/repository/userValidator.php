<?php
    require_once dirname(__DIR__) ."/repository/validator.php";

    class UserValidator extends Validator{

        public function validateUsername($username){
            if(empty($username)){
                $this->addError("username", "el usuario no puede estar vacío");
                return false;
            }
            if(strpos(substr($username, 0, 1), " ") !== false){
                $this->addError("username", "el usuario no puede comenzar con un espacio");
                return false;
            }
            if(!$this->validateMin($username, 5) || !$this->validateMax($username, 12)){
                $this->addError("username", "el usuario debe contener entre 5 y 12 caracteres");
                return false;
            }
            return true;
        }

        public function validateEmail($email){
            if(empty($email)){
                $this->addError("email", "el email no puede estar vacío");
                return false;
            }
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $this->addError("email", "email invalido");
                return false;
            } 
            return true;
        }

        public function validatePassword($password, $confirmPassword){
            if(empty($password)){
                $this->addError("password", "la contraseña no puede estar vacia");
                return false;
            }
            if(strcmp($password, $confirmPassword) != 0){
                $this->addError("password", "las contraseñas no coinciden");
                return false;
            }
            if(!$this->validateMin($password, 8) || !$this->validateMax($password, 20)){
                $this->addError("password", "la contraseña debe contener entre 8 y 20 caracteres");
                return false;
            }
            return true;
        }
    }
?>