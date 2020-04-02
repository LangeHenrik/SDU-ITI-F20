<?php
class Picture extends Database {
	
	// Returns all pictures uploaded by the user.
	public function getMyPictures($username){
		$stmtString = "SELECT titel, username, imagebase64, description, uploaddate, picid FROM picture";

		if (isset($_POST["myuploads"]) && $_POST["myuploads"]) {
			$stmt = $conn->prepare($stmtString . " WHERE username = :username");
			$stmt->bindParam(':username', $_SESSION['username']);
		}
		$stmt->execute();
		$stmt->setFetchMode(PDO::FETCH_NUM);
		return $stmt->fetchAll();
	}

	// Gets all pictures uploaded by all users
	public function getAll () {
		$stmtString = "SELECT titel, username, imagebase64, description, uploaddate, picid FROM picture";
		$stmt = $conn->prepare($stmtString);
		$stmt->execute();
		$stmt->setFetchMode(PDO::FETCH_NUM);
		return $stmt->fetchAll();
	}

	public function deletePicture($picid) {

	}

	public function uploadPicture() {
		
	}

}