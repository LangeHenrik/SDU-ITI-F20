<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    if (!isset($_SESSION['logged_in']) && !$_SESSION['logged_in']) header('location:index.php');

    require_once 'db_config.php';

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname",
                        $username,
                        $password,
                        array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

        $search_query = "SELECT username FROM user";
        $stmt = $conn->prepare($search_query);

        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);

        $users = $stmt->fetchAll();
        //var_dump($users);
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    $conn = null;
?>

<!DOCTYPE html>
<html>
	<head>
        <title>User List</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="style.css">
	</head>

	<body>	

    <nav>
        <div class="topnav" id="myTopnav">
            <a href="index.php">Frontpage</a>
            <a href="registration.php">Registration</a>
            <a href="upload.php">Upload</a>
            <a href="image_feed.php">Image feed</a>
            <a href="userlist.php" class="active">User list</a>
            <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                <i class="fa fa-bars"></i>
            </a>
        </div>	
    </nav>

    <div style="text-align:center">
    <?php
    for ($count = 0; $count < $stmt->rowCount(); $count++)
    { 
    ?>
        <div class="useritem">
        <h3><?php echo $users[$count]['username']?></h3>
        </div>
    <?php
    } 
    ?>
    </div>

    <script src="code.js"></script>
    </body>
</html>

