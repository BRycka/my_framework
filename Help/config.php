<?php
/**
 * Created by PhpStorm.
 * User: Rycka
 * Date: 15.5.12
 * Time: 21.26
 */

define('DB_HOST', '');
define('DB_USER', '');
define('DB_PASSWORD', '');
define('DB_NAME', '');

define('BASE_PATH', $_SERVER['DOCUMENT_ROOT']);
define('BASE_URL', $_SERVER['SERVER_NAME']);

// Exceptions
define('PARAMETERS_EXCEPTION', '/Core/Exceptions/Parameters.php');

// Core
define('CORE_CONTROLLER', '/Core/Controller/Core_Controller.php');
define('CORE_MODEL', '/Core/Model/Core_Model.php');
define('CORE_FRONT_CONTROLLER', '/Core/FrontController.php');
define('CORE_LOGIN_FRONT_CONTROLLER', '/Core/LoginFrontController.php');

// Login
define('LOGIN_MODEL', '/App/Model/Login/Login.php');
