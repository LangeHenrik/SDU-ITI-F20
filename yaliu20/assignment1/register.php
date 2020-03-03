<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <title>Pics</title>
    <link rel="stylesheet" href="SignUpStyle.css">
    <script type="text/javascript">

function validate_username(username) {
  //定义正则表达式的变量:id正则
  var uesernameReg = /^[a-zA-Z0-9_-]{4,16}$/;
  //console.log(username);
  if (username != "" && username.search(uesernameReg) != -1) {
    document.getElementById("test_username").innerHTML = "<font color='green' size='2px'>correct</font>";
  } else {
    document.getElementById("test_username").innerHTML = "<font color='red' size='2px'>username should be 4-16 long</font>";
  }
}
function validate_email(email) {
  //定义正则表达式的变量:邮箱正则
  var emailReg = /^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/;
  if (email != "" && email.search(emailReg) != -1) {
    document.getElementById("test_email").innerHTML = "<font color='green' size='2px'>correct</font>";
  } else {
    document.getElementById("test_email").innerHTML = "<font color='red' size='2px'>wrong email format</font>";
  }
}

function validate_password2(password2) {
  var password = document.getElementById("password").value;

  if (password == "") {
    document.getElementById("is_test_pw").innerHTML = "<font color='red' size='2px'>cannot be empty</font>";
  } else if (password == password2) {
    document.getElementById("is_test_pw").innerHTML = "<font color='green' size='2px'>correct</font>";
  } else {
    document.getElementById("is_test_pw").innerHTML = "<font color='red' size='2px'>Two input password must be consistent</font>";
    console.log("enter the password");
  }
}

    </script>
</head>
<body>
<div class="sign-div">
    <form class="" method="post">
        <h1>SIGN UP NOW</h1>
        <table>
            <tr> 
              <td><input class="sign-text" name="username" id="username" type="text" placeholder="username" onblur="validate_username(this.value)"></td>
              <td id="test_username"></td>
            </tr>
            <tr>
                <td> <input class="sign-text" id="email" name="email" type="text" placeholder="email" onblur="validate_email(this.value)" /></td>
                <td id="test_email"></td>
            </tr>
            <tr> <td><input class="sign-text" id="password" name="password" type="password" placeholder="password"></td>
                <td id="test_pw"></td>
            </tr>
            <tr> <td><input class="sign-text" id="password2" type="password" placeholder="confirm the password" onblur="validate_password2(this.value)"/ ></td>
        <td id="is_test_pw"></td></tr>
        <tr><td><input class="sign-btn" type="submit" name="submit" value="Sign up"></td></tr>
        </table>
        
    </form>
 
</div>
<?php
if(isset($_POST["submit"]))
{
    include("config.php");
    
    $usr=$_POST["username"];
    $pwd=$_POST["password"];
    $mail=$_POST["email"];


    $sql = "insert into userinfo values('$usr','$mail','$pwd');";
    $stmt=$dbh->query("select username from userinfo where username='$usr';");
    //执行查询语句
    $row=$stmt->fetch(PDO::FETCH_BOTH);
    if(empty($row[0]))//判断是否存在
    {
        $dbh->exec($sql);
        $dbh = null;
?>
        <script>
        alert ("success");
        window.location.href="frontpage.php";
        </script>
<?php   
    }
    else
    {
        $dbh = null;
?>
        <script>
        alert ("the username exist");
        </script>
<?php
    }
}
?>

 
</body>
</html>