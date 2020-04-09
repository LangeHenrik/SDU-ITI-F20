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

		$users = $this->model('User')->getAll();
		echo json_encode($users, JSON_PRETTY_PRINT);
	}

	public function pictures($param1, $param2){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){

        }
        if($_SERVER['REQUEST_METHOD'] == 'GET'){
            $pictures = $this->model('Picture')->getPictureForUser($param2);
            echo json_encode($pictures, JSON_PRETTY_PRINT);
        }
    }


}