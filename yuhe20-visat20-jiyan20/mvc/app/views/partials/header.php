<!DOCTYPE html>
<html lang="en">

<head>
    <title></title>
    <meta charset="UTF-8" />
    <script src="/yuhe20-visat20-jiyan20/mvc/public/js/regex.js"></script>
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="./js/passwd_str.js"></script>
    <link rel="stylesheet" type="text/css" href="/yuhe20-visat20-jiyan20/mvc/public/css/style.css">
</head>
<?php include('menu.php'); ?>
<?php if (isset($_SESSION['logged_in'])) {
    echo '<h3>Hello there, ' . $_SESSION["username"] . '</h3>';
} ?>

</html>