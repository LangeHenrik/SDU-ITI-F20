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
            <h2 class="front_page-header">Homepage page</h2>
            <h3 class="front_page-subheader">Welcome to the Homepage <i><?= $viewbag['fullname'] . ' ' ?></i></br>
                Your username is: <i><?= $viewbag['username'] ?></i></h3>
        </div>
        
    <?php else : ?>
        <?php include_once '../app/views/partials/restricted.php'; ?>

    <?php endif; ?>
</body>

</html>