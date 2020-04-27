<?php

class ApiController extends Controller {
	
	public function __construct () {
		header('Content-Type: application/json');
		//check api-key?
		//check username and password?
		//or die();
	}

	public function index () {
        print 'This Api offers the following endpoints: 
		{get} /users for a list of all users. 
		{get} /pictures/user/[user_id] for all of a users posts. 
		{post} /pictures/user/[user_id] to creat a post for the user. Takes "json" {"image": "blob","title": "some title", "description":"my description","username":"username","password":"actual password"}
		{get} /availability/username/[username] check if username is taken.';
	}
	
	public function users () {
		$users = $this->model('User')->getAll();
		echo json_encode($users, JSON_PRETTY_PRINT);
	}


    public function pictures ($action, $user) {
        $action = htmlentities($action);
        $user = htmlentities($user);
        if ($action === 'user'){
            if ($this->get()){
                $posts = $this->model('Post')->getPictures();

                echo json_encode($posts, JSON_PRETTY_PRINT);
            } elseif ($this->post()){
                $json = json_decode($_POST['imgSubmit']);
                $username = $json['juser'];
                $title = htmlentities($json['jheader']);
                $description = htmlentities($json['jdescription']);
                $picture = $json['jimage'];

                $userModel = $this->model('User');
                if ($_SESSION['logged_in']){
                    $postid = $this->model('Post')->newPicPost($title, $description, $username, $picture);
                    echo '{"image_id": "'. $postid .'"}';
                }
            } else {
                echo "Neither a post or a get method was called. Something went wrong.";
            }
        }
    }

    public function availability($check, $input){
	    if(!$this->model('User')){
            $this->model('User');
        }
	    if (strtolower($check) == 'username'){
	        if($this->model('User')->userAvailable($input, '')){
	            print $input . ' is available';
            } else {
	            print $input . ' is not available';
            }
        }
    }



}