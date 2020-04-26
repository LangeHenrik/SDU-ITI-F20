<?php
class User extends Database {
	
	public function login($user, $pass){
		require __DIR__ . '/../db_config.php';
	
		try {
			$connection = new PDO("mysql:host=$server;port=$portdb;dbname=$database", 
			$username_database, $password_database, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
			$stmt = $connection->prepare("SELECT username, pwd FROM users");
			$stmt->execute();
			$stmt->setFetchMode(PDO::FETCH_ASSOC);
			$result = $stmt->fetchAll();
	
			$user = filter_var($_POST['username-login'], FILTER_SANITIZE_STRING);
			$userXSS = htmlspecialchars($user, ENT_QUOTES | ENT_SUBSTITUTE, 'utf-8');
	
			$pass = filter_var($_POST['pwd-login'], FILTER_SANITIZE_STRING);
			$passXSS = htmlspecialchars($pass, ENT_QUOTES | ENT_SUBSTITUTE, 'utf-8');
	
			if(isset($_SESSION['username'])){
				#echo"<a href='logout.php'><input type=button value=Logout name=logout></a>";
			}else{
				foreach($result as $row){
					print_r($row['username']);
					print_r($userXXS);
					print_r($row['pwd']);
					print_r($passXSS);
					if($row['username']==$userXSS && password_verify($passXSS, $row['pwd'])){
						$_SESSION['username']=$_POST['username-login'];
						#$path_feed = __DIR__ . '\..\feed.php';
						echo"<html><script>window.location.href = './../Feed/index.php'</script></html>";
					}else{
						#$path_index = __DIR__ . '\..\index.php';
						echo "<html><script> alert('Log in first to use the feature!')</script>";
						#echo "<script>window.location.href = './../index.php' </script></html>";
					}
				}
			}
		}
			catch (PDOException $error){
				echo "ERROR: ".$error->getMessage();
			}
			$connection = null;
		}
	
	public function getAll () {

		$sql = "SELECT username, userid FROM users";

		$stmt = $this->conn->prepare($sql);
		$stmt->execute();

		$result = $stmt->fetchAll();

		return $result;
	}

	public function register ($username, $email, $pass, $pwd_repeat) {

		if ($pass != $pwd_repeat) {
			return false;
		}

		try{
				$connection = new PDO("mysql:host=$server;port=$portdb;dbname=$database", 
				$username_database, $password_database, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
				$stmt = $connection->prepare("INSERT INTO users (username, email, pwd) VALUES(:username, :email, :pwd)");
				
				$user = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
				#$user = "user";
				$userXSS = htmlspecialchars($user, ENT_QUOTES | ENT_SUBSTITUTE, 'utf-8');
				$stmt->bindParam(':username', $userXSS, PDO::PARAM_STR);

				$email = filter_var($_POST['email-register'], FILTER_SANITIZE_STRING);
				#$email = "asds@asds.com";
				$emailXSS = htmlspecialchars($email, ENT_QUOTES | ENT_SUBSTITUTE, 'utf-8');
				$stmt->bindParam(':email', $emailXSS, PDO::PARAM_STR);

				$pass = filter_var(password_hash($_POST['pwd-register'], PASSWORD_DEFAULT), FILTER_SANITIZE_STRING);
				#$pass = "senha123";
				$passXSS = htmlspecialchars($pass, ENT_QUOTES | ENT_SUBSTITUTE, 'utf-8');
				$stmt->bindParam(':pwd', $passXSS, PDO::PARAM_STR);

				$stmt->execute();
				$stmt->setFetchMode(PDO::FETCH_ASSOC);

			} catch (PDOException $e){
				echo $e->getMessage();
			}
			$connection = null;
		}

	public function verifyUser($UP_info) {
        $username = filter_var($UP_info['username'], FILTER_SANITIZE_STRING);
        $password = filter_var($UP_info['password'], FILTER_SANITIZE_STRING);
        $userid = filter_var($UP_info['userid'], FILTER_SANITIZE_NUMBER_INT);

        $sql = "SELECT username, pwd, userid FROM users WHERE username = :username 
                && userid = :userid";

        $stmt = $this->conn->prepare($sql);

        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':userid', $userid);

        $stmt->execute();

        $result = $stmt->fetch();

        if(password_verify($pwd, $result['pwd'])) {
            return true;
        } else {
			return false;
		}

    }
}