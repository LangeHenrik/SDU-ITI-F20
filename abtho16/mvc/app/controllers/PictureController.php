<?php

require_once '../app/models/Picture.php';

class PictureController extends Controller {

	public function index() {
		if(isset($_SESSION['logged_in']) == true and $_SESSION['logged_in'] == true) {
			$viewbag['pics'] = $this->model('Picture')->getPictures();
			$this->view('picture/index', $viewbag);
        } else {
            header('Location: home');
        }
        
	}
	

	public function upload() {
		if(isset($_SESSION['logged_in']) == true and $_SESSION['logged_in'] == true) {
			$this->view('picture/upload');
        } else {
			header('Location: ../home');
		}
	}
	
	public function uploadpictures() {
		//with out session test
		$this->view('picture/showPictures');
	}
	
	public function save() {
        try {
            require_once('../app/core/Database.php');
            $conn = (new Database)->conn;
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $st = $conn->prepare("INSERT INTO picture(picture, user, header, description) VALUES(:picture, :user, :header, :description)");
            $picture = file_get_contents($_FILES["image"]["tmp_name"]);
     
            $st->bindParam(':picture', $picture);
            $st->bindParam(':user', htmlentities($_SESSION['username']));
            $st->bindParam(':header', htmlentities($_POST['header']));
            $st->bindParam(':description', htmlentities($_POST['description']));
            $st->execute();
            header("Location: index");
        } catch (PDOException $e) {
            'Error : ' . $e->getMessage();
        }
    }
}
