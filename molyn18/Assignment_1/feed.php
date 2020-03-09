<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (is_null($_SESSION["username"])) {
    header("Location:index.html");
    exit();
}

require_once 'backend/config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Image Feed</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style/common.css">
    <link rel="stylesheet" type="text/css" href="style/style.css">
    <link rel="stylesheet" type="text/css" href="style/feed.css">
</head>
<body>
<ul>
    <li><a href="feed.php">Feed</a></li>
    <li><a href="users.php">Users</a></li>
    <li><a href="upload.php">Upload</a></li>
    <li><a href="backend/logout.php">Log Out</a></li>
</ul>
<?php
try {
    $db_conn = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
    $db_conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $db_conn->prepare("SELECT imgID, title, author, description FROM photo ORDER BY imgID DESC");
    $stmt->execute();

    $imagelist = $stmt->fetchAll();
    foreach ($imagelist as $content) {?>
        <div class='box'>
            <div class="content">
                <img src="backend/get_image.php?img=<?php echo $content['imgID']?>">
                <div class="meta">
                    <h3 class="title"><?php echo $content['title']; ?></h3>
                    <span class="author"><?php echo $content['author']; ?></span>
                    <span class="desc"><?php echo $content['description']; ?></span>
                </div>
            </div>
        </div>
    <?php }
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
</body>
</html>
