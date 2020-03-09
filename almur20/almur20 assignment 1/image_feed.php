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
        
        $join_query = "SELECT I.image, I.description, I.header, U.username
                        FROM user_image J
                        JOIN user U ON J.user_id=U.user_id
                        JOIN image I ON J.image_id=I.image_id";
        $stmt = $conn->prepare($join_query);

        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $images_exist = false;
        if ($stmt->rowCount() >= 1) {
            $images_exist = true;
            $results = $stmt->fetchAll();
            $_SESSION['results'] = $results;
        }
        $results_length = $stmt->rowCount();
    }
    catch(PDOException $e) {
        echo $e->getMessage();
    }
    
    $conn = null;
?>

<!DOCTYPE html>
<html>
	<head>
        <title>Image Feed</title>
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
            <a href="image_feed.php" class="active">Image feed</a>
            <a href="userlist.php">User list</a>
            <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                <i class="fa fa-bars"></i>
            </a>
            <input type="text" placeholder="Filter results by username" id="input_filter" name="input_filter" onkeyup="filterResults(this.value,<?php echo ($images_exist) ? 1:0;?>,<?php echo $results_length;?>)"></input>
        </div>	
    </nav>
    
    <div class="image_feed" id="image_square">
    <?php
    if ($images_exist) {
        for ($count = 0; $count < $stmt->rowCount(); $count++) {
    ?>
        <div class="image_card">
            <p class="requirements"><?php echo $results[$count]['username'];?></p>
            <img src="<?php echo $results[$count]['image'];?>" alt="<?php echo $results[$count]['header'];?>">
            <h3><?php echo $results[$count]['header'];?></h3>
            <p class="requirements"><?php echo $results[$count]['description'];?></p>
        </div>
    <?php
        }
    } else {?>
        <h3>No images to show.</h3>
    <?php } ?>
    </div>

    <script src="code.js"></script>
    </body>
</html>

