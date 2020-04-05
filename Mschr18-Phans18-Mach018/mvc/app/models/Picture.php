<?php
class Picture extends Database {
	
	// Returns all pictures uploaded by the user by reference.
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
		return $pictures;
	}

	public function deletePicture($picid) {

	}

	public function uploadPicture() {

	}

}