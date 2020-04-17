
<?php include '../app/views/partials/menu.php'; ?>

    <!-- <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Home</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="../api/users">User list</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="../image/imagefeed">Image feed</a>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">

            <?php if( isset($_SESSION['logged_in']) && ($_SESSION['logged_in']) ) { ?>

                <li><a class="nav-link" href="../user/logout">Logout</a></li>

            <?php } else { ?>

                <li><a class="nav-link" href="../user/register">Sign Up</a></li>

                <li><a class="nav-link" href="../user/login">Login</a></li>

                <?php } ?>

            </ul>
            </div>
        </div>
    </nav> -->

<?php include '../app/views/partials/foot.php'; ?>