<html>

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

</head>

<body>

    <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']) : ?>

        <nav id="nav" class="navbar smart-scroll navbar-expand-lg navbar-light bg-light fixed-top">
            <a class="navbar-brand" id="home" href="/aldus17/mvc/public/user/index">ImagePoster</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav mx-auto ">
                    <li class="nav-item active">
                        <a class="nav-link" href="/aldus17/mvc/public/user/index"><i class="fa fa-home" aria-hidden="true"></i>Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/aldus17/mvc/public/user/upload"><i class="fa fa-cloud-upload" aria-hidden="true"></i>Upload</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/aldus17/mvc/public/user/imagefeed"><i class="fa fa-picture-o" aria-hidden="true"></i>Imagefeed</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/aldus17/mvc/public/user/userlist"><i class="fa fa-users" aria-hidden="true"></i>Userlist</a>
                    </li>
                </ul>
                <span class="navbar-text">
                    <li class="nav-item">
                        <form method="post" action="/aldus17/mvc/public/home/logout">
                            <button name="logoutbtn" id="logoutbtn" type="submit" class="btn btn-default">
                                <i class="fa fa-sign-out" aria-hidden="true"></i> logout
                            </button>
                        </form>
                    </li>
                </span>
            </div>
        </nav>

        <?php include_once 'foot.php'; ?>
        <script src="../js/menuBarUtility.js"></script>
        <!-- <script src="https://use.fontawesome.com/b6edc4dbf9.js"></script> -->
        <script src="https://kit.fontawesome.com/dc1c1b77e7.js" crossorigin="anonymous"></script>

    <?php else : ?>

        <?php include_once '../app/views/home/login.php'; ?>

    <?php endif; ?>