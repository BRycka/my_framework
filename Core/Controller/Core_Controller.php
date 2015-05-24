<?php
/**
 * Created by PhpStorm.
 * User: Rycka
 * Date: 15.5.12
 * Time: 21.25
 */

abstract class Core_Controller {

    public function view($view, $params) {
        extract($params);
        require_once BASE_PATH . '/App/View/Layout/header.php';
        require_once BASE_PATH . '/App/View/' . strtolower($view) . '.php';
        require_once BASE_PATH . '/App/View/Layout/footer.php';
    }

    public function model($model) {
        if (file_exists(BASE_PATH . '/App/Model/' . $model . '.php')) {
            require_once BASE_PATH . '/App/Model/' . $model . '.php';
            return new $model;
        } else {
//            throw new Exception('Invalid model name');
            die('Invalid model name. #1');
//            throw new Exception_Parameters('test');
        }
    }

}
