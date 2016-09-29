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

	public function getById() {
		return $this->model->getById($this->getPostParam('id'));
	}

	public function getList() {
		return $this->model->getList();
	}

	public function update() {
		return $this->model->update($this->getPostParam('id'), $this->getPostParams());
	}

	public function delete() {
		return $this->model->delete($this->getPostParam('id'));
	}

	public function restore() {
		return $this->model->restore($this->getPostParam('id'));
	}
}
