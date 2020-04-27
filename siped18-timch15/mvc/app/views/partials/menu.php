<html>

<head>
    <title>ITI Ass.2</title>
    <meta name="viewport"  content="width=device-width, initial-scale=1.0" />
    <!-- <link rel="stylesheet" type="text/css" href="/siped18-timch15/mvc/public/style.css"> -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

</head>

<body onKeyPress="return keyPressed(event)">

    <nav class="navbar navbar-expand-sm navbar-dark bg-primary">
        <a class="navbar-brand" href="#">Assignment 2</a>
        <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']) { ?>
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active"><a class="nav-link" href="/siped18-timch15/mvc/public/upload">Upload page</a></li>
                <li class="nav-item active"><a class="nav-link" href="/siped18-timch15/mvc/public/imagefeed">Image feed</a></li>
                <li class="nav-item active"><a class="nav-link" href="/siped18-timch15/mvc/public/userlist">User list</a></li>
                <form class="form-inline my-2 my-lg-0 float-right" method="POST" action="/siped18-timch15/mvc/public/home/logout">
                    <input class="btn btn-secondary" type="submit" name="logout" value="Logout">
                </form>
            </ul>
        <?php } else { ?>
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active"><a class="nav-link" href="/siped18-timch15/mvc/public/">Frontpage</a></li>
                <li class="nav-item active"><a class="nav-link" href="/siped18-timch15/mvc/public/registration">Registration page</a></li>
            </ul>
        <?php } ?>
    </nav>
    <script src="/siped18-timch15/mvc/public/js/searchResults.js"></script>

    <div class="container">