<?php
class User extends Database
{

	public function login($username, $password)
	{
		$stmt = $this->conn->prepare("SELECT password FROM user WHERE username = :username");
		$stmt->bindParam(':username', $username);
		$stmt->execute();
		$stmt->setFetchMode(PDO::FETCH_ASSOC);
		$result = $stmt->fetchColumn(0);

		if (isset($result)) {
			return password_verify($password, $result);
		} else {
			return false;
		}
	}

	public function getAllUsers()
	{
		$stmt = $this->conn->prepare("SELECT user_id, username FROM user");
		$stmt->execute();
		$stmt->setFetchMode(PDO::FETCH_ASSOC);
		$result = $stmt->fetchAll();

		return $result;
	}

	public function registerUser($username, $password)
	{
		if (!$this->checkIfUsernameIsUnique($username)) {
			return "Username is already taken.";
		}

		$hashed_password = password_hash($password, PASSWORD_DEFAULT);

		$stmt = $this->conn->prepare("INSERT INTO user (username, password) VALUES (:username, :password_hash)");
		$stmt->bindParam(':username', $username);
		$stmt->bindParam(':password_hash', $hashed_password);
		$stmt->execute();

		return "";
	}

	private function checkIfUsernameIsUnique($username)
	{
		$stmt = $this->conn->prepare("SELECT * FROM user where username = :username");
		$stmt->bindParam(':username', $username);
		$stmt->execute();
		$stmt->setFetchMode(PDO::FETCH_ASSOC);
		$result = $stmt->fetchAll();

		if (isset($result[0])) {
			return false;
		} else {
			return true;
		}
	}

	public function getUser($username = "")
	{
		if ($username === "") {
			$stmt = $this->conn->prepare("SELECT * FROM user");
		} else {
			$stmt = $this->conn->prepare("SELECT username FROM user WHERE username LIKE CONCAT('%', :username, '%')");
			$stmt->bindParam(':username', $username);
		}
		$stmt->execute();
		$stmt->setFetchMode(PDO::FETCH_ASSOC);
		$result = $stmt->fetchAll();

		return $result;
	}
}
