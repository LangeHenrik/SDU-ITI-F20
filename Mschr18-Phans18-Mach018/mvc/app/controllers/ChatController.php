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
		if ($this->isPost()) {
			echo "fail";
		}
		else {
			header('Location: ' . BASE_URL . 'home/index');
		}
	}
	
	public function getChat() {
		if ($this->isPost()) {
			$chatComments = $this->model('Chat')->getAll();
			echo json_encode($chatComments, JSON_PRETTY_PRINT);
		}
	}

	public function postChat() {
		if ($this->isPost()) {
			$isSuccess = $this->model('Chat')->post();
			echo $isSuccess;
		}
	}

	public function updateChat() {
		if ($this->isPost()) {
			$chatUpdate = $this->model('Chat')->update();
			echo json_encode($chatUpdate, JSON_PRETTY_PRINT);
		}
	}

}