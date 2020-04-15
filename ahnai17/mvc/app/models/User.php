<?php
class User extends Database {
	
	public function login(){
		$sql = "SELECT username, password FROM users WHERE username = :username";
                $username=filter_input(INPUT_POST, 'username');
                $password=filter_input(INPUT_POST, 'password');
                if (!$username || !$password) {//if either field is empty
				return false;
			}
                echo "<script>console.log('test login')</script>";
		$stmt = $this->conn->prepare($sql);
		$stmt->bindParam(':username', $username);
		$stmt->execute();
                $stmt->setFetchMode(PDO::FETCH_ASSOC);
		$result = $stmt->fetch(); //fetchAll to get multiple rows
		print_r($result);
                if(password_verify($password,  $result['password'])){
		return true;
                } else {
                    return false;
                }
	}
        public function register(){
            $username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
            $password = filter_var($_POST['password'],FILTER_SANITIZE_STRING);
            $checkUsername = $this->conn->prepare("SELECT username FROM users WHERE username = :username");
            $checkUsername->bindParam(':username', $username);
            $checkUsername->execute();
        if($checkUsername->rowCount() > 0){
            echo "Sorry username already exists try another username";
        } else {
            $sql="INSERT INTO users(username, password) VALUES(:username,:password)";
            $hashed_password= password_hash($password, PASSWORD_DEFAULT);
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':password',$hashed_password);
            $stmt->execute();
            }
        }
	public function getAll () {
		$sql = "SELECT id, username FROM users";
		$stmt = $this->conn->prepare($sql);
		$stmt->execute();
		$result = $stmt->fetchAll();
		return $result;
	}
}