<?php
class ModelTask extends Model{
    private $jsondb;
    //private $tasksList;
    public function __construct(){
        $this->jsondb = json_decode(file_get_contents(ROOT_PATH . '/config/ddbb.json'),true);
        //json_decode : Almacena datos JSON en una variable PHP y luego decodifica en un objeto PHP //file_get_contents : Transmite un fichero completo a una cadena
    }
    public function getJsondb(){
        return $this->jsondb;
    }

    /* //método para convertir la tarea que está en formato array a formato json. Statisc?
     public function returnJson(){
        file_put_contents(ROOT_PATH . '/config/ddbb.json', json_encode($tasksList, JSON_PRETTY_PRINT));
        //json_encode : Retorna la representación json del valor dado //JSON_PRETTY_PRINT : utiliza espacios en blanco para formatear los datos devuetos
    } */

    //añadir tareal al json
    
    //Recoger info que llega del form a través del controller i guradarla en el json
    public function addTask($tasca, $usuari, $estat, $inici, $final){
        $tasksList = $this->getJsondb(); //almaceno el contenido el json en formato array
			$form = [
				'nomtasca' => $tasca,
				'nomusuari' => $usuari,
				'estattasca' => $estat,
				'horainici' => $inici,
				'horafinal' => $final,
				'id' => '',
			];
			//Por usabilidad, id autoincrementable: incrementar en 1 el id de la última tarea de la bbdd y asignárselo al id de la tarea que se está creando. Si bbdd vacía, asigmanos valor 1
			if(isset($tasksList)){ //Si hay datos en la bbdd
				$lastTask = end($tasksList); //end() avanza el puntero interno dl array hasta su último elemtno y devuelve su valor
				$lastValueOfTask = $lastTask['id']; //accedo el valor de la última clave del array
				$form['id'] = ++$lastValueOfTask; //asigno a la calve 'id' del array que me llega del form, el valor incrementado en uno que tenía la última id de las tareas ya creadas en la bbdd
			} else { //si no hay datos en la bbdd, la tarea que cree tendrá id 1
				$form['id'] = 1; 
			}
        $tasksList[] = $form; //añado a la bbdd el array que llega del form
        file_put_contents(ROOT_PATH . '/config/ddbb.json', json_encode($tasksList, JSON_PRETTY_PRINT));
    }




    public function updateTask($id){

    }
}





?>