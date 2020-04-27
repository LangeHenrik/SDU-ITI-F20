<?php
class User extends Database {
	
	public function login($username){
		$sql = "SELECT username, password FROM user WHERE username = :username";
		
		$stmt = $this->conn->prepare($sql);
		$stmt->bindParam(':username', $username);
		$stmt->execute();

		$result = $stmt->fetch(); //fetchAll to get multiple rows

		print_r($result);


		//todo: make an actual login function!!
		return true;
	}

	public function getAll () {

		$sql = "SELECT ID, username FROM user ORDER BY ID;";

		$stmt = $this->conn->prepare($sql);
		$stmt->execute();

		$result = $stmt->fetchAll();

		return $result;
	}

    public function getImagesById () {

        $sql = "SELECT ID, Image, Header, Description FROM picture WHERE ID=2";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        $result = $stmt->fetchAll();

        return $result;
    }



	public function getAllImages ($id) {
		$sql = "SELECT * FROM picture WHERE id = " . $id . "";

		$stmt = $this->conn->prepare($sql);
		$stmt->execute();

		$result = $stmt->fetchAll();

		return $result;
	}

}