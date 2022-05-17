<?php
require ROOT_PATH . '/app/models/ModelTask.php';

class TaskController extends ApplicationController{

	public function indexAction(){
		$viewScript="header.phtml";
		$this->view->render($viewScript);

		$model = new ModelTask();
		$tasksList = $model->getJsondb();

		require ROOT_PATH . '/app/views/scripts/task/index.php';
	}

	public function createAction(){
		$viewScript="header.phtml";
		$this->view->render($viewScript);
	}

	public function newAction(){
		if ($_SERVER['REQUEST_METHOD'] == 'POST'){
			$model = new ModelTask();
			$model->addTask($_POST['nomtasca'],$_POST['nomusuari'],$_POST['estattasca'],$_POST['horainici'],$_POST['horafinal']);
		}
		header('Location: /phpInitialDemo/web/index');
	}
	
	public function updateAction(){
		$viewScript="header.phtml";
		$this->view->render($viewScript);
	}

	public function editAction(){
		if ($_SERVER['REQUEST_METHOD'] == 'POST'){
			$model = new ModelTask();
			$model->updateTask($_POST['nomtasca'],$_POST['nomusuari'],$_POST['estattasca'],$_POST['horainici'],$_POST['horafinal'],$_POST['id']);
		}
		header('Location: /phpInitialDemo/web/index');
	}
	
	public function deleteAction(){
		if ($_SERVER['REQUEST_METHOD'] == 'POST'){
			$model = new ModelTask();
			$model->deleteTask($_POST['id']);
		}
		header('Location: /phpInitialDemo/web/index');
	}
}