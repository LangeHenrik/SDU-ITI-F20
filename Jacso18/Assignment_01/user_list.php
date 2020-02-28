<?php
    include 'includes/autoload.php';
?>
<?php
    session_start();
            
    $userController = new UserController();
    $users = $userController->getAllUsers();

    Utility::redirectIfNotLoggedIn();
    Utility::logoutPressed();

?>

<!DOCTYPE html>
<html>   
    <head>
        <title>User list</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
        <html lang="en">        
    </head>
    <body>
        <ul class="menu">
                <li><a href="image_feed.php">Image feed</a></li>
                <li><a href="upload.php">Upload picture</a></li>
                <li><a href="user_list.php">Users</a></li>
        </ul>
        <div class="wrapper">
            <div class= "content">
                <?php foreach($users as $user){?>
                <div class="users">
                    <p><?php echo $user['username']; ?> </p>
                    <br>
                    <p><?php echo $user['email']; ?></p>
                    <br/>
                </div>
                <?php }?>
            </div>
        </div>
        
        <form method="POST">
            <input type="submit" name="logout" id="logout" value="Logout"/>
        </form>
    </body>
</html>