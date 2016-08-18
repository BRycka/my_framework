<?php
/**
 * Created by PhpStorm.
 * User: Rycka
 * Date: 15.5.12
 * Time: 21.25
 */

class LoginFrontController {

	protected $controller = 'Login';
	protected $method = 'loginAction';
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
		file_put_contents('debugUrl.txt', print_r($url, true) . PHP_EOL, FILE_APPEND);
		if (file_exists(BASE_PATH . '/App/Controller/Login/' . $url[0] . '.php')) {
			$this->controller = $url[0];
		}
		unset($url[0]);

		require_once BASE_PATH . '/App/Controller/Login/' . $this->controller . '.php';
		$this->controller = new $this->controller;

		if (isset($url[1])) {
			if (method_exists($this->controller, $url[1] . 'Action')) {
				$this->method = $url[1] . 'Action';
			}
			unset($url[1]);
		}

		call_user_func_array(array($this->controller, $this->method), []);
	}

	protected function validateAuth() {
		// @TODO

		if (1==0) { // not logged in
			header('Location: http://localhost/jv/my_framework/');
		}

		$url = $this->parseUrl();
		$this->load($url);

		return true;
	}
}