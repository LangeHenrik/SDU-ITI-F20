<html>
    <head>
        <title>ITI - Assignment 2</title>
        <script src="../js/regExRegistration.js"></script>
        <script src="../js/ajax.js"></script>
        
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" 
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <ul class="navbar-nav mr-auto">
                <?php if(!isset($_SESSION['logged_in'])) : ?>
                <li class="nav-item"><a class="nav-link" href="/rasmt18_soepe16_matry18/mvc/public/User/login">Frontpage</a></li>
                <li class="nav-item"><a class="nav-link" href="/rasmt18_soepe16_matry18/mvc/public/User/register">Registration</a></li>
                    <?php elseif(isset($_SESSION['logged_in']) && $_SESSION['logged_in']) : ?>
                    <li class="nav-item"><a class="nav-link" href="/rasmt18_soepe16_matry18/mvc/public/Image/">Image feed</a></li>
                    <li class="nav-item"><a class="nav-link" href="/rasmt18_soepe16_matry18/mvc/public/Image/upload">Upload</a></li>
                    <li class="nav-item"><a class="nav-link" href="/rasmt18_soepe16_matry18/mvc/public/User/">Userlist</a></li>
                    <li class="nav-item"><a class="nav-link" href="/rasmt18_soepe16_matry18/mvc/public/User/logout">Logout</a></li>
                <?php endif; ?>
            </ul>
        </nav>

