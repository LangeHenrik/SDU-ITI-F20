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
	// GET localhost:8080/yaliu20/yaliu20 assignment2/mvc/public/api/users
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

	// GET localhost:8080/yaliu20/yaliu20 assignment2/mvc/public/api/pictures/user/2
	// POST localhost:8080/yaliu20/yaliu20 assignment2/mvc/public/api/pictures/user/2
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
		$user = $this->model('User')->getUserByID($user_id);
		$imageObject = array();

		$imageID = $this->model('Image')->insertImageByUserID($user_id, $user);
		$imageObject['image_id'] = $imageID;
		echo json_encode($imageObject);
	}
	private function getPictures($user_id)
	{
		$images = $this->model('Image')->getImageByUserID($user_id);

		$imageObjects = array();

		foreach ($images as $image) {
			$jsonAttributeName['image_id'] = $image['imageID'];
			$jsonAttributeName['title'] = $image['title'];
			$jsonAttributeName['description'] = $image['description'];
			$jsonAttributeName['image'] = $image['image'];
			$imageObjects[] = $jsonAttributeName;
		}

		echo json_encode($imageObjects, JSON_PRETTY_PRINT);
	}
}
