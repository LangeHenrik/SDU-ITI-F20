<?php

class User extends Database
{
	public function getUser($username){
		$stmt = $this->conn->prepare("SELECT user_id, username, pass FROM site_user WHERE username = :username");
		$stmt->bindParam(":username", $username);
		$stmt->execute();
		$res = $stmt->fetchAll();
		return $res;
	}

	public function getUserId($username){
		$stmt = $this->conn->prepare("SELECT user_id FROM site_user WHERE username = :username");
		$stmt->bindParam(":username", $username);
		$stmt->execute();
		$res = $stmt->fetch();
		return $res;
	}

	public function checkUser($username, $pass){
		$users = $this->getUser($username);
		foreach($users as $user){
			if(password_verify($pass, $user['pass'])){
				return true;
			}
			else{
				return false;
			}
		}
	}

	public function getAllUser()
	{
		$sql = "SELECT user_id, email, username FROM site_user";
		$stmt = $this->conn->prepare($sql);
		$stmt->execute();
		$result = $stmt->fetchAll();
		return $result;
	}

	public function createUser($username, $email, $pass)
	{
		$sql = "INSERT INTO site_user (username, email, pass) VALUES (:username,:email,:pass);";
		$stmt = $this->conn->prepare($sql);
		$stmt->bindParam(':username', $username);
		$stmt->bindParam(':email', $email);
		$stmt->bindParam(':pass', $pass);
		$stmt->execute();
	}
}
