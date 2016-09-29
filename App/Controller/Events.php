<?php
/**
 * Created by PhpStorm.
 * User: Rycka
 * Date: 15.5.12
 * Time: 21.26
 */

class Events extends CoreControllerCrud {
	public $modelName = 'events';

	public function indexAction() {
		$list = $this->getList();

		$params = array(
			'title' => 'Events',
			'id' => 11,
			'data' => $list
		);
		$this->view('Events/events', $params);
	}

	public function createAction() {
		if ($this->getPostParam('createEvent')) {
			$this->resetPostParam('createEvent');
			$this->create();
			$this->redirectToIndex('Events');
		}
		$params = array(
			'title' => 'Create Event'
		);
		$this->view('Events/create', $params);
	}

	public function editAction($id = null) {
		if ($this->getPostParam('deleteEvent')) {
			$this->resetPostParams();
			$this->delete($id);
			$this->redirectToIndex('Events');
		}

		if ($this->getPostParam('updateEvent')) {
			$this->resetPostParam('updateEvent');
			$this->update($id);
			$this->redirectToIndex('Events');
		}

		$data = $this->getById($id);

		$params = array(
			'title' => 'Edit Event',
			'data' => $data,
		);
		$this->view('Events/edit', $params);
	}
}
