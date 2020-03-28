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
	//GET http://localhost:8080/enbes20-elpoy20-bapio20/mvc/public/api/users
	public function users () {
		$users = $this->model('User')->getAllApi();
		echo json_encode($users, JSON_PRETTY_PRINT);
	}

	public function pictures($user, $id)
	{
		$id = filter_var($id, FILTER_SANITIZE_STRING);
		if ($this->get()) {
			$this->getPictures($id);
		}
		if ($this->post()) {
			$this->postPictures($id);
		}
	}

	//GET http://localhost:8080/enbes20-elpoy20-bapio20/mvc/public/api/pictures/users/{id}
	public function getPictures($id){

		$pictures = $this->model('Feed')->getImageUserApi($id);
		echo json_encode($pictures, JSON_PRETTY_PRINT);

	}





}
