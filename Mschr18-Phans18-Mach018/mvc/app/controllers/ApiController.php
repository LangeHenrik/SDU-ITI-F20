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
		if ($this->isGet()) {
			$users = $this->model('User')->apiGetUsers();
			echo json_encode($users, JSON_PRETTY_PRINT);
		}
	}

	public function pictures () {
		if ($this->isPost()) {
			$postRespons = $this->model('picture')->apiPostPicture();
			echo json_encode($postRespons , JSON_PRETTY_PRINT);
		} elseif ($this->isGet()) {
			$getRespons = $this->model('picture')->apiGetPicture();
			echo json_encode($getRespons , JSON_PRETTY_PRINT);
		}
	}

	public function error401() {
		// TODO
	}


}
