<?php
/**
 * Created by PhpStorm.
 * User: Rycka
 * Date: 15.5.12
 * Time: 21.26
 */

class Login extends CoreControllerCrud {

	// method url: domain/Login.php
	public function loginAction($params) {
        $loginModel = $this->model('Login/Login');
        if ($userData = $loginModel->validateUser($params)) {
            $rand = rand(1000000000, 9999999999);
            $sKey = password_hash($userData['email'] . $rand . $userData['username'], PASSWORD_DEFAULT);
            $loginModel->updateUserOnLogin($userData['id'], $sKey);
            setcookie('sKey', $sKey, time()+60*60*24*6004, "/");
            header("Refresh:0");
        }

        $this->resetPostParams();
        $this->loginFormAction();
    }

	public function loginFormAction() {
        if ($this->getPostParam('username') && $this->getPostParam('password')) {
            $this->loginAction($this->getPostParams());
            return;
        }

        $params = array(
            'title' => 'JV Login'
        );
        $this->view('Login/login', $params);
    }
}
