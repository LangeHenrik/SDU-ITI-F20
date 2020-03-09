<?php

require_once "config.php";
$u_name = $password = "";
$u_name_err = $password_err = "";
 
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    if(empty(trim($_POST["u_name"]))){
        $u_name_err = "Please enter username.";
    } else{
        $u_name = trim($_POST["u_name"]);
    }
    
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    if(empty($u_name_err) && empty($password_err)){
        
        $sql = "SELECT id, u_name, password FROM users WHERE u_name = :u_name";
        
        if($stmt = $pdo->prepare($sql)){
           
            $stmt->bindParam(":u_name", $param_u_name, PDO::PARAM_STR);
            
            $param_u_name = trim($_POST["u_name"]);
            
            
            if($stmt->execute()){
             
                if($stmt->rowCount() == 1){
                    if($row = $stmt->fetch()){
                        $id = $row["id"];
                        $u_name = $row["u_name"];
                        $hashed_password = $row["password"];
                        if(password_verify($password, $hashed_password)){
                            session_start();
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["u_name"] = $u_name;                            
                            header("location: welcome.php");
                        } else{
                            $password_err = "The password you entered was not valid.";
                        }
                    }
                } else{
                    $u_name_err = "No account found with that user name.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
            unset($stmt);
        }
    }
    
    unset($pdo);
}
?>
 

 <!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<script type="application/javascript" src="js/script.js">   
</script>
<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body class="content">

  <div class="topnav">
  
    <a href="login.php">Home</a>

    <a href="register.php">Register</a>
   
    
  </div>

<div>
    <div class="wrapper">
        <h2>Login</h2>
        <p>Insert your Login and Password</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div  <?php echo (!empty($u_name_err)) ? 'has-error' : ''; ?>>
                <label>Username</label><br>
                <input type="text" name="u_name" placeholder="username">
                <span ><?php echo $u_name_err; ?></span>
            </div>   
</br> 
            <div  <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>>
                <label>Password</label><br>
                <input type="password" name="password" placeholder="password">
                <span><?php echo $password_err; ?></span>
            </div>
            </br> </br> 
            <div>
                <input type="submit"  value="Login">
            </div>
         
        </form>
        </div>

</body>
</html>
