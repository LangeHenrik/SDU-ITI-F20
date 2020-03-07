<?php
if ( ! session_id() ) {

  session_start();
  echo '<script>console.log("Session start"); </script>'; 
  
  }
require 'config.php';

// If upload login is clicked ...
if (isset($_POST['login'])) {
  // Get email
  //$Email = htmlentities($_POST['Email']);
  // Get password
  //$Password = base64_encode(htmlentities($_POST['Password']));

  $Password = htmlentities($_POST['Password']);
  
  try {
    // Connect and set PDO error to exception
    $db = new PDO("mysql:host=$DB_SERVER;port=3307;dbname=$DB_DATABASE", $DB_USERNAME, $DB_PASSWORD);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Get USERNAME and PASSWORD where E-MAIL is matching
    //$result = $db->prepare("SELECT * FROM jumar18_micpe18_mihen13.user WHERE 'md@md.dk' = Email")->execute();
    //$sql = "SELECT * FROM jumar18_micpe18_mihen13.user WHERE 'md@md.dk' = Email;";
    //$result = mysqli_query($db,$sql);
    $sql = "SELECT * FROM jumar18_micpe18_mihen13.user WHERE 't@t.dk' = Email;";
    echo '<script>console.log("1"); </script>'; 

    if($statement = $db->prepare($sql)) {
      echo '<script>console.log("2"); </script>'; 
      if($statement->execute()) {
      echo '<script>console.log("3"); </script>'; 
        if($statement->rowCount() == 1) {
          echo '<script>console.log("4"); </script>'; 
          if($row = $statement->fetch()) {
            echo '<script>console.log("5"); </script>'; 
            $id = $row["ID"];
            $username = $row["Username"];
            $hashed_password = $row["Password"];
            echo '<script>console.log("'. $hashed_password .'"); </script>'; 
            echo '<script>console.log("'. $Password .'"); </script>'; 
            $res = password_verify($Password, $hashed_password);
            echo '<script>console.log("'. password_verify($Password, $hashed_password) .'"); </script>'; 
            
            if(password_verify($Password, $row["Password"])) {
              echo '<script>console.log("7"); </script>'; 
              $_SESSION["loggedin"] = true;
              $_SESSION["id"] = $id;
              $_SESSION["username"] = $username;
              echo '<script>console.log("All good"); </script>'; 
              //header("location: index.php");
            } else {
              echo '<script>console.log("Login error script"); </script>'; 
            }
            
          }
        }
      }
    }
    

    
   


    echo '<script>console.log("'. "Hello" .'"); </script>'; 
    echo '<script>console.log("After result"); </script>'; 
    

    


    // Check PASSWORD with PASSWORD
    // Password hash from DB is checked in PHP
    // password_verify($pw_input, $pw_hash_DB

    // If login matches -> Save login state in session();
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
      <form method="POST" action="../index.php">
        <h1>Sign in</h1>
        <input type="email" placeholder="Email" />
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