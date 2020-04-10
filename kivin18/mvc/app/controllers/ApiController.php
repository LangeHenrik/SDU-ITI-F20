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
		$users = $this->model('User')->getUserIdAndName();
		echo json_encode($users, JSON_PRETTY_PRINT);
	}

	public function pictures ($user, $id) {
	    $images = $this->model('Image')->getApiImages($id);
        echo json_encode($images, JSON_PRETTY_PRINT);
    }



}