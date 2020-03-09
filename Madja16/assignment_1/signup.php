<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="header.css">
        <meta name="description" content="test meta description">
        <meta name=viewport content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" 
        integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    </head>
    <body>
        <div class="wrapper-main">
                <h1>Signup</h1>
                <?php

                // Giving feedback to the user about what mistake they made when signing up
                if (isset($_GET['error'])) {
                    if ($_GET['error'] == "emptyfields") {
                        echo '<p>Fill in all fields</p>';
                    }
                    else if ($_GET['error'] == "passwordcheck") {
                        echo '<p>Your passwords do not match</p>';
                    }
                }
                ?>
                <form action="signup.inc.php" onsubmit="return checkform()" method="POST">
                    <input type="text" id="username" name="username" placeholder="Username" onkeyup="checkname_ajax(this.value)">
                    <input type="password" id="pwd" name="pwd" placeholder="Password">
                    <input type="password" id="pwd-confirm" name="pwd-confirm" placeholder="Confirm Password">
                    <button type="submit" name="signup-submit">Signup</button>
                </form>
                <span id="check_username"></span>

        </div>
        <script src="check_username_ajax.js"></script>
        <script src="validate.js"></script>
    </body>
</html>




