<?php
/**
 * Created by PhpStorm.
 * User: Rycka
 * Date: 15.5.12
 * Time: 21.26
 */

class Login extends Core_Controller {

	// method url: domain/Login.php
	public function loginAction() {
		$params = array(
			'title' => 'JV Login'
		);
		$this->view('Login/login', $params);
	}

	public function logoutAction() {
		echo "logout action";
	}
}
