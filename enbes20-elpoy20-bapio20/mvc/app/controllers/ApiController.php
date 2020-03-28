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
		$users = $this->model('User')->getAllApi();
		echo json_encode($users, JSON_PRETTY_PRINT);
	}
	public function images () {
		$users = $this->model('User')->getImageUserApi();
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

	public function getPictures($id){

		$pictures = $this->model('Feed')->getImageUserApi($id);
		echo json_encode($pictures, JSON_PRETTY_PRINT);

		// $user_response_decode = json_decode($id);
		// $user_id = $user_response_decode[0]->id;
		// if ($user_id == '')
		// 		echo '--> not found
		// ';
		// 	return $user_id;
	}




}
