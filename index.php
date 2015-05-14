<?php
/**
 * Created by PhpStorm.
 * User: Rycka
 * Date: 15.5.12
 * Time: 21.10
 */

// @TODO - phpUnit
// @TODO - core model database connection (query, delete, getById, update, create - methods) - CRUD
// @TODO - Autocomplete methods
// @TODO - error handle
define('BASE_PATH', getcwd());
define('BASE_URL', '/my_framework/app');

require_once BASE_PATH . '/Help/config.php';
require_once BASE_PATH . '/Core/Controller/Core_Controller.php';
require_once BASE_PATH . '/App/Controller/Controller.php';
require_once BASE_PATH . '/Core/Model/Core_Model.php';
require_once BASE_PATH . '/Core/FrontController.php';

$test = new FrontController();
