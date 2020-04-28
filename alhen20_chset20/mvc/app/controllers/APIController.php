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
			if($this->get()){
				$users = $this->model('Picture')->getPictureByUserId($id);
				echo json_encode($users, JSON_PRETTY_PRINT);
			}
			elseif ($this->post()) {
				try{
					$json = json_decode($_POST['json']);
					$image = $json->image;
					$title = filter_var($json->title, FILTER_SANITIZE_STRING);
					$description =filter_var($json->description, FILTER_SANITIZE_STRING);
					$username = filter_var($json->username, FILTER_SANITIZE_STRING);
					$password =filter_var($json->password, FILTER_SANITIZE_STRING);
				} catch (Exception $e){
					die("Error");
				}
				$testuser = $this-> model('User');
				if ($testuser->checkUser($username,$password)){
					$res = $testuser->getUserId($username);
					$user_id = $res['user_id'];
					if($user_id == $id){
						$image_id = $this->model('Picture')->createPicture($username, $title, $image, $description);
						echo json_encode($image_id, JSON_PRETTY_PRINT);
					}
				}
			}
		}
	}
}
