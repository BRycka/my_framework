<?php
/**
 * Created by PhpStorm.
 * User: Rycka
 * Date: 15.5.12
 * Time: 21.26
 */

class EventsModel extends CoreModelCrud {
	public $tableName = 'events';

	public function validateParams($params, $action) {
		if ($action == 'create') {
			if (!isset($params['name']) || !$params['name']) {
				var_dump('Name is required'); die;
			}

			if (!isset($params['lastname']) || !$params['lastname']) {
				var_dump('Lastname is required'); die;
			}
		}
	}
}
