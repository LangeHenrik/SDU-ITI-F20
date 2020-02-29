<!DOCTYPE html>
<html>

<head>
</head>

<body>

    <?php
    $q = strval($_GET['q']);

    $usercontroller = new UserController();
    $posts = $usercontroller->getPostByUser($q);

    echo "<div>";
    foreach ($posts as $post) {
        echo "<h1>" . $post['title'] . "</h1>";
        echo "<p>" . "Posted by: " . $post['username'] . " at " . $post['timestamp'] . "</p>";
        echo "<img src=" . $post['image'] . "/>";
        echo "<p>" . $post['COMMENT'] . "</p>";
        echo "<br/";
    };
    echo "</div>";

    ?>
</body>

</html>