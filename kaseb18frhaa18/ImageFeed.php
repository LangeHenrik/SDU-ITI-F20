<?php 
session_start();
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    echo '<h3 id="name">'. $_SESSION["name"].'</h3>';
} else {
    header("location: index.php");
    exit;
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
                <div class="description">
                    <img src="3.jpg" alt="user picture"/>
                    <br/>
                    <p>Pic of me</p>
                    <h3>This i a picture of me</h3>
                    <br/>
                    <h4>test</h4>
                </div>
                <div class="description">
                    <img src="3.jpg" alt="user picture"/>
                    <br/>
                    <p>Pic of me</p>
                    <h3>This i a picture of me</h3>
                    <br/>
                    <h4>Fred</h4>
                </div>
                <div class="description">
                    <img src="3.jpg" alt="user picture"/>
                    <br/>
                    <p>Pic of me</p>
                    <h3>This i a picture of me</h3>
                    <br/>
                    <h4>Fred</h4>
                </div>
                <div class="description">
                    <img src="3.jpg" alt="user picture"/>
                    <br/>
                    <p>Pic of me</p>
                    <h3>This i a picture of me</h3>
                    <br/>
                    <h4>admin</h4>
                </div>
                <div class="description">
                    <img src="3.jpg" alt="user picture"/>
                    <br/>
                    <p>Pic of me</p>
                    <h3>This i a picture of me</h3>
                    <br/>
                    <h4>admin</h4>
                </div>
            </div>
        </div>
    
</body>

</html>