<html>
    <head>
        <title>ITI - Assignment 2</title>
        <script src="../js/js.js"></script>
        <script src="../js/regExRegistration.js"></script>
        <link rel="stylesheet" href="../css/styling.css">
    </head>
    <body>
        <div class="Menu">
            <ul class=menu-bar>

                <li><a href="/rasmt18_soepe16_matry18/mvc/public/Home/">Frontpage</a></li>
                <li><a href="/rasmt18_soepe16_matry18/mvc/public/Home/register">Registration</a></li>
                <?php if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']) : ?>
                <li><a href="/rasmt18_soepe16_matry18/mvc/public/Image/">Image feed</a></li>
                <li><a href="/rasmt18_soepe16_matry18/mvc/public/Image/upload">Upload</a></li>
                <li><a href="/rasmt18_soepe16_matry18/mvc/public/User/">Userlist</a></li>
                <li><a href="/rasmt18_soepe16_matry18/mvc/public/Home/logout">Logout</a></li>
                <?php endif; ?>
            </ul>
        </div>

