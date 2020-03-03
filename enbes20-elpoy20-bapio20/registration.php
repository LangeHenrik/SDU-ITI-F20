<?php include('header.php');

if (isset($_POST['formRegistration'])) {

  require('config.php');

  $username = htmlspecialchars($_POST['username']);
  $email = htmlspecialchars($_POST['email']);
  $password = $_POST['password'];
  $password2 = $_POST['password2'];

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
              $error = "Account Created ! <a href=\"index.php\">Log in</a>";

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
				<label class="control-label" for="username"></label>
				<input type="text" class="form-control" name="username" placeholder="Username" value="<?php if(isset($username)) { echo $username; } ?>" /> <br />

				<label class="control-label" for="password"></label>
				<input type="password" class="form-control" name="password" placeholder="Password"  /> <br />

				<label class="control-label" for="password2"></label>
				<input type="password" class="form-control"  name="password2"  placeholder="Retype password" /> <br />

				<label class="control-label" for="email"></label>
				<input type="email" class="form-control" name="email" placeholder="Email" value="<?php if(isset($email)) { echo $email; } ?>" /> <br />

				<input type="submit" class="btn btn-primary" name="formRegistration" value="Subscribe"  /> <br />
			</div>

		</form>
<?php
      if(isset($error)) {
         echo '<font color="red">'.$error."</font>";
      }
?>
	</div>
</div>
<?php include('footer.php') ?>
