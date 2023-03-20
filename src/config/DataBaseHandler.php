<?php
    class DataBaseHandler{
        private $host = "localhost";
        private $user = "root";
        private $password = "";
        private $database = "notesapp";

        protected function connect(){
            try {
                $conn = new mysqli($this->host, $this->user, $this->password, $this->database);
                return $conn;
            } catch (Throwable $th) {
                die("No se pudo conectar por: " .  $th->getMessage());
            }
        }
    }
