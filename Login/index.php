<?php
/**
 * Created by PhpStorm.
 * User: Ricardas
 * Date: 18/08/16
 * Time: 09:59
 */

require_once '../Help/config.php';

require_once BASE_PATH . CORE_CONTROLLER;
require_once BASE_PATH . CORE_CONTROLLER_CRUD;
require_once BASE_PATH . CORE_MODEL_DATABASE_MYSQL;
require_once BASE_PATH . CORE_MODEL_CRUD;
require_once BASE_PATH . LOGIN_MODEL;
require_once BASE_PATH . CORE_LOGIN_FRONT_CONTROLLER;

new LoginFrontController();
