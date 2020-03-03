<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>userlist</title>
<link rel="stylesheet" href="userlist.css">
</head>

<body>
<h3>userlist</h3>

<?php
try{
    include("config.php");
    $rst=$dbh->query("select username,email from userinfo");
    //$rst->execute();
    ?>
    <table width="100%" border="1" class="table" cellpadding="0" cellspacing="0">
    <tr>
        <td>username</td>
        <td>email</td>
    </tr>
    <?php
    while($rstInfo=$rst->fetch()){
    ?>
    <tr>
        <td><?php echo $rstInfo["username"]; ?></td>
        <td><?php echo $rstInfo["email"]; ?></td>
    </tr>
    <?php
    }
}
        catch(Exception $e){

            die("Error!:".$e->getMessage().'<br>');
        }
?>

  
</table>
</body>
</html>
