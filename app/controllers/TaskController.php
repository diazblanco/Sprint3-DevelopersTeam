<?php
require ROOT_PATH . '/app/models/ModelTask.php';

class TaskController extends ApplicationController{
	//Controlador vista principal / index
	public function indexAction(){
		$viewScript="header.phtml";
		$this->view->render($viewScript);

		$model = new ModelTask();
		$tasksList = $model->getJsondb();

		require ROOT_PATH . '/app/views/scripts/task/index.php';
	}

    //Controlador vista crear tarea
	public function createAction(){
		$viewScript="header.phtml";
		$this->view->render($viewScript);
		/* $model = new ModelTask();
		$tasksList = $model->getJsondb();
		var_dump($tasksList); */
	}

	//Recoge la info que llega del form para poder enviarla al modelo, que será el que tenga acceso para añadir la nueva tarea a la bbdd
	public function newAction(){
		$model = new ModelTask();
		$tasksList = $model->getJsondb();

		if ($_SERVER['REQUEST_METHOD'] == 'POST'){ //Si se está recogiendo la info del form:
			$form = [
				'nomtasca' => $_POST['nomtasca'],
				'nomusuari' => $_POST['nomusuari'],
				'estattasca' => $_POST['estattasca'],
				'horainici' => $_POST['horainici'],
				'horafinal' => $_POST['horafinal'],
				'id' => '',
			];

			//Por temas de usabilidad, el id no se lo puedo pedir al usuario, debe introducirlo la máquina de forma automática:
			//1)Acceder a la última tarea (array) almacenada en la bbdd y luego acceder a la última clave/valor de esa tarea.
			//2)cojo el valor de la última llave de la tarea y incremento en uno
			//3)Le asigno ese valor ya incrementado a la clave 'id' del array que genero con lo que llega del form. Así simulo un autoincrement del MySQL
			//si la bbdd está vacía, le asigno al id el valor 1

			if(isset($tasksList)){ //Si hay datos en la bbdd
				$lastTask = end($tasksList); //end() avanza el puntero interno dl array hasta su último elemtno y devuelve su valor
				$lastValueOfTask = $lastTask['id']; //accedo el valor de la última clave del array
				$form['id'] = $lastValueOfTask++; //asigno a la calve 'id' del array que me llega del form, el valor incrementado en uno que tenía la última id de las tareas ya creadas en la bbdd
			} else { //si no hay datos en la bbdd, la tarea que cree tendrá id 1
				$form['id'] = 1; 
			}
			
			$tasksList->addTask($form); //llamo al método del modleo que insertará la nueva tarea a la bbdd
			header('Location: /phpInitialDemo/web/index');
		}
	}
	


    //Controlador vista actualizar tarea
	public function updateAction(){
		$viewScript="header.phtml";
		$this->view->render($viewScript);
	}

}

//var_dump(WEB_ROOT);
//echo "WEB_ROOT= " . WEB_ROOT ."<br>"; //WEB_ROOT= /phpInitialDemo/web
//echo "ROOT_PATH= " . ROOT_PATH ."<br>"; //ROOT_PATH= /Applications/MAMP/htdocs/phpInitialDemo
//echo "CMS_PATH= " . CMS_PATH ."<br>"; //CMS_PATH= /Applications/MAMP/htdocs/phpInitialDemo/lib/base/