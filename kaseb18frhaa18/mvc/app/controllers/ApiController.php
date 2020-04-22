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
		$users = $this->model('User')->getAll();
		echo json_encode($users, JSON_PRETTY_PRINT);
	}

	public function pictures($user, $user_id)
	{
		if (is_numeric($user_id) && $user_id >= 0)
			if ($this->post()) {
				$this->postPicture($user_id);
			} elseif ($this->get()) {
				$this->getPictures($user_id);
			}
	}

	private function postPicture($user_id)
	{
		$image_id = $this->model('Picture')->addPicture($user_id);
		echo json_encode($image_id, JSON_PRETTY_PRINT);
	}

	private function getPictures($user_id)
	{
		$user_pictures = $this->model('Picture')->getAllUserPictures($user_id);
		echo json_encode($user_pictures, JSON_PRETTY_PRINT);
	}
}