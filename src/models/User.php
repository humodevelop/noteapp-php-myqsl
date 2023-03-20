<?php
    require_once dirname(__DIR__) ."/config/DataBaseHandler.php";

    class User extends DataBaseHandler{

        public $username;
        public $user_id;
        public $email;

        protected function getUser($userName, $password){
            try{
                //Conectarse con la base de datos
                $conn = $this->connect();
                //Tipo de query
                $query = "SELECT user_id, username, password  FROM users WHERE username = ? LIMIT 1";
                //Preparar la query
                $statement = $conn->prepare($query);
                //Establecer los parametros, "s" string "i" int "d" double   
                $statement->bind_param("s", $userName);
                //Ejecutarlo
                $statement->execute();
                //Obtener resultado
                $result = $statement->get_result();
                if($result->num_rows == 0) 
                    throw new Exception("No hay coincidencias");

                //Obtener una fila
                $data = $result->fetch_assoc();
                //Verificar que coincida la contraseña con el hash
                if(!password_verify($password, $data['password']))
                    throw new Exception("Credenciales incorrectos");
                //Formatear la data a retornar para no enviar el hash
                $data = ['user_id'=> $data['user_id'], 'username' => $data['username']];
                return $data;
            }catch(Throwable $th){
                throw $th;
            }
        }

        protected function setUser($userName, $email, $password){          
            try{
                $conn = $this->connect();
                $query = "INSERT INTO users(username, email, password) VALUES(?, ?, ?)";
                $statement = $conn->prepare($query);          
                $password = password_hash($password, PASSWORD_DEFAULT);
                $statement->bind_param("sss", $userName, $email, $password);
                return $statement->execute();
            }catch(Throwable $th){
                throw $th;
            }
        }

        protected function deleteUser($userName, $password){
            try{
                $conn = $this->connect();
                //Tipo de query
                $query = "SELECT password FROM users WHERE username = ? LIMIT 1";
                //Preparar la query
                $statement = $conn->prepare($query);
                //Establecer los parametros, "s" = string  
                $statement->bind_param("s", $userName);
                //Ejecutarlo
                $statement->execute();
                //Obtener resultado
                $result = $statement->get_result();
                if($result->num_rows == 0) 
                    throw new Exception("No hay coincidencias");
                //Obtener una fila
                $data = $result->fetch_assoc();
                //Verificar que coincida la contraseña con el hash
                if(!password_verify($password, $data['password'])){
                    throw new Exception("Credenciales incorrectos");
                }   
                //Tipo de query
                $query = "DELETE FROM users WHERE username = ?";
                //Preparar la query
                $statement = $conn->prepare($query);
                //Establecer los parametros, "s" = string            
                $statement->bind_param("s", $userName);
                //Ejecutarlo
                return $statement->execute();
            }catch(Throwable $th){
                throw $th;
            }
        }
    }

