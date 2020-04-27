<?php
class User extends Database {
	
	public function login($username){
        $sql = "SELECT * FROM userinfo WHERE username = :username";
        if (empty($_POST["username"] )|| empty($_POST["password"]))
        {
            echo "Please fill all fields";	
		} else{  

             
		
		
		
        $username = filter_var($_POST["username"], FILTER_SANITIZE_STRING);

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':username', $username);
        $stmt->execute();

        $result = $stmt->fetch(); //fetchAll to get multiple rows

       // print_r($result);

        if(password_verify ($_POST["password"], $result["password"])){

            $_SESSION["username"] = $username;

            $_SESSION["user_id"] = $result['user_id'];
            $_SESSION['logged_in'] = true;
              return true;
         }  else{

            echo "Username or Password is invalid";
            return false;
         }
    

        }
       
    }


    public function registeruser(){




        $username = filter_input(INPUT_POST,"username", FILTER_VALIDATE_REGEXP,array('options' => array('regexp' => "/^[a-z|A-Z|0-9]{4,13}$/")));
        $password = filter_input(INPUT_POST,"password", FILTER_VALIDATE_REGEXP,array('options' => array('regexp' => "/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).{6,100}$/")));
        if(!$username || !$password ){


            return "Username  or Password is invalid";
        } else { 

        $hashedpassword = password_hash($password,PASSWORD_DEFAULT);



             $sql = "INSERT INTO userinfo(username, password) VALUES (:username, :password)";
			$stmt = $this->conn->prepare($sql);
			$stmt->bindParam(':username', $username);
			$stmt->bindParam(':password', $hashedpassword);
            $stmt->execute();
          return true;
        }
      } 
   


	public function getAll () {

		$sql = "SELECT user_id, username FROM userinfo";

		$stmt = $this->conn->prepare($sql);
		$stmt->execute();

		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

		return $result;
    }
       
   



	public function logout(){

echo 'YOU log out';

	}

	public function registration(){


		 echo'register';
	}

	

}