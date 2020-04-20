<?php
class User extends Database {
	
	public function login($username){
		$sql = "SELECT username, password FROM users WHERE username = :username";
		
		$stmt = $this->conn->prepare($sql);
		$stmt->bindParam(':username', $username);
		$stmt->execute();

		$result = $stmt->fetchAll(); //fetchAll to get multiple rows

		print_r($result);


		//todo: make an actual login function!!
		return true;
    }
    
    public function getAllImages() {
        $sql = "SELECT * FROM images";
        $stmt = $this->conn->prepare($sql);
		$stmt->execute();
        while($result =  $sql->fetch(PDO::FETCH_ASSOC)){

        echo "<img src='data:$result[Filetype];base64,$result[img]' alt='$result[Header]'>";
        echo "<h3>".$result["Header"]."</h3>";
        echo "<p>".$result["description"]."</p>";
        echo "<p>".$result["username"]."</p>";
    }
    }
}