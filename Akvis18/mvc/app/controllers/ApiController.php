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
		{get} /available/username/[user_name] check if username is taken.';
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
                $posts = $this->model('Post')->getUserPosts($user);
                //var_dump($posts);
                echo json_encode($posts, JSON_PRETTY_PRINT);
            } elseif ($this->post()){
                $json = json_decode($_POST['json']);
                $username = $json->username;
                $password = $json->password;
                $title = htmlentities($json->title);
                $description = htmlentities($json->description);
                $image = $json->image;

                $userModel = $this->model('user');
                if ($userModel->login($username, $password)
                && $userModel->getUserID($username) == $user){
                    $postid = $this->model('Post')->newPost($user, $title, $description, $image, false);
                    echo '{"image_id": "'. $postid .'"}';
                }
            }
        }
	}

    public function available ($check, $input){
	    $this->model('User');
	    if (strtolower($check) == 'username'){
            if($this->model('User')->userAvailable($input,'')){
                print $input . ' is available';
            } else {
                print $input . ' is occupied';
            }
        }
    }
}