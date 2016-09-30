<?php
/**
 * Created by PhpStorm.
 * User: Rycka
 * Date: 15.5.12
 * Time: 21.26
 */

class Controller extends CoreControllerCrud {

    // method url: domain/Controller/index/urlParam
    public function indexAction() {
        $model = $this->model('Model');
        $model->setName('Ričardas');
        $model->setLastName('Baltulis');

        $params = array(
            'title' => 'Welcome',
            'data' => [
	            'name' => $model->getName(),
	            'lastName' => $model->getLastName()
            ]
        );
	    
        $this->view('welcome', $params);
    }
}
