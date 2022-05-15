<?php
//conexión a la bbdd

class ModelTask extends Model{
    private $jsondb;
    private $tasksList;

    public function __construct(){
        $this->jsondb = json_decode(file_get_contents(ROOT_PATH . '/config/ddbb.json'),true);
        //json_decode : Almacena datos JSON en una variable PHP y luego decodifica en un objeto PHP
        //file_get_contents : Transmite un fichero completo a una cadena
    }

    //GETTER
    public function getJsondb(){
        return $this->jsondb;
    }

    //método para convertir la tarea que está en formato array a formato json
    //json_encode : Retorna la representación json del valor dado
    //JSON_PRETTY_PRINT : utiliza espacios en blanco para formatear los datos devuetos
    public function returnJson(){
        file_put_contents(ROOT_PATH . '/config/ddbb.json', json_encode($tasksList, JSON_PRETTY_PRINT));
    }

    //añadir tareal al json
    //Recoger info que llega del form a través del controller
    public function addTask($form){
        require ROOT_PATH . '/app/controllers/TaskController.php';
        $tasksList = $this->getJsondb(); //almaceno el contenido el json en formato array

        $tasksList[] = $form; //añado a la bbdd el array que llega del form
        $this->returnJson($tasksList); //paso la info en formato array a formato json
    }
}





?>