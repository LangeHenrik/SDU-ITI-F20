<?php

class User extends Database
{

	public function login($username)
	{
		$sql = "SELECT username, password FROM users WHERE username = :username";

		$stmt = $this->conn->prepare($sql);
		$stmt->bindParam(':username', $username);
		$stmt->execute();

		$result = $stmt->fetch(); //fetchAll to get multiple rows

		print_r($result);


		//todo: make an actual login function!!
		return true;
	}

	public function isUser($username, $password)
	{
		$users = $this->getUserFromUsername($username);
		foreach ($users as $user) {
			$hash = $user['password'];
			if ($user['username'] == $username && password_verify($password, $hash)) {
				return true;
			} else {
				return false;
			}
		}
	}

	public function getAll()
	{
		$sql = "SELECT user_id, username, email FROM users";
		$stmt = $this->conn->prepare($sql);
		$stmt->execute();
		$result = $stmt->fetchAll();
		return $result;
	}

	public function getUserFromUsername($username)
	{
		$sql = "SELECT * FROM users WHERE username = :username;";
		$stmt = $this->conn->prepare($sql);
		$stmt->bindParam(':username', $username);
		$stmt->execute();
		$result = $stmt->fetchAll();
		return $result;
	}

	public function createUser($username, $email, $password)
	{
		$sql = "INSERT INTO users (username, email, password) VALUES (:username,:email,:password);";
		$stmt = $this->conn->prepare($sql);
		$stmt->bindParam(':username', $username);
		$stmt->bindParam(':email', $email);
		$stmt->bindParam(':password', $password);
		$stmt->execute();
	}
}
