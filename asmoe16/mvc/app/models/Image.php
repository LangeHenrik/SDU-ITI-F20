<?php
class Image extends Database {

	#https://stackoverflow.com/questions/19083175/generate-random-string-in-php-for-file-name
	private function random_filename($length, $directory = '', $extension = '') {
		// default to this files directory if empty...
		$dir = !empty($directory) && is_dir($directory) ? $directory : dirname(__FILE__);

		do {
			$key = '';
			$keys = array_merge(range(0, 9), range('a', 'z'));
			for ($i = 0; $i < $length; $i++) {
				$key .= $keys[array_rand($keys)];
			}
		} while (file_exists($dir . '/' . $key . (!empty($extension) ? '.' . $extension : '')));

		return $key . (!empty($extension) ? '.' . $extension : '');
	}


	private static $allowedMimeTypes = array('image/gif','image/jpeg','image/jpg','image/png');

	private $error = array();

	public function getError() : array {
		return $this->error;
	}
	public function uploadBlob($data) : bool {

		//TODO put into constructor
		$target_dir = "../imageFolder/";
		if( !file_exists($target_dir) ) {
			mkdir($target_dir,0744,true);
		}

		//save to tmp dir
		$target_tmp_file = $this->random_filename(16,sys_get_temp_dir());
		$ifp = fopen($target_tmp_file,"wb");
		fwrite($ifp, base64_decode( $data['image'] ) );
		fclose($ifp);

		$uploadOk = 1;
		$target_file = $target_dir . $this->random_filename(16,$target_dir);

		$finfo = finfo_open(FILEINFO_MIME_TYPE);
		$mimeType = finfo_file($finfo,$target_tmp_file);

		// Check if image file is a actual image or fake image
		if ( in_array($mimeType,self::$allowedMimeTypes,true) ) {
			// It is an allowed image now
			$this->error['image'] = true;
		} else {
			// Is not an image
			$this->error['image'] = false;
			$uploadOk = 0;
		}

		// Check file size
//		if ($target_tmp_file > 1048576 ) { 
//			$this->error['size'] = false;
//			$uploadOk = 0;
//		} else {
//			$this->error['size'] = true;
//		}

		if ($uploadOk == 1) {
			if (rename($target_tmp_file, $target_file)) {
				$db_path = substr($target_file,3);

				$sane_desc = filter_var($data['description'],FILTER_SANITIZE_SPECIAL_CHARS);
				$sane_head = filter_var($data['title'],FILTER_SANITIZE_SPECIAL_CHARS);

				$sql = "INSERT INTO image (owner_id,image_path,description,header)
					VALUES (:owner,:image,:description,:header)";

				$stmt = $this->conn->prepare($sql);
				$stmt->bindParam(":owner",$_SESSION['user_id']);
				$stmt->bindParam(":image",$db_path);
				$stmt->bindParam(":description",$sane_desc);
				$stmt->bindParam(":header",$sane_head);
				$stmt->execute();
				$this->error['db'] = true;
				return true;
			} else {
				// TODO find page error as this is serverside
				$this->error['db'] = false;
			}
		}
		return false;
	}
	
	public function upload() : bool {

		//TODO put into constructor
		$target_dir = "../imageFolder/";
		if( !file_exists($target_dir) ) {
			mkdir($target_dir,0744,true);
		}

		$uploadOk = 1;
		$target_file = $target_dir . $this->random_filename(16,$target_dir);

		$finfo = finfo_open(FILEINFO_MIME_TYPE);
		$mimeType = finfo_file($finfo,$_FILES['fileUpload']['tmp_name']);

		// Check if image file is a actual image or fake image
		if ( in_array($mimeType,self::$allowedMimeTypes,true) ) {
			// It is an allowed image now
			$this->error['image'] = true;
		} else {
			// Is not an image
			$this->error['image'] = false;
			$uploadOk = 0;
		}

		// Check file size
		if ($_FILES["fileUpload"]["size"] > 1048576 ) { 
			$this->error['size'] = false;
			$uploadOk = 0;
		} else {
			$this->error['size'] = true;
		}

		if ($uploadOk == 1) {
			if (move_uploaded_file($_FILES["fileUpload"]["tmp_name"], $target_file)) {
				$db_path = substr($target_file,3);

				$sane_desc = filter_var($_POST['description'],FILTER_SANITIZE_SPECIAL_CHARS);
				$sane_head = filter_var($_POST['header'],FILTER_SANITIZE_SPECIAL_CHARS);

				$sql = "INSERT INTO image (owner_id,image_path,description,header)
					VALUES (:owner,:image,:description,:header)";

				$stmt = $this->conn->prepare($sql);
				$stmt->bindParam(":owner",$_SESSION['user_id']);
				$stmt->bindParam(":image",$db_path);
				$stmt->bindParam(":description",$sane_desc);
				$stmt->bindParam(":header",$sane_head);
				$stmt->execute();
				$this->error['db'] = true;
				return true;
			} else {
				// TODO find page error as this is serverside
				$this->error['db'] = false;
			}
		}
		return false;
	}

	public function list_images(string $user_id="") {
		$sane_id = filter_var($user_id,FILTER_SANITIZE_NUMBER_INT);
		$sql = "SELECT * FROM user_image";
		if ($user_id != "") {
			$sql = $sql . " WHERE owner_id = :id";
		}
		$stmt = $this->conn->prepare($sql);
		$stmt->bindParam(":id",$sane_id);
		$stmt->execute();
		$result = $stmt->fetchAll();
		return $result;
	}


}
