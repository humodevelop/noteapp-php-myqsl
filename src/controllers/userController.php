<?php
    require_once dirname(__DIR__) . "/models/User.php";
    require_once dirname(__DIR__) . "/repository/userValidator.php";

    class UserController extends User{
        public function registerUser($username, $email, $password, $confirmPassword){
            //Validación de input
            $validator = new UserValidator();
            $validator->validateUsername($username);
            $validator->validateEmail($email);
            $validator->validatePassword($password, $confirmPassword);

            //Si hay errores, arrojar excepcion
            if(count($validator->getErrors()) >0){
                //Arrojar el primer error
                $errors = $validator->getErrors();
                throw new Exception(reset($errors)); //reset() devuelve el primer elemento del array
            }
            //Intentar crear el usuario
            try{
                return parent::setUser($username, $email, $password);
            }catch(Throwable $th){
                throw new Exception("Surgió un error al intentar crear el usuario.");
            }
        }
        
        public function getUser($username, $password){
            //Validación de input
            $validator = new UserValidator();
            $validator->validateUsername($username);
            $validator->validatePassword($password, $password);

            //Si hay errores, arrojar excepcion
            if(count($validator->getErrors()) >0){
                //Arrojar el primer error
                $errors = $validator->getErrors();
                throw new Exception(reset($errors)); //reset() devuelve el primer elemento del array
            }
            try{
                $data = parent::getUser($username, $password);
                return $data;
            }catch(Throwable $th){
                throw $th;
                //throw new Exception("Error al iniciar sesión");
            }
        }

        public function deleteUser($username, $password){
            try{
                return parent::deleteUser($username, $password);
            }catch(Throwable $th){
                throw $th;
            }
        }
    }
?>