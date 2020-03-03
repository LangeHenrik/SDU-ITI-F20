<!DOCTYPE html>
<html lang = "en">
<head>
  <!-- basic.html -->
  <title>Title of the document</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="myscripts.js"></script>
<link rel="stylesheet" type="text/css" href="style.css">
  <meta charset = "UTF-8" />
</head>
<body>
    <div class="header">
        <ul class="menu">
        <li> <a href=#>Login</a></li>
        <li> <a href=#>Register</a></li>
        <li> <a href=#>Upload</a></li>
        <li> <a href=#>Image Feed</a></li>
        <li> <a href=#>User List</a></li>
        </ul>
    </div>
    <div class="wrapper">
        <div class="content">
            <form action="submit">
                <label for="username">Username:</label>
                <br/>
                <input type="text" name="username" id="username">
                <br/>
                <label for="password">Password:</label>
                <br/>
                <input type="password" name="password" id="password">
                <br/>
                <button type="submit" value="Log in">Log In</button>
            </form>
        </div>
    </div>

</body>
</html>