<?php 
class TaskController extends ApplicationController{
	//Controlador vista principal / index
	public function indexAction(){
		//require ROOT_PATH . '/app/models/ModelTask.php';
		$viewScript="header.phtml";
		$this->view->render($viewScript);

		$model = new ModelTask();
		$tasksList = $model->getJsondb();

		require ROOT_PATH . '/app/views/scripts/task/index.phtml';
	}

    //Controlador vista crear tarea
	public function createAction(){
		$viewScript="header.phtml";
		$this->view->render($viewScript);
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