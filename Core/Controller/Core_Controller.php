<?php
/**
 * Created by PhpStorm.
 * User: Rycka
 * Date: 15.5.12
 * Time: 21.25
 */

abstract class Core_Controller
{

    public function view($view, $params) {
        extract($params);
        require_once BASE_PATH . '/App/View/Layout/header.php';
        if (isset($_SESSION['sKey'])) {
            require_once BASE_PATH . '/App/View/Layout/logout.php';
        }
        require_once BASE_PATH . '/App/View/' . $view . '.php';
        require_once BASE_PATH . '/App/View/Layout/footer.php';
    }

    public function model($model) {
        if (file_exists(BASE_PATH . '/App/Model/' . $model . '.php')) {
            require_once BASE_PATH . '/App/Model/' . $model . '.php';

            $modelExploded = explode('/', $model);
            $modelExploded = array_reverse($modelExploded);
            $modelName = $modelExploded[0] . 'Model';

            return new $modelName;
        } else {
//            throw new Exception('Invalid model name');
            die('Invalid model name. #1');
//            throw new Exception_Parameters('test');
        }
    }
    public function getPostParams() {
        $postParams = [];

        foreach ($_POST as $key => $postParam) {
            $postParams[$key] = htmlspecialchars(trim($postParam));
        }

        return $postParams;
    }

    public function getPostParam($key) {
        if (isset($_POST[$key])) {
            return htmlspecialchars(trim($_POST[$key]));
        }

        return false;
    }

    public function resetPostParams() {
        unset($_POST);
    }

    public function resetPostParam($key) {
        if (isset($_POST[$key])) {
            unset($_POST[$key]);
        }
    }
}
