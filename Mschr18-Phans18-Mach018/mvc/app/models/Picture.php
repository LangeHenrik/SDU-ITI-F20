<?php
class Picture extends Database {
	
	// Returns all pictures uploaded by the user by reference.
	public function &getMyPictures($username){
		$stmtString = "SELECT titel, username, imagebase64, description, uploaddate, picid FROM picture";

		if (isset($_POST["myuploads"]) && $_POST["myuploads"]) {
			$stmt = $this->conn->prepare($stmtString . " WHERE username = :username");
			$stmt->bindParam(':username', $_SESSION['username']);
		}
		$stmt->execute();
		$stmt->setFetchMode(PDO::FETCH_NUM);
		$pictures = $stmt->fetchAll();
		return $pictures;
	}

	// Gets all pictures uploaded by all users by reference
	public function &getAll () {
		$stmtString = "SELECT titel, username, imagebase64, description, uploaddate, picid FROM picture";
		$stmt = $this->conn->prepare($stmtString);
		$stmt->execute();
		$stmt->setFetchMode(PDO::FETCH_NUM);
		$pictures = $stmt->fetchAll();
		return $pictures;
	}

	public function deletePicture($picid) {

	}

	public function uploadPicture() {

	}

}