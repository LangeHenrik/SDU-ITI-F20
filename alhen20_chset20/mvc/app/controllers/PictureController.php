<?php

class PictureController extends Controller
{
    public function __construct()
	{
		if (session_status() == PHP_SESSION_NONE) {
			session_start();
		}
    }

    public function image_feed()
	{
		$viewbag['pictures'] = $this->model('Picture')->getAllPictures();
		$this->view('picture/image_feed',$viewbag);
    }

    public function upload()
	{
		$viewbag['error'] = "";
		if(isset($_SESSION['error'])){
			$viewbag['error'] = $_SESSION['error'];
			$_SESSION['error'] = '';
		}
		$this->view('picture/upload',$viewbag);

		if (isset($_POST['upload'])) {
			$header = filter_input(INPUT_POST, "header", FILTER_SANITIZE_STRING);
			$description = filter_input(INPUT_POST, "description", FILTER_SANITIZE_STRING);

			$name = $_FILES['image']['name'];
			$target_file = basename($_FILES['image']['name']);
			$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
			$extensions_arr = array("jpg", "jpeg", "png", "gif");

			if (in_array($imageFileType, $extensions_arr)) {
				$image_base64 = base64_encode(file_get_contents($_FILES['image']['tmp_name']));
				$image = 'data:image/'.$imageFileType.';base64,'.$image_base64;
				$this->model('Picture')->createPicture($_SESSION['username'], $header, $image, $description);
				$_SESSION['error'] = "";
				header("Location: /alhen20_chset20/mvc/public/picture/image_feed");
			} else {
				$_SESSION['error'] = 'image must have jpg, jpeg, png or gif extension';
				header("Location: /alhen20_chset20/mvc/public/picture/upload");
			}
		}
	}

}