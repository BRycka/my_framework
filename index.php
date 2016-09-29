<?php
/**
 * Created by PhpStorm.
 * User: Rycka
 * Date: 15.5.12
 * Time: 21.10
 */

// @TODO - phpUnit tests
// @TODO - (query, delete, getById, update, create - methods) - CRUD
// @TODO - exceptions handle
// @TODO - session & cookies handle

// stores all config
require_once getcwd() . '/Help/config.php';

// Exceptions
require_once BASE_PATH . PARAMETERS_EXCEPTION;

// Core
require_once BASE_PATH . CORE_CONTROLLER;
require_once BASE_PATH . CORE_CONTROLLER_CRUD;
require_once BASE_PATH . CORE_MODEL_DATABASE_MYSQL;
require_once BASE_PATH . CORE_MODEL_CRUD;
require_once BASE_PATH . LOGIN_MODEL;
require_once BASE_PATH . CORE_FRONT_CONTROLLER;

new FrontController();
