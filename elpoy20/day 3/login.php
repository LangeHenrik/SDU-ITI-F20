


<?php
  $correct_username = "joe";
  $correct_password = "pass";

  //$username = filter_var ($_POST["uname"], FILTER)
  //$password = filter_var ($_POST["psw"])


  $username = $_POST['username'];
  $password = $_POST['password'];

  if (session_status() == PHP_SESSION_NONE){
    session_start();
  }

  if($username == $correct_username && $password == $correct_password){
    $_SESSION['logged_in'] = true;
    echo 'wrong username or password';
  }
    else {
    $_SESSION['logged_in'] = false;
    echo 'wrong username or password';
    }

    echo $username;
    echo $password;
 ?>



 <form  method="post">
   <div class="imgcontainer">
     <img src="avatar.png" alt="Avatar" class="avatar">
   </div>

   <div class="container">
     <label for="uname"><b>Username</b></label>
     <input type="text" placeholder="Enter Username" name="uname" required>

     <label for="psw"><b>Password</b></label>
     <input type="password" placeholder="Enter Password" name="psw" required>

     <button type="submit">Login</button>
     <label>
       <input type="checkbox" checked="checked" name="remember"> Remember me
     </label>
   </div>

   <div class="container" style="background-color:#f1f1f1">
     <button type="button" class="cancelbtn">Cancel</button>
     <span class="psw">Forgot <a href="#">password?</a></span>
   </div>
 </form>
