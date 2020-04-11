<?php

class ApiController extends Controller {

	public function __construct () {
		header('Content-Type: application/json');
		//check api-key?
		//check username and password?
		//or die();
	}

	public function index ($param) {

	}

	public function users () {
		if ($this->get()) {
			$users = $this->model('User')->apiGetUsers();
			echo json_encode($users, JSON_PRETTY_PRINT);
		}
	}

	public function pictures () {
		if ($this->post()) {
			$postRespons = $this->model('picture')->apiPostPicture();
			echo json_encode($postRespons , JSON_PRETTY_PRINT);
		} elseif ($this->get()) {
			$getRespons = $this->model('picture')->apiGetPicture();
			echo json_encode($getRespons , JSON_PRETTY_PRINT);
		}
	}

	public function error401() {
		// TODO
	}


}
