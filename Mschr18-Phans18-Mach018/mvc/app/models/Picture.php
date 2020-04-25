<?php
class Picture extends Database {

	// Return all pictures uploaded (by the user) by reference.
	public function &getPictures($username = NULL) {
		$stmtString = "SELECT titel, username, imagebase64, description, uploaddate, picid FROM picture";
		if (isset($username) && $username != NULL) {
			$stmt = $this->conn->prepare($stmtString . " WHERE username = :username");
			$stmt->bindParam(':username', $_SESSION['username']);
		}
		else {
			$stmt = $this->conn->prepare($stmtString);
		}
		$stmt->execute();
		$stmt->setFetchMode(PDO::FETCH_NUM);
		$pictures = $stmt->fetchAll();
		// If not empty, add a '.' if there isn't any
		for($i = 0; $i < count($pictures); $i++) {
			if ($pictures[$i][3]) {
				$lastChar = substr($pictures[$i][3], -1);
				$pictures[$i][3] .= in_array($lastChar, array('.', '!', '?')) ? '' : '.';
			}
		}
		return $pictures;
	}

	// Uploads selected pictures
	public function uploadPicture() {
		try
		{
			for ($i=0; $i < count($_FILES["picupload"]["name"]); $i++)
			{
				// Is the file too big or has other errors?
				if ($_FILES["picupload"]["error"][$i] != 0) {
					// Skip this picture upload and move on to the next.
					continue;
				}
				$name = filter_var($_FILES['picupload']['name'][$i], FILTER_SANITIZE_STRING);
				// Find filetype
				$imageFileType = strtolower(pathinfo(basename($name),PATHINFO_EXTENSION));
				// Check sufix
				if( getimagesize($_FILES["picupload"]["tmp_name"][$i]) !== false ) {
					// Convert to base64
					$image_base64 = base64_encode(file_get_contents($_FILES['picupload']['tmp_name'][$i]) );
					$image_base64 = 'data:image/' . $imageFileType . ';base64,' . $image_base64;
					$titel = filter_var($_POST["titel"], FILTER_SANITIZE_STRING);
					// If no titel is specified. titel is defined as first 20 chars of filename.
					$titel = $titel != "" ? $titel : $name;
					$titel = substr($titel, 0, 20);
					$description = filter_var($_POST["description"], FILTER_SANITIZE_STRING);
					$description = substr($description, 0, 240);

					// Insert picture with id, date, path and base64 string.
					$stmt = $this->conn->prepare("INSERT INTO picture (username, titel, description, uploaddate, imagename, imagebase64)
										VALUES(:username, :titel, :description, NOW(), :imagename, :imagebase64)");
					$stmt->bindParam(':username', $_SESSION["username"]);
					$stmt->bindParam(':titel', $titel);
					$stmt->bindParam(':description', $description);
					$stmt->bindParam(':imagename', $name);
					$stmt->bindParam(':imagebase64', $image_base64);
					$stmt->execute();
				}
				else
				{
					echo "<script> console.log('File(s) were not of correct type'); </script>" ;
				}
			}
		}
		catch(PDOException $e)
		{ ?>
			<br><p> Connection failed: <?=$e->getMessage()?><br/>code: <?=$e->getCode()?></p>;
		<?php }
	}

	// Delete selected picture
	public function deletePicture() {
		try
		{
			if( isset( $_POST["deletebtn"] ) ) {
				$picid = filter_var( $_POST["deletebtn"], FILTER_SANITIZE_NUMBER_INT );

				$stmt = $this->conn->prepare("DELETE FROM picture WHERE picid = :picid AND username = :username ;");
				$stmt->bindParam(':username', $_SESSION["username"]);
				$stmt->bindParam(':picid', $picid);
				if($stmt->execute()) return true;
			}
			echo "<script> console.log('deletebtn must have contained an invalid or wrong picid'); </script>" ;
			return false;
		}
		catch(PDOException $e)
		{ ?>
			<br><p> Connection failed: <?=$e->getMessage()?><br/>code: <?=$e->getCode()?></p>;
		<?php }
	}


	// API Fucktions

	public function apiPostPicture($idParam) {
		$jasonData = json_decode($_POST['json']);

		$userid = (int)$idParam; // alredy SANITIZE with is_numeric()
		$imagebase64;
		$title = filter_var($jasonData->title, FILTER_SANITIZE_STRING);
		$description = filter_var($jasonData->description, FILTER_SANITIZE_STRING);
		$username = filter_var($jasonData->username, FILTER_SANITIZE_STRING);
		$password = filter_var($jasonData->password , FILTER_SANITIZE_STRING);

		// Is $jasonData->image base64 encode and contains only base64.
		preg_match("/^(data:image\/([a-zA-Z]{3,4});base64,)([A-Za-z0-9+\/]*={0,2})$/",$jasonData->image , $matches);
		if ( ($matches[0] == "") || ( strlen($jasonData->image ) != strlen($matches[0]) ) ) {
			return "The data at ['jason']->image of type base64. Contains invalid base64 code.";
		}
		if (!preg_match("/^(data:image\/(jpe?g|png);base64,)$/", $matches[1] )) {
			$errorstring = "The data at ['jason']->image of type base64. must declare image data type like 'data:image/jpeg;base64, ...' In the begining.";
			if (preg_match("/^([a-zA-Z]{3,4})$/", $matches[2] )) {
				$errorstring .= " Type must be either jpeg, jpg or png, type was '". $matches[2] ."'.";
			}
			return $errorstring;
		}
		if ( base64_decode($matches[3], true) === false ) {
			return "The base64 data in ['jason']->image is invalid.";
		}
		$imagebase64 = $matches[0];

		try
		{
			$stmtString = "SELECT password FROM user WHERE userid = :userid AND username = :username";
			$stmt = $this->conn->prepare($stmtString);
			$stmt->bindParam(':userid', $userid);
			$stmt->bindParam(':username', $username);
			$stmt->execute();
			$stmt->setFetchMode(PDO::FETCH_ASSOC);
			$result = $stmt->fetch();

			if ($result && password_verify($password, $result['password'])) {

				$stmtString = "INSERT INTO picture (username, titel, description, uploaddate, imagename, imagebase64)
											 VALUES(:username, :title, :description, NOW(), 'noneapi', :imagebase64)";

				$stmt = $this->conn->prepare($stmtString);
				$stmt->bindParam(':username', $username);
				$stmt->bindParam(':title', $title);
				$stmt->bindParam(':description', $description);
				$stmt->bindParam(':imagebase64', $imagebase64);
				$stmt->execute();

				$stmtString = "SELECT LAST_INSERT_ID()AS 'image_id' FROM picture ";

				$stmt = $this->conn->prepare($stmtString);
				$stmt->execute();
				$stmt->setFetchMode(PDO::FETCH_ASSOC);
				$result = $stmt->fetch();


				return $result;
			}
			else {
				return "user_id, password or username is invalid!";
			}
		}
		catch(PDOException $e)
		{
			$string = "Connection failed:";
			$string .= $e->getMessage();
			$string .= "code: ";
				$string .=$e->getCode();
			return $string;
		}

	}

	public function apiGetPicture($idParam) {
		$userid = (int)$idParam; // alredy SANITIZE with is_numeric()

		try
		{
			$stmtString = "SELECT imagebase64 AS 'image', titel, userid AS 'user_id', description FROM picture, user WHERE user.username = picture.username AND user.userid = :userid";
			$stmt = $this->conn->prepare($stmtString);
			$stmt->bindParam(':userid', $userid);
			$stmt->execute();
			$stmt->setFetchMode(PDO::FETCH_ASSOC);
			$result = $stmt->fetchAll();

			return $result;
		}
		catch(PDOException $e)
		{
			$string = "Connection failed:";
			$string .= $e->getMessage();
			$string .= "code: ";
				$string .=$e->getCode();
			return $string;
		}
	}
}
