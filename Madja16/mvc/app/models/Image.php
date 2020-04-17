<?php
class Image extends Database {

	public function getAllImagesFromUser($image_owner) {

		$sql = "SELECT image_id, image_description, image_header, image_blob FROM user_images WHERE image_owner = :image_owner";

		$stmt = $this->conn->prepare($sql);
		$stmt->bindParam(':image_owner', $image_owner);
		$stmt->execute();

		$result = $stmt->fetchAll();

		return $result;
	}

	// duplicate function. Other place is User.php
	public function isUsernameAndPasswordCorrect($username, $password) {

		$sql = "SELECT username, user_password FROM users WHERE username = :username";
		
		$stmt = $this->conn->prepare($sql);
		$stmt->bindParam(':username', $username);
		$stmt->execute();

		if ($stmt->rowCount() > 0 ) {
			$result = $stmt->fetch(PDO::FETCH_ASSOC);

			$checkPassword = password_verify($password, $result['user_password']);

			// $checkPassword = true; // testing purposes. password_verify is mad because it's not hashed currently

			if ($checkPassword == false) {

				// wrong password
				return false;
			} 
			elseif ($checkPassword == true) {

				// success
				return true;
			}
			else {
				return false;
			}
		} else {

			// user not found
			return false;
		}

	}

	public function api_uploadImage($user_id) {
		
		// $jsonAlt = file_get_contents('php://input');

		$json = $_POST['json'];

		$obj = json_decode($json);

		// foreach($obj as $key => $value) 
		// {
		// 	echo 'Your key is: '.$key.' and the value of the key is:'.$value;
		// }

		// echo $json;

		// $obj = json_decode($json);

		// echo $obj->title;

		if ($this->isUsernameAndPasswordCorrect($obj->username, $obj->password)) {

			// find user_id from username

			// $sql = "SELECT user_id FROM users WHERE username = :username";
			
			// $stmt = $this->conn->prepare($sql);
			// $stmt->bindParam(':username', $obj->username);
			// $stmt->execute();

			// $result = $stmt->fetch();

			// insert into database

			$uploader = $user_id;		// $result['user_id'];

			$header = $obj->title;
			$description = $obj->description;
			$image_base64 = $obj->image;

			$sql = "INSERT INTO user_images(
								image_id, 
								image_description, 
								image_header, 
								image_blob, 
								image_owner) VALUES (
									NULL, 
									:image_description,
									:image_header,
									:image_blob,
									:image_owner)";

			$stmt = $this->conn->prepare($sql);
			$stmt->bindParam(':image_description', $description);
			$stmt->bindParam(':image_header', $header);
			$stmt->bindParam(':image_blob', $image_base64);
			$stmt->bindParam(':image_owner', $uploader);

			$stmt->execute();
			
			// Find latest insert id where image_owner is the uploader of image

			$sql = "SELECT LAST_INSERT_ID() FROM user_images";

			$stmt = $this->conn->prepare($sql);
			$stmt->execute();

			$result = $stmt->fetch();

			$upload_image_id = $result['LAST_INSERT_ID()'];

			return $upload_image_id;
		}

		// if 0 is returned the upload failed
		return 0;
	}

	public function getImageFeed() {

		$sql = "SELECT * FROM user_images";

		$stmt = $this->conn->prepare($sql);
		$stmt->execute();

		$result = $stmt->fetchAll();

		return $result;
	}

	public function uploadImage() {
		
		$header = filter_var($_REQUEST['header'], FILTER_SANITIZE_STRING);
		$description = filter_var($_REQUEST['description'], FILTER_SANITIZE_STRING);
		
		$image_file = $_FILES['imageUpload'];

		$fileName = $_FILES['imageUpload']['name'];
		$fileTmpName = $_FILES['imageUpload']['tmp_name'];
		$fileSize = $_FILES['imageUpload']['size'];
		$fileError = $_FILES['imageUpload']['error'];
		$fileType = $_FILES['imageUpload']['type'];

		$fileExt = explode('.', $fileName);
		$fileActualExt = strtolower(end($fileExt));

		$allowed = array('jpg', 'jpeg', 'png');

		$imageFileType = strtolower(pathinfo(basename($fileName),PATHINFO_EXTENSION));

		print_r($_FILES);
		print_r($fileExt);
		print_r($fileActualExt);

		if (in_array($fileActualExt, $allowed)) {
			if ($fileError === 0) {
				if ($fileSize < 10000000) {
					$image_base64 = base64_encode(file_get_contents($_FILES['imageUpload']['tmp_name']));
					$image_base64 = 'data:image/' . $imageFileType . ';base64,' . $image_base64;


					$description = filter_var($_POST["description"], FILTER_SANITIZE_STRING);
					$header = filter_var($_POST["header"], FILTER_SANITIZE_STRING);
					$uploader = $_SESSION['session_id'];

					$sql = "INSERT INTO user_images(
										image_id, 
										image_description, 
										image_header, 
										image_blob, 
										image_owner) VALUES (
											NULL, 
											:image_description,
											:image_header,
											:image_blob,
											:image_owner)";

					$stmt = $this->conn->prepare($sql);
					$stmt->bindParam(':image_description', $description);
					$stmt->bindParam(':image_header', $header);
					$stmt->bindParam(':image_blob', $image_base64);
					$stmt->bindParam(':image_owner', $uploader);

					$stmt->execute();

					return true;
				}
				else {
					return false;
				}
			} 
			else {
				return false;
			}
		}
		else {
			return false;
		}

		// if (getimagesize($_FILES['imageUpload']['tmp_name'] !== false)) {
		// 	$image_base64 = base64_encode(file_get_contents($_FILES['imageUpload']['tmp_name']));
		// 	$image_base64 = 'data:image/' . $imageFileType . ';base64,' . $image_base64;

		// 	$test_description = "test description";
		// 	$test_header = "test header";
		// 	$uploader = $_SESSION['session_username'];

		// 	$sql = "INSERT INTO user_images(
		// 						image_id, 
		// 						image_description, 
		// 						image_header, 
		// 						image_blob, 
		// 						image_owner) VALUES (
		// 							NULL, 
		// 							:image_description,
		// 							:image_header,
		// 							:image_blob,
		// 							:image_owner)";

		// 	$stmt = $this->conn->prepare($sql);
		// 	$stmt->bindParam(':image_description', $test_description);
		// 	$stmt->bindParam(':image_header', $test_header);
		// 	$stmt->bindParam(':image_blob', $image_base64);
		// 	$stmt->bindParam(':image_owner', $uploader);

		// 	$stmt->execute();

		// 	return true;
		// }
		// else {
		// 	// failed image upload
		// 	return false;
		// }
	}
}