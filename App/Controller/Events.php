<?php
/**
 * Created by PhpStorm.
 * User: Rycka
 * Date: 15.5.12
 * Time: 21.26
 */

class Events extends CoreControllerCrud {
	public $modelName = 'events';

	public function indexAction($urlParam = null) {
		$list = $this->getList();

		$params = array(
			'title' => 'Events',
			'id' => 11,
			'urlParam' => $urlParam,
			'data' => $list
		);
		$this->view('Events/events', $params);
	}

	public function createAction($urlParam = null) {
		$params = array(
			'title' => 'Create Event',
			'urlParam' => $urlParam,
		);
		$this->view('Events/create', $params);
	}

	public function editAction($urlParam = []) {
		$params = array(
			'title' => 'Edit Event',
			'urlParam' => $urlParam,
		);
		$this->view('Events/edit', $params);
	}
}
