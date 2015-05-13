<?php
/**
 * Created by PhpStorm.
 * User: Rycka
 * Date: 15.5.12
 * Time: 21.10
 */

// @TODO - css + js įtraukimai
// @TODO - phpUnit
// @TODO - modeliai https://www.youtube.com/watch?v=FWLXYPIxbYI
// @TODO - core model database connection (query, delete, getById, update, create - methods)
// @TODO - CRUD
// @TODO - Autocomplete methods
// @TODO - error handle
define('BASE_PATH', getcwd());

require_once BASE_PATH . '/Core/Controller/Core_Controller.php';
require_once BASE_PATH . '/App/Controller/Controller.php';
require_once BASE_PATH . '/Core/Model/Core_Model.php';
require_once BASE_PATH . '/Core/FrontController.php';

$test = new FrontController();
