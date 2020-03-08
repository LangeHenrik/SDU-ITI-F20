<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Pics</title>
    <link rel="stylesheet" href="SignInStyle.css">
 
</head>
<body>
<div class="sign-div">
    <form class="" method="post">
        <h1>PICS</h1>
        <input class="sign-text" type="text" name="username" placeholder="username" >
        <input class="sign-text" type="password" name="password" placeholder="password">
        <input class="sign-btn"  name="submit" type="submit" value="Log in">
        <input class="sign-btn" name="register" type="submit" value="Sign up">
    </form>
 
</div>
<?php
if(isset($_POST["submit"]))//只用submit存在才能执行
{
    include("config.php");
    $usr=$_POST["username"];
    $pwd=$_POST["password"];
    //  $_POST[" NAME "]  获取post到php的name="NAME"的值
    //  $_GET[" NAME"]  同上，为get的值
    $cusr=$dbh->query("select username from userinfo where username='$usr';");
    $cpwd=$dbh->query("select username from userinfo where username='$usr' and password='$pwd';");
    //执行查询语句
    $row1=$cusr->fetch(PDO::FETCH_BOTH);
    //$row1为cusr执行后将返回结果转换成行数组格式
    $row2=$cpwd->fetch(PDO::FETCH_BOTH);
    if(empty($row1[0]))//若为空则表示没有匹配到任何条目
    {
        $dbh=null;//断开数据库
    ?>
<script>
        alert ("username does not exist");
        login.onreset();
        </script>
<?php       
    }
    else if(empty($row2[0]))//同上
    {
        $dbh=null;
    ?>
<script>
        alert ("Incorrect username or password");
        login.onreset();
        </script>
<?php
    }
    else
    {
        $dbh=null;
    ?>
<script>
        alert ("welcome  <?php echo $usr;?>");
        window.location.href="upload.php";
        </script>
<?php
    }
}
 ?> 
<?php
if(isset($_POST["register"])){
    ?>
<script>
        window.location.href="register.php";
        </script>
<?php
}  ?>

</body>
</html>