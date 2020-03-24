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
	// GET localhost:8080/aldus17/mvc/public/api/users
	public function users()
	{
		$users = $this->model('User')->getAllUsers();
		if ($this->get()) {
			$usersObject = array();
			foreach ($users as $user) {
				$jsonAttributeName['user_id'] = $user['userID'];
				$jsonAttributeName['username'] = $user['username'];
				$usersObject[] = $jsonAttributeName;
			}
			echo json_encode($usersObject, JSON_PRETTY_PRINT);
		}
	}

	// GET localhost:8080/aldus17/mvc/public/api/pictures/user/2
	// POST localhost:8080/aldus17/mvc/public/api/pictures/user/2
	public function pictures($user, $user_id)
	{
		$user_id = filter_var($user_id, FILTER_SANITIZE_STRING);
		if ($this->get()) {
			$this->getPictures($user_id);
		}
		if ($this->post()) {
			$this->postPictures($user_id);
		}
	}
	private function postPictures($user_id)
	{
		$imageData = json_decode($_POST['json']);
		$title = filter_var($imageData->title, FILTER_SANITIZE_STRING);
		$description = filter_var($imageData->description, FILTER_SANITIZE_STRING);
		$image = filter_var($imageData->image, FILTER_SANITIZE_STRING);
		$username = filter_Var($imageData->username, FILTER_SANITIZE_STRING);
		$password = filter_Var($imageData->password, FILTER_SANITIZE_STRING);

		$user = $this->model('User')->getUserByID($user_id);
		$imageObject = array();

		if ($username == $user['username'] && password_verify($password, $user['password'])) {
			$imageID = $image->model('Image')->insertImageByUserID($user_id, $title, $description, $image);
			$imageObject['imageID'] = $imageID;
			echo json_encode($imageObject);
		}
	}
	private function getPictures($user_id)
	{
		$images = $this->model('Image')->getImageByUserID($user_id);

		$imageObjects = array();

		foreach ($images as $image) {
			$jsonAttributeName['image_id'] = $image['imageID'];
			$jsonAttributeName['image_title'] = $image['title'];
			$jsonAttributeName['image_description'] = $image['description'];
			$jsonAttributeName['image_base64_data'] = $image['image'];
			$imageObjects[] = $jsonAttributeName;
		}

		echo json_encode($imageObjects, JSON_PRETTY_PRINT);
	}
	
}
