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
		if ($_SERVER['REQUEST_METHOD'] == 'POST'){ //Si se está recogiendo la info del form:
			$model = new ModelTask();
			$model->addTask($_POST['nomtasca'],$_POST['nomusuari'],$_POST['estattasca'],$_POST['horainici'],$_POST['horafinal']);
		}
		header('Location: /phpInitialDemo/web/index');
	}
	


    //Controlador vista actualizar tarea
	public function updateAction(){
		$viewScript="header.phtml";
		$this->view->render($viewScript);
	}

}