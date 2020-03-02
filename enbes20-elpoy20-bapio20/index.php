<?php
if(isset($_POST['formConnexion'])) {
  require('config.php');

   $username = htmlspecialchars($_POST['usernameCon']);
   $password = $_POST['passwordCon'];
   if(!empty($username) AND !empty($password)) {

     $stmt = $db->prepare('SELECT id_user, password, email FROM user WHERE username = :username');
     $stmt->bindParam(':username', $username, PDO::PARAM_INT);

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
		<div class="title">LOGIN </br>
		</div>

		<form method="post" action="">

			<div class="form">

			 <label for="username"> </label>

				<input type="text" class="form-control" name="usernameCon" placeholder="Username" /> <br />

				 <label for="password"> </label>
				<input type="password" class="form-control" name="passwordCon" placeholder="Password"  /> <br />

				<input type="submit" class="btn btn-primary" name="formConnexion" value="Connect"/>

				Create an account - <a href="registration.php">Sign In </a> <br />
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
