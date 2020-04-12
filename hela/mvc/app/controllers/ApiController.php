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

	public function search($query) {

		$queryWords = explode('+', $query);

		$properString = '';

		foreach ($queryWords as $word) {
			$properString .= ' ' . $word;
		}

		$properString = trim($properString);
		echo 'You searched for query: "' . $properString . '"';


	}




}