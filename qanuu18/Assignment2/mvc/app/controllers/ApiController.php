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


	public function pushusertoDB(){

		$postUsers = $this->model('postUser')->postUser();
		echo json_encode($postUsers, JSON_PRETTY_PRINT);



	}

	public function getimages(){
		$images = $this->model('getImage')->getAllImages();
		echo json_encode($images, JSON_PRETTY_PRINT);

	}
  
	public function postImages(){


		$postimages = $this->model('postImages')->postImages();
		echo json_encode($images, JSON_PRETTY_PRINT);
	}
	

}
