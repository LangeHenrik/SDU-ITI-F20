<html>
    <head>
        <title>Title of the document</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="RegexInputChecker.js"></script>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
<!--Comment-->
    <body onload="findUsers('')">
        <div class="userform">
            <form>
                Find user: <input type="text" onkeyup="findUsers(this.value)" >
            </form>
            <div>
                <table id="users">
                </table>
            </div>

        </div>
    </body>
</html>