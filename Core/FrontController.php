<?php
/**
 * Created by PhpStorm.
 * User: Rycka
 * Date: 15.5.12
 * Time: 21.25
 */

class FrontController {

    protected $controller = 'Controller';
    protected $method = 'indexAction';
    protected $params = array();

    public function __construct() {
		$this->validateAuth();
    }

    protected function parseUrl() {
        if (isset($_GET['url'])) {
            return $url = explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
        }
    }

	protected function load($url) {
		if (file_exists(BASE_PATH . '/App/Controller/' . $url[0] . '.php')) {
			$this->controller = $url[0];
        }
        unset($url[0]);

        require_once BASE_PATH . '/App/Controller/' . $this->controller . '.php';
		$this->controller = new $this->controller;

		if (isset($url[1])) {
			if (method_exists($this->controller, $url[1] . 'Action')) {
				$this->method = $url[1] . 'Action';
			}
			unset($url[1]);
		}

		if ($url) {
			$this->params = array_values($url);
		}

		call_user_func_array(array($this->controller, $this->method), $this->params);
	}

	protected function validateAuth() {
		// @TODO

		if (1==1) { // not logged in
			header('Location: http://localhost/jv/my_framework/Login');
		}

		$url = $this->parseUrl();
		$this->load($url);

		return true;
	}
}