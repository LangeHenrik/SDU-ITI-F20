<!DOCTYPE html>
<head>
    <title>Semester feed</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<?php
require_once'db_config.php';

function getImages(){

    try {
        $conn = new PDO(
            "mysql:host=$servername;dbname=$dbname",
            $username,
            $password,
            array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)
        );

        $stmt = $conn->prepare("SELECT * FROM picture");

        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $result = $stmt->fetchAll();

        return $result;
    } catch (PDOException $e) {
        return "Error:" .$e->getMessage();
    }

    $conn = null;   
} 
?>

    <div class="content">
        <?php
        $all_posts = getImages();
        echo '<h3>There are '. sizeof($all_posts) . ' posts in the imagefeed.</h3><hr>';

        for ($i = 0; $i < sizeof($all_posts); $i++) {
            $user = $all_posts[$i]['name'];
            $image = $all_posts[$i]['image'];

            echo
            '<div class="post">
                <p class="username"><em>'.$user.'</em> posted:</p>
                <div class="post-content">
                    <img src="'.$image.'" alt="'.$user.'.png">
                </div>
            </div>
            <hr>';
            }
        ?>
    </div>

    <div class="navbar">
        <a href="Imagepage.php">Images</a>
        <a href="Uploadpage.php">Upload</a>
        <a href="Userlist.php">Users</a>
    </div>
</body>