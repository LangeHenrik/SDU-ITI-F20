<?php

class APIController extends Controller
{
	public function __construct(){
		header('Content-Type: application/json');
	}
	public function index($param)
	{
		echo "[GET] localhost:8080/alhen20_chset20/mvc/public/api/users
Returns a JSON list of all users and their id's
[POST] localhost:8080/alhen20_chset20/mvc/public/api/pictures/user/{id}
Requires a POST method containing image detail to be uploaded along with credentials, returns image_id after uploading<br>
[GET] localhost:8080/alhen20_chset20/mvc/public/api/pictures/user/{id}
Returns a list of pictures for a specific user";
	}
	public function users(){
		$users = $this->model('User')->getAllUser();
		echo json_encode($users, JSON_PRETTY_PRINT);
	}
	public function pictures($userss,$id){
		if ($userss == "user"){
			$users = $this->model('Picture')->getPictureByUserId($id);
			echo json_encode($users, JSON_PRETTY_PRINT);
		}
	}
}
