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

	public function pictures($param1, $param2){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            //uploading picture
           $_POST["json"];
           $jd = json_decode($_POST["json"]);

           $usernameByID = $this->model('User')->getUsernameByID($param2);
           echo$usernameByID;
           if($this->model('User')->login($jd->{"username"},$jd->{"password"}) && $jd->{"username"} == $usernameByID){

               //picture upload
               $username = $jd->{"username"};
               $header = $jd->{"title"};
               $description = $jd->{"description"};
               $file = $jd->{"image"};
               $this->model('Picture')->upload($username, $header, $description, $file);

               $image_id = $this->model('Picture')->getRecentPicture($username);
               echo json_encode($image_id, JSON_PRETTY_PRINT);
           }
           else{
               //info telling wrong user or psw
               echo "wrong ";
           }

        }
        if($_SERVER['REQUEST_METHOD'] == 'GET'){
            $pictures = $this->model('Picture')->getPictureForUser($param2);
            echo json_encode($pictures, JSON_PRETTY_PRINT);
        }
    }


}