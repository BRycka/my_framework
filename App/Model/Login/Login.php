<?php
/**
 * Created by PhpStorm.
 * User: Rycka
 * Date: 15.5.12
 * Time: 21.26
 */

class LoginModel extends Core_Model {
    private $tableName = 'users';

    public function validateUser($params) {
        $this->validateParams($params);
        $condArray = [
            'username' => $params['username'],
            'password' => $params['password']
        ];
        $result = $this->selectRow($this->tableName, [], $condArray);

        if ($result) {
            return $result;
        }

        return false;
    }

    public function updateUserOnLogin($id, $sKey) {
        $array = ['secret_key' => $sKey];
        $condArray = ['id' => $id];
        $result = $this->updateArray($this->tableName, $array, $condArray);

        return $result;
    }

    public function validateUserToken() {
        if (!isset($_COOKIE['sKey'])) {
            return false;
        }

        $condArray = ['secret_key' => $_COOKIE['sKey']];

        return $this->selectRow($this->tableName, [], $condArray);
    }

    private function validateParams($params) {
        // @TODO
        if (!isset($params['username']) || $params['username'] == '') {
            die('Login failed. Missing username');
        }

        if (!isset($params['password']) || $params['password'] == '') {
            die('Login failed. Missing password');
        }
    }
}
