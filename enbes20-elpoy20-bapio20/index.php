<?php

session_start();
if(isset($_SESSION['id'])){
   header("Location:feed.php?id=".$_SESSION['id']);
}

if(isset($_POST['formConnexion'])) {
  require('config.php');

   //clean input  & XSS
   $usernameCon = filter_var($_POST['usernameCon'], FILTER_SANITIZE_STRING);
   $username = htmlspecialchars($usernameCon);
   $passwordCon = filter_var($_POST['passwordCon'], FILTER_SANITIZE_STRING);
   $password = htmlspecialchars($passwordCon);

   if(!empty($username) AND !empty($password)) {

     $stmt = $db->prepare('SELECT id_user, password, email FROM user WHERE username = :username');
     $stmt->bindParam(':username', $username, PDO::PARAM_STR);

     $stmt->execute();
     $res = $stmt->fetch();
     $isPasswordCorrect = password_verify($password, $res['password']);

     if(!$res){
       $error = "Wrong credentials 1";
     }
     else{
       if($isPasswordCorrect){
         session_start();

         //session_start();
         $_SESSION['id'] = $res['id_user'];
         $_SESSION['username'] = $username;
         $_SESSION['mail'] = $res['email'];
         //var_dump($res);
         header("Location: feed.php?id=".$_SESSION['id']);
       }
       else{
         $error = "Wrong credentials 2";
       }
     }
   }
   else{
     $error = "Complete all fields";

   }
}
include('header.php');

?>

<div id="main-content" >
	<div class="container">
		<div class="title">LOGIN</br>
		</div>

		<form method="post" action="">

			<div class="form">

			 <label for="username"> </label>

				<input type="text" name="usernameCon" placeholder="Username"/> <br />

				 <label for="password"> </label>
				<input type="password" name="passwordCon" placeholder="Password"/> <br />

				<input type="submit" class="btn" name="formConnexion" value="Connect"/> Create an account - <a href="registration.php">Sign In </a> <br />
			</div>

		</form>
    <?php
         if(isset($error)) {
            echo '<p id="verif_fail">'.$error."</p>";
         }
         ?>
	</div>
</div>
<?php include('footer.php') ?>
