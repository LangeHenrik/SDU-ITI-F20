<?php
class User extends Database {
	
	public function login($username){
		$sql = "SELECT username, password FROM users WHERE username = :username";
		
		$stmt = $this->conn->prepare($sql);
		$stmt->bindParam(':username', $username);
		$stmt->execute();

		$result = $stmt->fetch(); //fetchAll to get multiple rows

		print_r($result);


		//todo: make an actual login function!!
		return true;
	}

}