<!DOCTYPE html>
<html>
    <head>
        <title>PHP login</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css" media="all">
    </head>
    <body>
        <form action=# method="post" accept-charset="utf-8">
            <fieldset id="fieldset_legend">
                <legend>Fieldset legend</legend>
                <table>
                    <tr>
                        <td><label>Username:</label></td>
                        <td><input type="text" name="username" id="username" value=""></td>
                    </tr>
                    <tr>
                        <td><label>Password:</label></td>
                        <td><input type="password" name="password" id="password" value=""></td>
                    </tr>
                </table>
                <button>Submit button<i class="fa fa-battery-full" aria-hidden="true"></i></button>
            </fieldset>
        </form>
    </body>
</html>

<?php

if($_POST["username"] == "john" && $_POST["password"] == "topsecret")
{
    echo "Welcome!";
}
else
{
    echo "Incorrect username or password";
}
?>
