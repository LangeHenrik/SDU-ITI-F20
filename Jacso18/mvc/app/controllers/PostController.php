<?php

class PostController extends Controller
{
    public function __construct()
	{
		if (session_status() == PHP_SESSION_NONE) {
			session_start();
		}
    }

    public function image_feed()
	{
		$this->view('post/image_feed');
		$this->model('Post')->getAllPosts();
    }
    
    public function upload()
	{
		$this->view('post/upload');

		if (isset($_POST['upload'])) {
			$title = filter_input(INPUT_POST, "title", FILTER_SANITIZE_STRING);
			$comment = filter_input(INPUT_POST, "comment", FILTER_SANITIZE_STRING);

			$name = $_FILES['filetoupload']['name'];
			$target_file = basename($_FILES["filetoupload"]["name"]);
			// Select file type
			$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
			// Valid file extensions
			$extensions_arr = array("jpg", "jpeg", "png", "gif");

			// Check extension
			if (in_array($imageFileType, $extensions_arr)) {

				// Convert to base64 
				$image_base64 = base64_encode(file_get_contents($_FILES['filetoupload']['tmp_name']));
				$image = 'data:image/' . $imageFileType . ';base64,' . $image_base64;
				// Insert record
				$this->model('Post')->createPost($_SESSION['username'], $title, $image, $comment);
			} else {
				echo 'The file has to be either jpg, jpeg, png or gif';
			}
		}
	}
    
}