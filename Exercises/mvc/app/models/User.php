<?php
class User extends Database {
	
	public function login($username){
<<<<<<< Updated upstream
		$sql = "SELECT username, password FROM users WHERE username = :username";
=======
		$sql = "SELECT username, password FROM user WHERE username = :username";
>>>>>>> Stashed changes
		
		$stmt = $this->conn->prepare($sql);
		$stmt->bindParam(':username', $username);
		$stmt->execute();

		$result = $stmt->fetch(); //fetchAll to get multiple rows

		print_r($result);


		//todo: make an actual login function!!
		return true;
	}

<<<<<<< Updated upstream
=======
	public function getAll () {

		$sql = "SELECT username FROM user";

		$stmt = $this->conn->prepare($sql);
		$stmt->execute();

		$result = $stmt->fetchAll();

		return $result;
	}

>>>>>>> Stashed changes
}