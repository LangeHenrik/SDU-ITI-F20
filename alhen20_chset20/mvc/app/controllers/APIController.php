<?php

class APIController extends Controller
{
	public function __construct(){
		header('Content-Type: application/json');
	}
	public function index($param)
	{
	}
	public function users(){

		$users = $this->model('User')->getAll();
		echo json_encode($users, JSON_PRETTY_PRINT);
	}
	public function pictures($userss,$id){
		if ($userss == "user"){
			$users = $this->model('Picture')->getAllPictureByUserId($id);
			echo json_encode($users, JSON_PRETTY_PRINT);
		}


	}
}
