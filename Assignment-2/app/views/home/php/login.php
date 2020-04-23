<?php
require 'config.php';

if (isset($_POST['login'])) {

  $Password = filter_var($_POST['Password'], FILTER_SANITIZE_STRING);
  $Email = filter_var($_POST['Email'], FILTER_SANITIZE_STRING);
  echo '<script>console.log("'. $Email .'"); </script>'; 

  
  try {
    // Connect and set PDO error to exception
    $db = new PDO($PDO_CONFIG, $DB_USERNAME, $DB_PASSWORD);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql2 = "SELECT * FROM jumar18_micpe18_mihen13.user WHERE t@t.dk = Email;";
    $sql = "SELECT * FROM jumar18_micpe18_mihen13.user WHERE Email = :Email";
    echo '<script>console.log("'. $sql .'"); </script>'; 
    echo '<script>console.log("'. $sql2 .'"); </script>'; 
    


    if($statement = $db->prepare($sql)) {
      $statement->bindParam(":Email", $Email, PDO::PARAM_STR);
      if($statement->execute()) {
        if($statement->rowCount() == 1) {
          if($row = $statement->fetch()) {
            $id = $row["ID"];
            $username = $row["Username"];
            $hashed_password = $row["Password"];
            $res = password_verify($Password, $hashed_password);
            
            if(password_verify($Password, $row["Password"])) {
              $_SESSION["loggedin"] = true;
              $_SESSION["id"] = $id;
              $_SESSION["username"] = $username;
              echo("<script>location.href = 'xx/mvc/public/home/users';</script>");
            } else {
              echo '<script>console.log("Error in login"); </script>'; 
            }
            
          }
        }
      }
    }
  } catch (PDOException $e) {
    echo "Login error: " . $e->getMessage();
  }
}
?>
<div class="bg" id="modalBackground">

  <div class="container" id="container">
    <div id="closeButton" onclick="closeModal()">
      <i class="fas fa-window-close"></i>
    </div>
    <div class="form-container sign-up-container">
      <?php
      require "registration.php";
      ?>
    </div>
    <div class="form-container sign-in-container">
      <form method="POST" action="../../../../../../index.php">
        <h1>Sign in</h1>
        <input type="email" placeholder="Email" name="Email" />
        <input type="Password" placeholder="Password" name="Password" />
        <a href="#">Forgot your password?</a>
        <button type="submit" name="login">Sign In</button>
      </form>
    </div>
    <div class="overlay-container">
      <div class="overlay">
        <div class="overlay-panel overlay-left">
          <h1>Welcome Back!</h1>
          <div class="overlay-text">
            <p>To keep connected with us please login with your personal info</p>
          </div>
          <button class="ghost" id="signIn">Sign In</button>
        </div>
        <div class="overlay-panel overlay-right">
          <h1>Hello, Friend!</h1>
          <div class="overlay-text">
            <p>Enter your personal details and start journey with us</p>
          </div>
          <button class="ghost" id="signUp">Sign Up</button>
        </div>
      </div>
    </div>
  </div>
</div>