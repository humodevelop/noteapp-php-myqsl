<?php
    require_once dirname(__DIR__) . "/models/Note.php";
    require_once dirname(__DIR__) . "/repository/noteValidator.php";

    class NoteController extends Note{
        public function createNote($user_id, $title, $description){
            $validator = new NoteValidator();
            $validator->validateTitle($title);
            $validator->validateDescription($description);

            //Si hay errores, arrojar excepcion
            if(count($validator->getErrors()) >0){
                //Arrojar el primer error
                $errors = $validator->getErrors();
                throw new Exception(reset($errors)); //reset() devuelve el primer elemento del array
            }
            //Intentar crear la nota
            try{
                return parent::createNote($user_id, $title, $description);
            }catch(Throwable $th){
                throw $th;
            }
        }
        
        public function getNotes($user_id){
            try{
                $data = parent::getNotes($user_id);
                return $data;
            }catch(Throwable $th){
                throw $th;
            }
        }

        public function deleteNote($user_id, $task_id){
            try{
                return parent::deleteNote($user_id, $task_id);
            }catch(Throwable $th){
                throw $th;
            }
        }

        public function updateNote($user_id, $task_id, $title, $description){
            $validator = new NoteValidator();
            $validator->validateTitle($title);
            $validator->validateDescription($description);

            //Si hay errores, arrojar excepcion
            if(count($validator->getErrors()) >0){
                //Arrojar el primer error
                $errors = $validator->getErrors();
                throw new Exception(reset($errors)); //reset() devuelve el primer elemento del array
            }
            //Intentar actualizar la nota
            try{
                return parent::updateNote($user_id, $task_id, $title, $description);
            }catch(Throwable $th){
                throw $th;
            }
        }
    }
?>