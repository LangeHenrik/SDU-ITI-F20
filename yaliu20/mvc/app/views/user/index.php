<!DOCTYPE html>

<header>
    <title>frontpage</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="js/loginAjax.js"></script>
    <link rel="stylesheet" href="../css/front_page_style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <html lang="en">

</header>

<body>

    <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']) : ?>
        <?php include_once '../app/views/partials/menu.php'; ?>

        <div id="main-wrapper" class="main_wrapper">
         
            <h1>Welcome to Pics</h1>
        </div>
        <!-- http://ip-api.com/json/24.48.0.1?fields=status,message,country,countryCode,region,regionName,city,zip,lat,lon,timezone,query -->
        <!--   <div id="list-example" class="list-group">
            <a class="list-group-item list-group-item-action" href="#list-item-1">Item 1</a>
            <a class="list-group-item list-group-item-action" href="#list-item-2">Item2</a>
            <a class="list-group-item list-group-item-action" href="#list-item-3">Item 3</a>
            <a class="list-group-item list-group-item-action" href="#list-item-4">Item 4</a>
        </div>
        <div data-spy="scroll" data-target="#list-example" data-offset="0" class="scrollspy-example">
            <h4 id="list-item-1">Item 1</h4>
            <p>...</p>
            <h4 id="list-item-2">Item 2</h4>
            <p>...</p>
            <h4 id="list-item-3">Item 3</h4>
            <p>...</p>
            <h4 id="list-item-4">Item 4</h4>
            <p>...</p>
        </div> -->

    <?php else : ?>
        <?php include_once '../app/views/partials/restricted.php'; ?>

    <?php endif; ?>
</body>

</html>