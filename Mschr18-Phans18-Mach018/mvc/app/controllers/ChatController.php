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
			$this->model('Chat')->getAll();
		}
	}

	public function postChat() {
		if ($this->post()) {
			$this->model('Chat')->post();
		}
	}

	public function error401() {
		// TODO
	}


}