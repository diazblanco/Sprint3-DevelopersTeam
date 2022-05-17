<?php
class ModelTask extends Model{
    private $jsondb;
    public function __construct(){
        $this->jsondb = json_decode(file_get_contents(ROOT_PATH . '/config/ddbb.json'),true);
    }
    public function getJsondb(){
        return $this->jsondb;
    }
    public function addTask($tasca, $usuari, $estat, $inici, $final){
        $tasksList = $this->getJsondb();
			$form = [
				'nomtasca' => $tasca,'nomusuari' => $usuari,'estattasca' => $estat,'horainici' => $inici,'horafinal' => $final,'id' => '',
			];
			if(isset($tasksList)){
				$lastTask = end($tasksList); 
				$lastValueOfTask = $lastTask['id'];
				$form['id'] = ++$lastValueOfTask;
			} else {
				$form['id'] = 1; 
			}
        $tasksList[] = $form;
        file_put_contents(ROOT_PATH . '/config/ddbb.json', json_encode($tasksList, JSON_PRETTY_PRINT));
    }

    public function updateTask($tasca, $usuari, $estat, $inici, $final, $id){
        $tasksList = $this->getJsondb();
        foreach ($tasksList as $key => $value) { 
            if ($value['id'] == $id) { 
                if(isset($tasca)){ 
                    $tasksList[$key]['nomtasca'] = $tasca; 
                } 
                if(isset($usuari)){ 
                    $tasksList[$key]['nomusuari'] = $usuari; 
                } 
                if(isset($estat)){ 
                    $tasksList[$key]['estattasca'] = $estat; 
                } 
                if(isset($inici)){ 
                    $tasksList[$key]['horainici'] = $inici; 
                } 
                if(isset($final)){ 
                    $tasksList[$key]['horafinal'] = $final; 
                } 
                if(isset($id)){ 
                    $tasksList[$key]['id'] = $id; 
                } 
            } 
        } 
        file_put_contents(ROOT_PATH . '/config/ddbb.json', json_encode($tasksList, JSON_PRETTY_PRINT));
    }

    public function deleteTask($id){
        $tasksList = $this->getJsondb();    
        foreach ($tasksList as $key => $value) { 
            if ($value['id'] == $id) { 
                unset($tasksList[$key]);
            } 
        } 
        file_put_contents(ROOT_PATH . '/config/ddbb.json', json_encode($tasksList, JSON_PRETTY_PRINT));
    }
}
?>
