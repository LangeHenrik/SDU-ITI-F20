<!doctype html>
<html lang="en">
 <head>
  <meta charset="UTF-8">
  <title>pics</title>
 </head>
 <body>
<center>
<h2>Upload</h2>

<form action="upload2.php" method="post" enctype="multipart/form-data">
upload a picture
<input type="file" name="pic">
<input type="submit" name=submit value="upload">
<input type="button" class="btn btn-primary" name="link" value="userlist" onclick="javascript:location.href='userlist.php'">
<input type="button" class="btn btn-primary" name="image" value="image feed" onclick="javascript:location.href='image feed.php'">
<input type="button" class="btn btn-primary" name="logout" value="log out" onclick="javascript:location.href='frontpage.php'">
</form>

</center>
 </body>
</html>
