<?php

require_once "config.php";
 
$u_name = $password = $confirm_password = "";
$u_name_err = $password_err = $confirm_password_err = "";
 
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    if(empty(trim($_POST["u_name"]))){
        $u_name_err = "Please enter a u_name.";
    } else{
     
        $sql = "SELECT id FROM users WHERE u_name = :u_name";
        
        if($stmt = $pdo->prepare($sql)){
            
            $stmt->bindParam(":u_name", $param_u_name, PDO::PARAM_STR);
            
            $param_u_name = trim($_POST["u_name"]);
            
            if($stmt->execute()){
                if($stmt->rowCount() == 1){
                    $u_name_err = "prøv ny brugernavn";
                } else{
                    $u_name = trim($_POST["u_name"]);
                }
            } else{
                echo "Der er en fejl";
            }

            unset($stmt);
        }
    }
    
    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }
    
    if(empty($u_name_err) && empty($password_err) && empty($confirm_password_err)){
        
        $sql = "INSERT INTO users (u_name, password) VALUES (:u_name, :password)";
         
        if($stmt = $pdo->prepare($sql)){
           
            $stmt->bindParam(":u_name", $param_u_name, PDO::PARAM_STR);
            $stmt->bindParam(":password", $param_password, PDO::PARAM_STR);
            
      
            $param_u_name = $u_name;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            
      
            if($stmt->execute()){
                // login page
                header("location: login.php");
            } else{
                echo "Something went wrong. Please try again later.";
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
    <a href="register.php">Home</a>
    <a href="login.php">Login</a>
    <a href="register.php">Register</a>
   
    
  </div>

<div>
  <h2>Registration form</h2>
   
</div>
    <div class="wrapper">
       
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div  <?php echo (!empty($u_name_err)) ? 'has-error' : ''; ?>">
                <label>user name</label><br>
                <input type="text" name="u_name" value="<?php echo $u_name; ?>"  onkeyup="showHint(this.value)"><span id="txtHint"></span>
                <span><?php echo $u_name_err; ?></span>
            </div>    
</br>
            <div  <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>Password</label><br>
                <input type="password" name="password"  value="<?php echo $password; ?>">
                <span ><?php echo $password_err; ?></span>
            </div>
            </br>
            <div  <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                <label>Confirm Password</label><br>
                <input type="password" name="confirm_password" value="<?php echo $confirm_password; ?>">
                <span ><?php echo $confirm_password_err; ?></span>
            </div>
            </br>
            <div >
                <input type="submit" value="Submit">
                <input type="reset" value="Reset">
            </div>
            </br>
          
        </form>

</body>


</html>

