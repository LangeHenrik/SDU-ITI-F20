<?php
class Picture extends Database {
	
	// Return all pictures uploaded (by the user) by reference.
	public function &getPictures($username = NULL){
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
				$pictures[$i][3] .= (substr($pictures[$i][3], -1) === '.') ? '' : '.'; 
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
				$name = $_FILES['picupload']['name'][$i];
				$target_dir = "../Images/";
				$target_file = $target_dir . basename($_FILES["picupload"]["name"][$i]);
				// Find filetype
				$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
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

					// Upload file
					move_uploaded_file($_FILES['picupload']['tmp_name'][$i],$target_dir.$name);
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

	public function deletePicture($picid) {

	}

}