<?php
    require_once dirname(__DIR__) ."/config/DataBaseHandler.php";
    class Note extends DataBaseHandler{

        protected function getNotes($user_id){
            try{
                //Conectarse con la base de datos
                $conn = $this->connect();
                //Tipo de query
                $query = "SELECT note_id, title, description FROM notes WHERE user_id = ?";
                //Preparar la query
                $statement = $conn->prepare($query);
                //Establecer los parametros, "s" string "i" int "d" double   
                $statement->bind_param("s", $user_id);
                //Ejecutarlo
                $statement->execute();
                //Obtener resultado
                $result = $statement->get_result();
                //Inicializar el array
                $data = array();
                //Fetchear todas las tareas
                while ($row = $result->fetch_assoc()) {
                    //Formateo la información, escapando caracteres especiales
                    $temp = [
                        'note_id' => $row['note_id'],
                        'title' => htmlspecialchars($row['title']),
                        'description' => htmlspecialchars($row['description'])
                    ];
                    $data[] = $temp;
                    //Data directa del servidor
                    //$data[] = $row;
                }

                return $data;
            }catch(Throwable $th){
                throw $th;
            }
        }

        protected function createNote($user_id, $title, $description){          
            try{
                $conn = $this->connect();
                $query = "SELECT 1 FROM users WHERE user_id = ?";
                $statement = $conn->prepare($query);          
                $statement->bind_param("s", $user_id);
                $statement->execute();
                $result = $statement->get_result();
                if($result->num_rows == 0) 
                    throw new Exception("No hay coincidencias");

                $query = "INSERT INTO notes(user_id, title, description) VALUES(?, ?, ?)";
                $statement = $conn->prepare($query);          
                $statement->bind_param("sss", $user_id, $title, $description);
                return $statement->execute();
            }catch(Throwable $th){
                throw $th;
            }
        }

        protected function updateNote($user_id, $Note_id, $title, $description){          
            try{
                $conn = $this->connect();
                $query = "UPDATE notes SET title = ?, description = ? WHERE user_id = ? AND note_id = ?";
                $statement = $conn->prepare($query);          
                $statement->bind_param("ssss", $title, $description, $user_id, $Note_id);
                return $statement->execute();
            }catch(Throwable $th){
                throw $th;
            }
        }

        protected function deleteNote($user_id, $Note_id){
            try{
                $conn = $this->connect();
                //Tipo de query
                $query = "DELETE FROM notes WHERE user_id = ? AND note_id = ? LIMIT 1";
                //Preparar la query
                $statement = $conn->prepare($query);
                //Establecer los parametros, "s" = string  
                $statement->bind_param("ss", $user_id, $Note_id);
                //Ejecutarlo
                return $statement->execute();
            }catch(Throwable $th){
                throw $th;
            }
        }
    }
?>