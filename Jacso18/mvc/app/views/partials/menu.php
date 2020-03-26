<!DOCTYPE html>
<html>

<head>
    <title>Upload image</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../CSS/stylesheet.css">
    <script src="../js/javascript.js"></script>
</head>

<body>
    <nav>
        <div class="center">
            <ul class="menu" method="POST">
                <li><a href="/jacso18/mvc/public/home/image_feed">Image feed</a></li>
                <li><a href="/jacso18/mvc/public/home/upload">Upload picture</a></li>
                <li><a href="/jacso18/mvc/public/home/users">Users</a></li>
                <li>
                    <form class="logout" method="POST" action="/jacso18/mvc/public/home/logout">
                        <input type="submit" name="logout" id="logout" value="Logout" />
                    </form>
                </li>

            </ul>
        </div>
    </nav>