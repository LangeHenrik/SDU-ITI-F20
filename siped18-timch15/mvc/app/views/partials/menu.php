<html>

<head>
    <title>ITI Ass.2</title>
    <meta name="viewport"  content="width=device-width, initial-scale=1.0" />
    <!-- <link rel="stylesheet" type="text/css" href="/siped18-timch15/mvc/public/style.css"> -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

</head>

<body>


    <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']) { ?>

        <ul class="navbar navbar-expand-lg navbar-light bg-light">
            <li class="nav-item"><a href="/siped18-timch15/mvc/public/upload">Upload page</a></li>
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

    <div class="wrapper">
        <div class="content">