<?php

    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    if (isset($_POST['input_username']))
    {
        require_once 'db_config.php';
        
        $user = trim($_POST['input_username']);
        $pwd = trim($_POST['input_password']);

        filter_input(FILTER_SANITIZE_STRING, $user, FILTER_FLAG_NO_ENCODE_QUOTES);
        filter_input(FILTER_SANITIZE_STRING, $pwd, FILTER_FLAG_NO_ENCODE_QUOTES);

        $pwd = password_hash($pwd, PASSWORD_DEFAULT);
        //echo $user;
        //echo $pwd;

        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname",
                            $username,
                            $password,
                            array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
            
            $search_query = "SELECT username FROM user WHERE username=:username";
            $stmt = $conn->prepare($search_query);
            $stmt->bindParam(':username', $user, PDO::PARAM_STR);

            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            //$results = $stmt->fetchAll();

            if ($stmt->rowCount() >= 1) {
                $info_message = 'User exists';
            }
            else {
                $insert_query = "INSERT INTO user (username, password)
                                VALUES (:username, :password)";

                $stmt = $conn->prepare($insert_query);
                $stmt->bindParam(':username', $user, PDO::PARAM_STR);
                $stmt->bindParam(':password', $pwd, PDO::PARAM_STR);

                $stmt->execute();

                $_SESSION['logged_in'] = true;
                $_SESSION['username'] = $user;
                //echo "New record created successfully";
                header('location:index.php');
            }
        }
        catch(PDOException $e)
            {
            echo $insert_query . "<br>" . $e->getMessage();
        }
        
        $conn = null;
    }
?>

<!DOCTYPE html>
<html>
	<head>
        <title>Registration</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="style.css">
	</head>

	<body>	

    <nav>
        <div class="topnav" id="myTopnav">
            <a href="index.php">Frontpage</a>
            <a href="registration.php" class="active">Registration</a>
            <?php if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']) {?>
            <a href="upload.php">Upload</a>
            <a href="image_feed.php">Image feed</a>
            <a href="userlist.php">User list</a>
            <?php }?>
            <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                <i class="fa fa-bars"></i>
            </a>
        </div>	
    </nav>

    <div class="form_div">
        </br>
        <form method="post">
            <legend>Register new user:</legend>

            <label for="input_username">Create username:</label>
            <input type="text" id="input_username" name="input_username" pattern="[\da-zA-Z]{5,12}"></input>
            </br>
            <p class="requirements">Username must have at least 5 alphanumeric characters and maximum 12.</p>
            </br>
            <label for="input_password">Create password:</label>
            <input type="password" id="input_password" name="input_password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"></input>
            </br>
            <p class="requirements">Password must have at least 8 characters including a number, a lower case, and an upper case.</p>
            </br>
            <input type="submit" value="Register">
            <?php if (isset($info_message)) {?>
                <p class="error_message"><?php echo $info_message;?></p>
            <?php } ?>
        </form>
    </div>

    <script src="code.js"></script>
    </body>
</html>

