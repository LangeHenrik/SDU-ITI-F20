<?php
class User extends Database {
	
	public function login($username){
		$sql = "SELECT username, password FROM userinfo WHERE username = :username";
		if (empty($_POST["username"]) || empty($_POST["password"]))
        {
            echo "Please fill all fields";
		}
		
		$stmt = $this->conn->prepare($sql);
		$stmt->bindParam(':username', $username);
		$stmt->execute();

		$result = $stmt->fetch(); //fetchAll to get multiple rows

		print_r($result);

		if(password_verify ($password ,$result["password"])){

			$_SESSION["username"] = $username;
		  	
		      return true;
		 }
 


		//todo: make an actual login function!!
		return false;
	}


    public function register(){

		if(isset($_POST['submitbtn'])){

		$username = $_POST['username'];

		$password = $_POST['password'];


        $username = filter_var($_POST["username"], FILTER_SANITIZE_STRING);
        $password = filter_input($_POST["password"],FILTER_SANITIZE_STRING);
        $hashedpassword = password_hash($passwordinput,PASSWORD_DEFAULT);
             $sql = "INSERT INTO userinfo(username, password) VALUES (:username, :password)";
			$stmt = $this->conn->prepare($sql);
			$stmt->bindParam(':username', $username);
			$stmt->bindParam(':password', $hashedpassword);
            $stmt->execute();
				
				
				/*array(
                "user" => $usernameinput, 
                "password" => $hashedpassword
            )); 
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            echo "<div class='form'>
            <h3>You are registered successfully.</h3>
			<br/>Click here to <a href='index.php'>Login</a></div>";*/
		}
        } 
   


	public function getAll () {

		$sql = "SELECT username FROM userinfo";

		$stmt = $this->conn->prepare($sql);
		$stmt->execute();

		$result = $stmt->fetchAll();

		return $result;
	}


	public function logout(){

echo 'YOU log out';

	}

	public function registration(){


		 echo'register';
	}

}