<!DOCTYPE html>
<html>   
    <head>        
        <title>Create Account</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="/javascript/javascript.js"></script>
        <link rel="stylesheet" type="text/css" href="/CSS/stylesheet.css">
    </head>
    <body>
        <form onsubmit="event.preventDefault(); checkform();" method="post">
            <label for="name">Name</label>
            <br>
            <input type="text" name="name" id="name"/>
            <br>
            <label for="password">Password</label>
            <br>
            <input type="password" name="password" id="password"/>
            <br>
            <label for="phone">Phone Number</label>
            <br>
            <input type="text" name="phone" id="phone"/>
            <br>
            <label for="email">Email Adress</label>
            <br>
            <input type="text" name="email" id="email"/>
            <br>
            <input type="submit" name="submit" id="submit" value="Create"/>
            </form>
    </body>
</html>