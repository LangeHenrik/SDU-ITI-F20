<?php include('header.php');

if (isset($_POST['formRegistration'])) {

  require('config.php');

  $usernameReg = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
  $username = htmlspecialchars($usernameReg);

  $emailReg = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
  $email = htmlspecialchars($emailReg);

  $passwordReg = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
  $password = htmlspecialchars($passwordReg);

  $password2Reg = filter_var($_POST['password2'], FILTER_SANITIZE_STRING);
  $password2 = htmlspecialchars($password2Reg);

  if(!empty($username) AND !empty($email) AND !empty($password)) {

    $passwordCheck = preg_match('/^(?=.*?[A-Z])(?=(.*[a-z]){1,})(?=(.*[\d]){1,})(?=(.*[\W]){1,})(?!.*\s).{8,}$/', $password);
    $mailCheck=preg_match('/^\S+@\S+\.[a-z|A-Z]{2,10}$/', $email);

    if($passwordCheck) {

      if ($mailCheck) {

        require("checkFunctions.php");

        $U = checkUsernameDB($username);
        $M = checkMailDB($email);
        if($U != 1){

          if ($M != 1){

            if($password == $password2) {
              $passhash = password_hash($_POST['password'], PASSWORD_DEFAULT);
              $stmt= $db->prepare("INSERT INTO user (username, password, email) VALUES ( ?, ?, ?)");
              $stmt->execute(array($username, $passhash, $email));
              $ok = "Account Created ! <a href=\"index.php\">Log in</a>";
            }

            else {
              $error = "Password not match";
            }
          }

          else {
          $error = "Already registred with this email";
          }

        }

        else {
          $error = "Username already taken";
        }

      }

      else {
        $error ="Invalid email";
      }
    }

    else {
      $error="Check your password";
    }
  }

  else {
    $error = "You need to fill all the fields";
  }
}

?>
<div id="main-content">
	<div class="container">
		<div class="title">FILL THE FIELDS BELLOW</div>

		<form method="post" action="">

			<div class="form">
				<label for="username"></label>
				<input type="text" name="username" placeholder="Username" value="<?php if(isset($username)) { echo $username; } ?>" /> <br />

				<label for="password"></label>
				<input type="password" name="password" placeholder="Password"  /> <br />

				<label for="password2"></label>
				<input type="password" name="password2"  placeholder="Retype password" /> <br />

				<label for="email"></label>
				<input type="email" name="email" placeholder="Email" value="<?php if(isset($email)) { echo $email; } ?>" /> <br />

				<input type="submit" class="btn" name="formRegistration" value="Subscribe"/> <br />
        <?php
              if(isset($error)) {
                 echo '<p id="verif_fail">'.$error."</p>";
              }
              if(isset($ok)){
                echo '<p id="verif_ok">'.$ok."</p>";
              }

        ?>
      </div>
		</form>
	</div>
</div>
<?php include('footer.php') ?>
