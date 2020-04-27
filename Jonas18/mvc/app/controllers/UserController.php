<?php
class UserController extends Controller {

	public function index ($param) {	
	}
	
    public function imagefeed(){
        $images = $this->model('Image')->getAllImages();
        $viewbag['images'] = $images;
        $this->view('home/imagefeed', $viewbag);
    }

    public function userlist(){
        $users = $this->model('User')->getAll();
        $viewbag['users'] = $users;
		$this->view('home/userlist', $viewbag);
    }

    public function upload(){
        $this->view('home/upload');
        if(isset($_POST['upload'])){
            $username = $_SESSION['username'];
            $title = filter_var($_POST['title'], FILTER_SANITIZE_STRING);
            $image = filter_var($_POST['imageblob'], FILTER_SANITIZE_STRING);
            $description = filter_var($_POST['description'], FILTER_SANITIZE_STRING);
            $this->model('Image')->uploadimage($username, $title, $image, $description);
            header('Location: /jonas18/mvc/public/user/imagefeed');
        }
    }



}