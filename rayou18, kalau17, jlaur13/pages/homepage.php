<?php
session_start();

//echo 'heheh' . $_SESSION['logged_in'] . " " . $_SESSION['username'];

if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true){
          $buttonValue = '';
      }
      else{

        $buttonValue = 'disabled';}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Homepage </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" href="../styles/shared.css">
    <link rel="stylesheet" href="../styles/homepage_style.css">
  </head>
  <body>
    <div class="navbar">
      <ul>
        <li><a class="logo" href="homepage.php"><i class="fas fa-rocket"></i></a></li>
        <li><a class="active" href="#">Home Page</a></li>
        <li><a class="<?php echo htmlspecialchars($buttonValue);?>" href="imagefeed.php ">Image Feed</a></li>
        <li><a class="<?php echo htmlspecialchars($buttonValue);?>" href="registrationpage.php">Registration Page</a></li>
        <li><a class="<?php echo htmlspecialchars($buttonValue);?>" href="userlistpage.php">User List</a></li>
        <li><a class="<?php echo htmlspecialchars($buttonValue);?>" href="uploadimagepage.php">Upload Image <i class="fas fa-upload"></i></a></li>
        <li><a class="cred_btns" id="login_btn"type="button" onclick="callAjax()" name="login_btn">Login</a></li>
        <li><a class="cred_btns"id="registration_btn"  href="signupform.php" type="button"  name="registration_btn">Sign Up</a></li>
        <?php if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) echo '<li><a class="cred_btns" id="logout_btn"type="button" href="../backend/logout.php" name="logout_btn">Logout</a></li>';?>
      </ul>
    </div>


    <div class="wrapper">
    <!--  <button onclick="callAjax()" stype="button" name="button">press</button> -->

      <div id="pageholder">

      </div>
    <!--  <div class="acess_wrapper">
        <a class="cred_btns" id="login_btn"type="button" name="login_btn">Login</a>
        <a class="cred_btns"id="registration_btn"  href="signupform.html" type="button"  name="registration_btn">Sign Up</a>
      -->
      </div>


  <!--  <div class="login">
        <form class="" action="index.html" method="post">
          <label for="username">Username</label>
          <input type="text" name="username" value="">

          <label for="password">password</label>
          <input type="password" name="password" value="">
        </form>
      </div> -->
      <article class="text_info">
        <h2>Hello</h2>

        <p><?php   if(isset($_SESSION['username'])){
          echo "Loged in user is: ".$_SESSION['username'];
        }
          ?></p>
      </article>

    </div>
    <script src="../scripts/ajaxTest.js">

    </script>
  </body>
</html>
