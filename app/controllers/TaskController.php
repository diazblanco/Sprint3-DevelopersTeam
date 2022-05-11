<?php 
class TaskController extends ApplicationController{
	//Controlador vista principal / index
	public function indexAction(){
		$viewScript="header.phtml";
		
		$this->view->message = "hello from task::index";
		$this->view->render($viewScript);
		//var_dump(WEB_ROOT);
	}

    //Controlador vista crear tarea
	public function createAction(){
		$viewScript="header.phtml";

		$this->view->message = "hello from task::create";
		$this->view->render($viewScript);
		//var_dump(WEB_ROOT);
	}

    //Controlador vista actualizar tarea
	public function updateAction(){
		$viewScript="header.phtml";

		$this->view->message = "hello from task::update";
		$this->view->render($viewScript);
		//var_dump(WEB_ROOT);
	}

}