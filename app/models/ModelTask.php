<?php
//conexión a la bbdd

class ModelTask extends Model{
    private $jsondb;

    public function __construct(){
        $this->jsondb = json_decode(file_get_contents(ROOT_PATH . '/config/ddbb.json'),true);
        //json_decode : Almacena datos JSON en una variable PHP y luego decodifica en un objeto PHP
        //file_get_contents : Transmite un fichero completo a una cadena
    }

    //GETTER
    public function getJsondb(){
        return $this->jsondb;
    }
}





?>