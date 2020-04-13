<?php

class ChatController extends Controller {
	
	public function __construct () {
		header('Content-Type: application/json');
		//check api-key?
		//check username and password?
		//or die();
	}

	// Load chat specific to picture
	public function index() {
		if ($this->post()) {
			echo "fail";
		}
	}
	
	public function getChat() {
		if ($this->post()) {
			$chatComments = $this->model('Chat')->getAll();
			echo json_encode($chatComments, JSON_PRETTY_PRINT);
		}
	}

	public function postChat() {
		if ($this->post()) {
			$isSuccess = $this->model('Chat')->post();
			echo $isSuccess;
		}
	}

	public function updateChat() {
		if ($this->post()) {
			$chatUpdate = $this->model('Chat')->update();
			echo json_encode($chatUpdate, JSON_PRETTY_PRINT);
		}
	}

	public function error401() {
		// TODO
	}


}