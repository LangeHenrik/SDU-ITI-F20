<!DOCTYPE html>

<header>
    <title>Imagefeed</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/imagefeed_page_style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <script src="../js/ajaxCallImages.js"></script>
    <html lang="en">

</header>

<body>
    <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']) : ?>
        <?php include_once '../app/views/partials/menu.php'; ?>

        <div class="imagefeed_wrapper">
            <div class="imagefeed_content">


                <p> Search for username:
                    <input type="text" class="search" name="search" id="search"  onload="getUserImages(this.value);" onkeyup="getUserImages(this.value);" />
                </p>

                <?php // Data from the Ajax call will be put into the div imagefeed 
                ?>
                <div class="imagefeed" id="imagefeed">
                
                </div>

            </div>
        </div>

    <?php else : ?>

        <?php include_once '../app/views/partials/restricted.php'; ?>

    <?php endif; ?>

</body>

</html>