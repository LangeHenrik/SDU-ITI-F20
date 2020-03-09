
<?php
ob_start();

session_start();

if (!isset($_SESSION['LoggedIn'])) {
    print "<h2>Not allowed </h2>";
    echo "You will be redirected to log in page in 5 seconds...";
    echo "<meta http-equiv=Refresh content=5;url=frontPage.php>";
    exit();
}

?>




<html lang="en">
<html>
<head>
    <title>User list</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="scripts.js"></script>
    <link rel="stylesheet" type="text/css" href="style.css">


    <script>
        function showHint(str) {
            if (str.length == 0) {
                document.getElementById("txtSearch").innerHTML = "";
                return;
            } else {
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function () {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("txtSearch").innerHTML = this.responseText;
                    }
                };
                xmlhttp.open("GET", "search.php?search=" + str, true);
                xmlhttp.send();
            }
        }
    </script>


</head>
<body>
<br><br><br><br><br><br>
<!--HTML her-->

<div class="container">
    <label class="label"> Click here to go back to Image feed</label>
    <br>
<!--    <a href="imageFeed.php">Image feed</a>-->
    <br>

    <form action="imageFeed.php">
        <input class="bigBtn" type="submit" value="Go to Image Feed" />
    </form>
</div>

<br><br><br>

<div class="container">
    <form name="userList" method="post">
        <label class="label">Press here to get users</label>
        <br><br>
        <input class="bigBtn" type="submit" id="getUserlistBtn" name="getUserlist" value="Get Users" "> </input>
    </form>
</div>

<br>
<br>
<br>


<body>

<div class="container">

    <label class="label">Search for user:</label>
</div>

<div class="container">
    <form>
        <label for="name" class="label">Username</label>
        <input class="inputbox" type="text" onkeyup="showHint(this.value)">
    </form>

</div>

<p>
    <br>
    <span id="txtSearch"></span></p>
</body>
</html>


<?php

include('functions.php');
$array = array();

//Get user list
if (isset($_POST['getUserlist'])) {
    console_log("Spørger venligt database efter en user list");

    require_once 'db_config.php';
    include 'connect.php';

    $dataSourceName = "mysql:host=$host;dbname=$db;charset=$charset";
    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ];
    try {
        $pdo = new PDO($dataSourceName, $username, $password, $options);
    } catch (\PDOException $e) {
        throw new \PDOException($e->getMessage(), (int)$e->getCode());
    }

    $stmt = $pdo->query("SELECT username FROM users");

    echo "<div class='container'> ";
    echo " <label class='label'>Users:</label>";
    echo "</div>";
    echo "<br>";
    while ($row = $stmt->fetch()) {
        echo "<div class='container'> ";
//        echo $row['username'];
        $usersFromDb=$row['username'];
        echo "<br>";
        echo "<input value=\"$usersFromDb \" class='label' > </input><br>";
//        $array[] = $row;
        echo "</div>";
    }

}



?>
