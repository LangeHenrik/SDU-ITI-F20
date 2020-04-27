<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="<?php echo DOC_ROOT; ?>/css/styling.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Registration Page</title>

</head>
<body>
<h1>Register page</h1>
<div id="frm">
    <form   method="POST" action="/qanuu18/mvc/public/home/register">
        <p>
            <label>Register Now!</label>
        </p>
        <label for="username">New username:</label>

        <input type="text" id="username" name="username" placeholder="Username" onKeyUp="checkusername()"  required>
        <p class="usernameInfo" id="usernameInfo"></p>

        <label for="password">New password:</label>

        <input type="password" id="password" name="password" placeholder="Password" onKeyUp="checkpassword()"   required>
        <p class="passwordInfo" id="passwordInfo"> </p>
                
        <input type="submit" name="submitbtn" id="submit" value="Register" class="registerbtn">
       
    </form>
</div>
<script src="<?php echo DOC_ROOT; ?>/js/Registration.js"></script>




</body>



</html>
