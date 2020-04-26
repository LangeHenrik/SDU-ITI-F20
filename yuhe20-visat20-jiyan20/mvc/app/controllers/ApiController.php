<?php

class ApiController extends Controller
{

	public function __construct()
	{
		header('Content-Type: application/json');
		//check api-key?
		//check username and password?
		//or die();
	}

	public function index($param)
	{
	}

	public function users()
	{
		if ($this->get()) {
			$users = $this->model('User')->getAll();
			echo json_encode($users, JSON_PRETTY_PRINT);
		}
	}

	public function pictures($user, $userid)
	{
		$user = filter_var(trim($user), FILTER_SANITIZE_STRING);
		if ($user == 'user') {
			if (is_numeric($userid) && $userid >= 0)
				if ($this->post()) {
					$this->postPicture($userid);
				} elseif ($this->get()) {
					$this->getPictures($userid);
				}
		}
	}

	private function postPicture($userid)
	{
		$image_id = $this->model('Image')->addPicture($userid);
		echo json_encode($image_id, JSON_PRETTY_PRINT);
	}

	private function getPictures($userid)
	{
		$user_pictures = $this->model('Image')->getAllImage($userid);
		echo json_encode($user_pictures, JSON_PRETTY_PRINT);
	}
}