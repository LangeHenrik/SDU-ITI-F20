<?php
	function connect_db() {
		try {
			require 'config.php';
			$conn = new PDO("mysql:host=$servername;dbname=$dbname",
			$username,
			$password,
			array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
		} catch (PDOException $e) {
			echo "Error: " . $e->getMessage();
		}
		return $conn;
	}

	# Assuming sanitized input
	function login($username,$password) {
		$conn = connect_db();
		$stmt = $conn->prepare("SELECT * FROM member WHERE username = :username");
		$stmt->bindParam(':username',$username);
		$stmt->execute();
		$result = $stmt->fetchAll();
		$conn = null;
		# TODO Change verification process
		if (isset($result[0]) && $result[0]['password'] == $password) {
			$_SESSION['logged_in'] = true;
			$_SESSION['username'] = $result[0]['username'];
			$_SESSION['user_id'] = $result[0]['user_id'];
			return true;
		}
		return false;
	}

	function register(string $username,string $password) : bool {
		$conn = connect_db();
		$stmt = $conn->prepare("SELECT username FROM member where username = :username");
		$stmt->bindParam(':username',$username);
		$stmt->execute();
		$result = $stmt->fetchAll();
		$exists = isset($result[0]['username']);
		if (!$exists) {
			$stmt = $conn->prepare("INSERT INTO member (username,password)
							VALUES (:username,:password)");
			$stmt->bindParam(':username',$username);
			$stmt->bindParam(':password',$password);
			$stmt->execute();
		}
		$conn = null;
		return !$exists;
	}

	function list_users() {
		$conn = connect_db();
		$stmt = $conn->prepare("SELECT user_id,username FROM member");
		$stmt->execute();
		return $stmt->fetchAll();
	}

	function add_image_to_db($img_path,$owner_id, $description="",$header=""){
		$conn = connect_db();
		$stmt = $conn->prepare("INSERT INTO image (owner_id,image_path,description,header)
			VALUES (:owner,:image,:description,:header)");
		$stmt->bindParam(":owner",$owner_id);
		$stmt->bindParam(":image",$img_path);
		$stmt->bindParam(":description",$description);
		$stmt->bindParam(":header",$header);
		$stmt->execute();
	}

	function list_images() {
		$conn = connect_db();
		$stmt = $conn->prepare("SELECT user_id,username FROM member");
		$stmt->execute();
		return $stmt->fetchAll();
	}

?>
