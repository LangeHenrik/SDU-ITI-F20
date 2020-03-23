<html>

<head>
<script src="../js/js.js"></script>
</head>

<body>

    <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']) : ?>

        <div class="navbar" id="navbar">

            <ul>
                <li><a class="active" href="/aldus17/mvc/public/user/index">Home</a></li>
                <li> <a href="/aldus17/mvc/public/user/upload">Upload</a></li>
                <li> <a href="/aldus17/mvc/public/user/imagefeed">Imagefeed</a></li>
                <li> <a href="/aldus17/mvc/public/user/userlist">Userlist</a></li>
                <li>
                    <form method="post" action="/aldus17/mvc/public/home/logout">
                        <div class="inner_container">
                            <button class="logoutbtn" name="logoutbtn" type="submit"><a href="/aldus17/mvc/public/home/logout">log out</a></button>
                        </div>
                    </form>
                </li>
            </ul>
        </div>

    <?php else : ?>

        <?php include_once '../app/views/home/login.php'; ?>

    <?php endif; ?>