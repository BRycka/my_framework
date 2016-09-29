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

		$this->insertArray($this->tableName, $params);
		$id = $this->insertId();

		return $id;
	}

	public function getById($id) {
		$this->validateId($id);

		$params = [
			'id' => $id
		];

		return $this->selectRow($this->tableName, [], $params);
	}

	public function getList($params = [], $deleted = 0) {
		$list = $this->selectArray($this->tableName, $params, ['deleted' => $deleted]);
		$listCount = count($list);

		return ['list' => $list, 'listCount' => $listCount];
	}

	public function update($id, $params) {
		$this->validateId($id);
		$this->validateParams($params, 'update');

		$this->updateArray($this->tableName, $params, ['id' => $id]);

		return true;
	}

	public function delete($id) {
		$this->validateId($id);
		$this->updateArray($this->tableName, ['deleted' => 1], ['id' => $id]);

		return true;
	}

	public function restore($id) {
		$this->validateId($id);
		$this->updateArray($this->tableName, ['deleted' => 0], ['id' => $id]);

		return true;
	}

	private function validateId($id) {
		// @TODO - handle exception
		if (!ctype_digit($id)) {
			var_dump('Invalid ID'); die;
		}
	}
}
