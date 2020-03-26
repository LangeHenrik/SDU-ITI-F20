<?php

class ApiController extends Controller
{

	public function __construct()
	{
		header('Content-Type: application/json');
		if (session_status() == PHP_SESSION_NONE ) {
			session_start();
		}
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
				if(isset($_POST['json'])){
					$json = $_POST['json'];
					json_decode($json);
					// Send til databasen
				}
			} else if ($this->get()) {
				$postinfo = $this->model('Post')->getAllPostsByUserID($id);
				echo json_encode($postinfo, JSON_PRETTY_PRINT);
			}
		} else {
			echo 'Page does not exist';
			// Redirect til fælles ikke eksisterende side
		}
	}
}
