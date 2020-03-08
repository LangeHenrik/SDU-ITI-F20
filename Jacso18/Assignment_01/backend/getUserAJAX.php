<!DOCTYPE html>
<html>

<head>
</head>

<body>

    <?php
    
    include 'Dbh.php';
    include 'Users.php';
    include 'UserController.php';
    include 'Utility.php';
    session_start();


   /*  $q = strval($_GET['q']); */
    $q = filter_input(INPUT_GET, 'q',FILTER_SANITIZE_STRING);

    $usercontroller = new UserController();
    $postresults = $usercontroller->getAllPosts();

    $posts = $postresults;


    if ($q !== "") {
        unset($posts);
        $posts = array(); 
        $q = strtolower($q);
        $len = strlen($q);
        foreach ($postresults as $postresult) {
            if (stristr($q, substr($postresult['username'], 0, $len))) {
                array_push($posts, $postresult);
            }
        }
    } else {
        $posts = $postresults;
    }


    foreach ($posts as $post) {
        echo '<div class="post">';
        echo "<h1>" . $post['title'] . "</h1>";
        echo "<h3>" . "Posted by: " . $post['username'] . "</h3>";
        echo "<p>" . $post['timestamp'] . "</p>";
        echo '<img src="' . $post['image']. '"' . 'alt="alt_image.png"' . '"/>';
        echo "<p>" . $post['COMMENT'] . "</p>";
        echo "<br/>";
        echo "</div>";
    };


    ?>
</body>

</html>