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
		$model = new ModelTask();
		$tasksList = $model->getJsondb();
		var_dump($tasksList);
	}

	//Recoge la info que llega del form para poder enviarla al modelo, que será el que tenga acceso para añadir la nueva tarea a la bbdd
	public function newAction(){
		//$model = new ModelTask();
		//$tasksList = $model->getJsondb();
		//$model->addTask($_POST['nomtasca'],$_POST['nomusuari'],$_POST['estattasca'],$_POST['horainici'],$_POST['horafinal']);

		//if ($_SERVER['REQUEST_METHOD'] == 'POST'){ //Si se está recogiendo la info del form:
			$model = new ModelTask();
			$model->addTask($_POST['nomtasca'],$_POST['nomusuari'],$_POST['estattasca'],$_POST['horainici'],$_POST['horafinal']);
			
			//$tasksList->addTask($_POST); //llamo al método del modleo que insertará la nueva tarea a la bbdd
			header('Location: /phpInitialDemo/web/index');
		//}
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