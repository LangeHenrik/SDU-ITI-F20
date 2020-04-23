<html>

<head>
    <title>ITI Ass.2</title>
    <meta name="viewport"  content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="/siped18-timch15/mvc/public/style.css">
</head>

<body>


    <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']) { ?>

        <ul class="menu">
            <li><a href="/siped18-timch15/mvc/public/upload">Upload page</a></li>
            <li><a href="/siped18-timch15/mvc/public/imagefeed">Image feed</a></li>
            <li><a href="/siped18-timch15/mvc/public/userlist">User list</a></li>
            <form method="POST" action="/siped18-timch15/mvc/public/home/logout">
                <input type="submit" name="logout" class="logout" value="Logout">
            </form>
        </ul>

    <?php } else { ?>

        <ul class="menu">
            <li><a href="/siped18-timch15/mvc/public/">Frontpage</a></li>
            <li><a href="/siped18-timch15/mvc/public/registration">Registration page</a></li>
        </ul>

    <?php } ?>