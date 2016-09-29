<?php
/**
 * Created by PhpStorm.
 * User: Rycka
 * Date: 15.5.12
 * Time: 21.25
 */

class CoreControllerCrud extends CoreController {
	protected $modelName = '';
	protected $model;
	
	public function __construct() {
		if ($this->modelName) {
			$this->model = $this->model($this->modelName);
		}
	}

	public function create() {
		return $this->model->create($this->getPostParams());
	}

	public function getById($id) {
		return $this->model->getById($id);
	}

	public function getList() {
		return $this->model->getList();
	}

	public function update($id) {
		return $this->model->update($id, $this->getPostParams());
	}

	public function delete($id) {
		return $this->model->delete($id);
	}

	public function restore() {
		return $this->model->restore($this->getPostParam('id'));
	}
}
