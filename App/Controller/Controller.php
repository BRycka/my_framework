<?php
/**
 * Created by PhpStorm.
 * User: Rycka
 * Date: 15.5.12
 * Time: 21.26
 */

class Controller extends Core_Controller {

    // method url: domain/Controller/index/name
    public function indexAction($name = null) {
        $model = $this->model('Model');
        $model->setName('Ričardas');
        $model->setLastName('Baltulis');

        $params = array(
            'title' => 'Welcome',
            'name' => $model->getName(),
            'lastName' => $model->getLastName(),
            'urlParam' => $name,
        );
        $this->view('welcome', $params);
    }
}
