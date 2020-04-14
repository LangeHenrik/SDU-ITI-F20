<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/jacso18/mvc/app/services/UtilityFunctions.php';

class ApiController extends Controller
{
	private $utility;
	public function __construct()
	{
		header('Content-Type: application/json');
		if (session_status() == PHP_SESSION_NONE) {
			session_start();
		}
		$this->utility = new UtilityFunctions();
		//check api-key?
		//check username and password?
		//or die();
	}

	public function index($param)
	{
	}

	public function users()
	{
		$users = $this->model('User')->getAll();
		echo json_encode($users, JSON_PRETTY_PRINT);
	}

	public function pictures($identifier, $id)
	{
		if (strcasecmp($identifier, 'user') == 0) {
			if ($this->post()) {
				$json = $_POST['json'];
				$this->model('Post')->postJson($id,$json);
				} else if ($this->get()) {
				$this->model('Post')->getPostJson($id);
			}
		} else {
			echo 'Page does not exist';
			// Redirect til fælles ikke eksisterende side
		}
	}
}
