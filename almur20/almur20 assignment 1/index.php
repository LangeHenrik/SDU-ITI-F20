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

        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname",
                            $username,
                            $password,
                            array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

            $search_query = "SELECT username, password FROM user WHERE username=:username;";
            $stmt = $conn->prepare($search_query);
            $stmt->bindParam(':username', $user, PDO::PARAM_STR);

            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);

            if ($stmt->rowCount() >= 1) {
                //User exists
                $result = $stmt->fetchAll();
                //var_dump($result);
                if (password_verify($pwd, $result[0]['password'])) {
                    //echo 'Correct password';
                    $_SESSION['logged_in'] = true;
                    $_SESSION['username'] = $user;
                } else {
                    $login_message = '<p>Incorrect password.</p>';
                    $_SESSION['logged_in'] = false;
                }
            } else {
                //User doesn't exists
                $login_message = '<p>Inexistent user, you can register <a href="registration.php">here</a>.</p>';
                $_SESSION['logged_in'] = false;
            }            

            //print_r($result);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        $conn = null;
    }
?>

<!DOCTYPE html>
<html>
	<head>
        <title>Frontpage</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="style.css">
	</head>

	<body>	

    <nav>
        <div class="topnav" id="myTopnav">
            <a href="index.php" class="active">Frontpage</a>
            <a href="registration.php">Registration</a>
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
            
    <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']) { ?>
        <div class="form_div">
            <h2>Welcome <?php echo $_SESSION['username'];?></h2>
            <form action="<?php $_SESSION['logged_in'] = false;?>">
                <input type="submit" value="Log out"/>
            </form>
        </div>
    <?php } else { ?>
        <div class="form_div">
            <form  method="POST">
                <legend>Login:</legend>

                <label for="input_username">Username:</label>
                <input type="text" id="input_username" name="input_username"></input>
                </br>
                <label for="input_password">Password:</label>
                <input type="password" id="input_password" name="input_password"></input>
                </br>
                <input type="submit" value="Login">
            </form>
            <?php if (isset($login_message)) {?>
                <p class="error_message"><?php echo $login_message;?></p>
            <?php } ?>
            </br>
            <a href="registration.php"><button>Register</button></a>
        </div>
    <?php } ?>

    <script src="code.js"></script>
    </body>
</html>

