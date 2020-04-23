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

	public function getAll()
	{

		$sql = "SELECT user_id, username FROM user";

		$stmt = $this->conn->prepare($sql);
		$stmt->execute();
		$stmt->setFetchMode(PDO::FETCH_ASSOC);

		$result = $stmt->fetchAll();
		return $result;
	}
}
