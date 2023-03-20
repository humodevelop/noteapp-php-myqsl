<?php
    abstract class Validator{
        protected $errors = [];
        function __construct(){}

        protected function validateSpecialChars($string){
            if (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $string)){
                //Encontro un caracter especial
                return false;
            }
            return true;
        }

        protected function validateMin($string, $min){
            if(strlen(strval($string)) < $min){
                return false;
            }
            return true;
        }

        protected function validateMax($string, $max){
            if(strlen(strval($string)) > $max){
                return false;
            }
            return true;
        }
        
        protected function validateMinNumber($number, $min){
            if($number < $min) return false;
        }

        protected function validateMaxNumber($number, $max){
            if($number > $max) return false;
        }

        protected function addError($key, $value){
            $this->errors[$key] = $value;
        }

        public function getErrors(){
            return $this->errors;
        }
    }
?>