<?php
    include 'includes/autoload.php';

?>
<?php
    session_start();
            
    $userView = new UserView();
    $posts = $userView->getAllPosts();
    $image = "";
    foreach($posts as $post){
        $image=$post['image']; 
    }

    Utility::redirectIfNotLoggedIn();
    Utility::logoutPressed();
?>

<!DOCTYPE html>
<html>   
    <head>
        <title>Image Feed</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <html lang="en">        
    </head>
    <body>
        <ul class="menu">
                <li><a href="image_feed.php">Image feed</a></li>
                <li><a href="upload.php">Upload picture</a></li>
                <li><a href="#">Users</a></li>
        </ul>
        <div class="wrapper">
            <div class= "content">
                <?php foreach($posts as $post){?>
                <div class="post">
                    <p><?php echo 'Posted by: ' . $post['username'] . ' at ' . $post['timestamp']; ?> </p>
                    <img src=<?php echo $post['image']; ?> />
                    <p><?php echo $post['COMMENT']; ?></p>
                    <br/>
                </div>
                <?php
                }?>
            </div>
        </div>
        
        <form method="POST">
            <input type="submit" name="logout" id="logout" value="Logout"/>
        </form>
    </body>
</html>