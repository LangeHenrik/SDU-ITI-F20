<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width" />
        <title>Assignement 1</title>
        <link rel="stylesheet" href="style.css" type="text/css" media="all">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css" media="all">
 
    </head>
    <body>
        <div class="header">
            <h1>Assignement 1</h1>
<?php
    require_once "config.php"; 
    session_start();
    if(isset($_SESSION["user_id"]) && isset($_SESSION["logged_in"]))
    {
?>
       <nav class="menu">
            <a href="index.php">Home</a> 
            <a href="images.php">Images</a>
            <a class="active" href="users.php">Users</a>
            <a href="logout.php">Logout</a>
        </nav>
        </div>
        <div class="wrapper">
            <div class="frame">
            <div class="content">
                <div class="user_list">
                <input type="text" name="user_search" id="user_search" onkeyup="search_user(this.value)" placeholder="Search user"/>
                <p id="search_result">Results: <span id="user_search_resualt"></span></p>
                <table>
                    <tr>
                        <th> Nr: </th>
                        <th> Users: </th>
                    </tr>
<?php
    try
    {    
        $conn = new PDO("mysql:host=".MYSQL_HOST.";dbname=".MYSQL_DATABASE, MYSQL_USER, MYSQL_PASSWORD);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT username FROM user";
        $stmt = $conn->prepare($sql);
        $stmt->execute();

        $users = $stmt->fetchAll(PDO::FETCH_COLUMN);
        for ($i = 0; $i < sizeof($users); $i++) 
        {
            echo "<tr> <td>".($i+1)."</td><td>".$users[$i]."</td></tr>";
        }
    }
    catch(PDOException $e)
    {
         echo "Connection failed: " . $e->getMessage();
    }
    }
    else
    {
        header("Location: index.php");
    }
?>
 
                </table>
                <p><b>Total number of users in the database:</b>
<?php   
                echo sizeof($users);
?>
                </p>
                </div>
            </div>      
            </div>
        </div>

    <script>
    function search_user(str) {
        if (str.length == 0) {
            document.getElementById("user_search_resualt").innerHTML = "";
            document.getElementById("search_result").style.display="none";
            return;
        } else {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("user_search_resualt").innerHTML = this.responseText;
                }
            };
            document.getElementById("search_result").style.display="block";
            xmlhttp.open("GET", "searchUser.php?q=" + str, true);
            xmlhttp.send();
        }
    }
    </script>
    </body>
</html>
