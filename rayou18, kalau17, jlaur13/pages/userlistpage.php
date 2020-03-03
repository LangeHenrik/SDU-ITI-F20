<?php

if (session_status() == PHP_SESSION_NONE){
header("Location: ./homepage.php");
}
session_start();
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" href="../styles/shared.css">
    <link rel="stylesheet" href="../styles/userlist_style.css">
  </head>
  <body>

    <div class="navbar">
      <ul>
        <li><a class="logo" href="homepage.php"><i class="fas fa-rocket"></i></a></li>
        <li><a  href="homepage.php">Home Page</a></li>
        <li> <a href="imagefeed.php">Image Feed</a></li>
        <li><a href="registrationpage.php">Registration Page</a></li>
        <li><a class="active" href="userlistpage.php">User List</a></li>
        <li><a  href="uploadimagepage.php">Upload Image <i class="fas fa-upload"></i></a></li>
        <li><a class="cred_btns" id="logout_btn"type="button" href="../backend/logout.php" name="logout_btn">Logout</a></li>
      </ul>
    </div>
    <div class="wrapper">
      <div class="userlist">
        <h1>User List</h1>
        <?php
          require_once '../db_config.php';
          try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "SELECT username FROM user";
            $users = $conn->prepare($sql);
            $users->execute();
            $row = $users->fetchAll(PDO::FETCH_COLUMN);?>
            <table class="usertable" id="usertable">
              <?php foreach ($row as $userlistoutput):?>
              <tr class="user-row" id="user-row">
                <td class="user-data" id="user-data"><?php echo $userlistoutput; ?></td>
              </tr>
              <?php endforeach; ?>
            </table>
            <?php
          }
          catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
          }
        ?>
      </div>

    </div>
  </body>
</html>
