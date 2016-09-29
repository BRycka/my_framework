<?php
/**
 * Created by PhpStorm.
 * User: Rycka
 * Date: 15.5.12
 * Time: 21.25
 */

class CoreModelCrud extends Mysql {
	public function create($params) {
		$this->validateParams($params, 'create');
		return true; // @TODO - return last insert id
	}

	public function getById($id) {
		$this->validateId($id);
		return true; // @TODO - return row
	}

	public function getList($params = [], $deleted = 0) {
		// @TODO - return list + count
		return $this->selectArray($this->tableName, $params, ['deleted' => $deleted]);
	}

	public function update($id, $params) {
		$this->validateId($id);
		$this->validateParams($params, 'create');
		return true; // @TODO - return true if everything is ok, false otherwise?
	}

	public function delete($id) {
		$this->validateId($id);
		return true; // @TODO - return boolean?
	}

	public function restore($id) {
		$this->validateId($id);
		return true; // @TODO - return boolean?
	}

	private function validateId($id) {
		// @TODO - valida id
	}
}
