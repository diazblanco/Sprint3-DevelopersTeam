<?php 
class TaskController extends ApplicationController{
	//Controlador vista principal / index
	public function indexAction(){
		require ROOT_PATH . '/app/models/ModelTask.php';
		$viewScript="header.phtml";
		$this->view->render($viewScript);

		$model = new ModelTask();
		$tasksList = $model->getJsondb();

		require ROOT_PATH . '/app/views/scripts/task/index.php';
	}

    //Controlador vista crear tarea
	//Recoge la info que llega del form para poder enviarla al modelo, que será el que tenga acceso para añadir la nueva tarea a la bbdd
	public function createAction(){
		$viewScript="header.phtml";
		$this->view->render($viewScript);

		require ROOT_PATH . '/app/models/ModelTask.php';
		$model = new ModelTask();

		$form = [ // preparo array estructura de la tarea. Asigno las claves y dejo los valores sin rellenar para almacenar luego lo que llega del form por post
			'nomtasca' => '',
			'nomusuari' => '',
			'estattasca' => '',
			'horainici' => '',
			'horafinal' => '',
			'id' => '',
		];

		if ($_SERVER['REQUEST_METHOD'] == 'POST'){ //Evalúo si llega ingo del form via POST // método public function isPost() de lib/base/request.php
			$form = array_merge($form,$_POST); //relleno lso valores del array, pasándole como valor lo recogigo en POST
			//$form = $model->addTask($_POST); //llamo al método del modleo que insertará la nueva rarea a la bbdd
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