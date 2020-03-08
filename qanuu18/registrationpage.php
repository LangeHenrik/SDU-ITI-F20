<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="extfiles/styling.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<title>Registration Page</title>

</head>
<h1>Register page</h1>
<div id="frm">
    <form onsubmit=return checkallforms(); name="registrate" method="POST" action="insertusertodatabase.php">
        <p>
            <label>Register Now!</label>
        </p>
        <label for="usernameInput">New username:</label>

        <input type="text" id="usernameInput" name="usernameInput" value="">
        <p class="usernameInfo" id="usernameInfo "></p>

        <label for="passwordInput">New password:</label>

        <input type="password" id="passwordInput" name="passwordInput" value="">
        <p class="passwordInfo" id="passwordInfo"></p>

        <input type="submit" name="registrate" id="submit" value="Register">
    </form>
</div>
<script src="extfiles/Registration.js "></script>

</body>

</html>