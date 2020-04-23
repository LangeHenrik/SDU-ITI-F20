<?php
class User extends Database {
	
	public function login($username){
		$sql = "SELECT username, password FROM user WHERE username = :username";
		$stmt->bindParam(':username', $username);
		
		$stmt = $this->conn->prepare($sql);
		$stmt->execute();

		$result = $stmt->fetch(); //fetchAll to get multiple rows

		// print_r($result);


		//todo: make an actual login function!!
		return true;
	}

	public function getAll () {

		$sql = "SELECT user_id, username FROM user";

		$stmt = $this->conn->prepare($sql);
		$stmt->execute();
		$stmt->setFetchMode(PDO::FETCH_ASSOC);

		$result = $stmt->fetchAll();
		return $result;
	}

}