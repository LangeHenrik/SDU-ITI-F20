<?php
session_start();

if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    echo '<h3 id="name">'. $_SESSION["name"].'</h3>';
} else {
    header("location: index.php");
    exit;
}

require 'database.php';

function loadImageFeed(){
    $statement = "select a.photo, a.head, a.description, b.username from feed a INNER JOIN person b ON a.person_id=b.person_id;";
    $posts = talkToDB($statement, null);
    $feed = "";
    foreach ($posts as $image){
        $feed .= "<div class='description'>
            <img src=$image[photo] alt=virk />
            <br/>
            <p>$image[head]</p>
            <h3>$image[description]</h3>
            <br/>
            <h4>$image[username]</h4>
            </div>";
    }
    return $feed;

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- basic.html -->
    <title>Title of the document</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="myscripts.js"></script>
    <link rel="stylesheet" type="text/css" href="style.css">
    <meta charset="UTF-8" />
</head>

<body>
    <div class="wrapper">
        <div class="menu">
            <h2>Menu</h2>
            <ul>
                <li> <a href=frontpage.php>Login</a></li>
                <li> <a href=registration.php>Register</a></li>
                <li> <a href=#>Upload</a></li>
                <li> <a href=ImageFeed.php>Image Feed</a></li>
                <li> <a href=User_List.php>User List</a></li>
            </ul>
        </div>
    </div>

    <div class="wrapper">
            <div class="imagefeed">
                <h1>Image Feed</h1>
                <?php echo loadImageFeed(); ?>
            </div>
    </div>
    
</body>

</html>