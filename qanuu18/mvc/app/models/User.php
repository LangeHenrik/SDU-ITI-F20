<?php
class User extends Database {
	
	public function login($usernameinput){
        $sql = "SELECT username, password FROM userinfo WHERE username = :username";
        if (empty($_POST["username"]|| empty($_POST["password"])))
        {
            echo "Please fill all fields";	
		} else{  


			echo "user logged ind";
		}
		


        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':username', $usernameinput);
        $stmt->execute();

        $result = $stmt->fetch(); //fetchAll to get multiple rows

        print_r($result);

        if(password_verify ($passwordinput ,$result["password"])){

            $_SESSION["username"] = $usernameinput;

              return true;
         }


        //todo: make an actual login function!!
        return true;
    }


    public function registeruser(){

	//	if(isset($_POST['submitbtn'])){


        print_r($_POST);

		$username = $_POST['username'];

		$password = $_POST['password'];


        $username = filter_var($_POST["username"], FILTER_SANITIZE_STRING);
        $password = filter_var($_POST["password"],FILTER_SANITIZE_STRING);
        $hashedpassword = password_hash($password,PASSWORD_DEFAULT);
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
		//}
        } 
   


	public function getAll () {

		$sql = "SELECT user_id, username FROM userinfo";

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