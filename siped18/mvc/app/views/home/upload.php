<html>
<head>
    <title>Semester feed</title>
    <link rel="stylesheet" href="/siped18/mvc/public/styles/style.css">
</head>
<body>
    <div class="navbar">
    <a href="Frontpage.php">Front page</a>
    <a href="Registrationpage.php">Registration</a>
    <a href="Imagepage.php">Images</a>
    <a href="Uploadpage.php">Upload</a>
    <a href="Userlist.php">Users</a>
    </div>

    <div class="login-page">
        <div class="form">
            <h1 class="text-center">Please insert new image</h1>
            <form method="post" action='' enctype="multipart/form-data">
                <label>Username</label>
                <input type="text" name="user_name" class="from-control" required=""><br>
                <label>Image</label> 
                <input type="file" name="profile" class="from-control" required="" accpet= "*/image" multiple><br>
                <button type='submit' name='submit'>Add new image</button>
            </form>
        </div>
    </div>
      
</body>
</html>