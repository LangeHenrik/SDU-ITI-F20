<html>

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>

<body>

    <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']) : ?>

        <!--  <div class="navbar" id="navbar">

            <ul>
                <li><a class="active" href="/aldus17/mvc/public/user/index">Home</a></li>
                <li> <a href="/aldus17/mvc/public/user/upload">Upload</a></li>
                <li> <a href="/aldus17/mvc/public/user/imagefeed">Imagefeed</a></li>
                <li> <a href="/aldus17/mvc/public/user/userlist">Userlist</a></li>
                <li>
                    <form method="post" action="/mvc/public/home/logout">
                        <div class="inner_container">
                            <button class="logoutbtn" name="logoutbtn" type="submit"><a href="/aldus17/mvc/public/home/logout">log out</a></button>
                        </div>
                    </form>
                </li>
            </ul>
        </div> -->
        <nav class="navbar navbar-default fixed-top" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-left">
                    <li><a class="active" href="/aldus17/mvc/public/user/index">Home</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-center">
                    <li> <a href="/aldus17/mvc/public/user/upload">Upload</a></li>
                    <li> <a href="/aldus17/mvc/public/user/imagefeed">Imagefeed</a></li>
                    <li> <a href="/aldus17/mvc/public/user/userlist">Userlist</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <form method="post" action="/aldus17/mvc/public/home/logout">
                            <div class="inner_container">
                                <button class="logoutbtn" name="logoutbtn" id="logoutbtn" type="submit">Logout</button>
                            </div>
                        </form>
                    </li>
                </ul>
            </div>
        </nav>

        <?php include_once 'foot.php'; ?>

    <?php else : ?>

        <?php include_once '../app/views/home/login.php'; ?>
        
    <?php endif; ?>