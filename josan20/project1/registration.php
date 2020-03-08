<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registration</title>
    <meta name="viewport" content="width=device width, initial scale=1.0">
    <!--    main css-->
    <link rel="stylesheet" type="text/css" href="style.css">
    <!--    awesome font-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<?php
error_reporting(E_ALL);
require_once 'sanitize_input.php';
require_once 'db_config.php';
?>

<div class="header">
    <h1>Login</h1>
</div>

<div id="form" class="registration_form">
    <form onsubmit="return checkform();" action="registration.php" method="post">
        <label for="name">name:</label>
        <input type="text" id="name" name="name"><br>
        <p class="info" id="nameinfo"></p><br><br>
        <label for="pass">password:</label>
        <input type="password" id="pass" name="pass"><br><br>
        <input type="submit" value="registration">
    </form>
<!--    <script src="registration_form.js"></script>-->
</div>

<?php
if ($_POST["name"]!==NULL){
    $name = $_POST["name"];
    echo $name . "\n";
    $newstr = filter_var($name, FILTER_SANITIZE_STRING);
    echo $newstr . "\n";
}


?>


<div class="footer">
    <p>@Josef Sanda</p>
</div>
</body>
</html>














