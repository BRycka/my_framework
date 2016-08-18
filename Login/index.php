<?php
/**
 * Created by PhpStorm.
 * User: Ricardas
 * Date: 18/08/16
 * Time: 09:59
 */

define('BASE_PATH', '/Applications/MAMP/htdocs/jv/my_framework'); // @TODO

require_once BASE_PATH . '/Core/Controller/Core_Controller.php';
require_once BASE_PATH . '/Core/Model/Core_Model.php';
require_once BASE_PATH . '/Core/LoginFrontController.php';

$test = new LoginFrontController();
