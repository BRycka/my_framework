<?php
/**
 * Created by PhpStorm.
 * User: Rycka
 * Date: 15.5.12
 * Time: 21.26
 */

class Events extends Core_Controller {
	public function indexAction($urlParam = null) {
		$params = array(
			'title' => 'Events',
			'id' => 11,
			'urlParam' => $urlParam,
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
		var_dump($urlParam);
		$params = array(
			'title' => 'Edit Event',
			'urlParam' => $urlParam,
		);
		$this->view('Events/edit', $params);
	}
}
