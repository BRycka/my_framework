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
			if (!isset($params['location']) || !$params['location']) {
				var_dump('Location is required'); die;
			}

			if (!isset($params['customer_id']) || !$params['customer_id']) {
				var_dump('Customer is required'); die;
			}
		}
	}
}
