<!DOCTYPE html>
<html>
<head>
<title>Title of the document</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="RegexInputChecker.js"></script>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<!--Comment-->
<body>
    <form method="post">
        <label for="name" id="namelabel">name</label>
        <br>
        <input type="text" name="name" id="name" onblur="return checkName()"/>
        <label for="name" id="okName"></label>
        <br>
        <label for="username">phone number</label>
        <br>
        <input type="text" name="username" id="username" onblur="return checkUserName()"/>
        <label for="username" id="okUserName"></label>
        <br>
        <label for="password">password</label>
        <br>
        <input type="password" name="password" id="password" onblur="return checkPassword()"/>
        <label for="password" id="okPassword"></label>
    </form>
</body>
</html>