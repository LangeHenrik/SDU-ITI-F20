<!DOCTYPE html>

<header>
    <title>Userlist page</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/userlist_page_style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <script src="../js/js/ajaxCallUserlist.js"></script>
    <html lang="en">
</header>

<body>
    <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']) : ?>

        <?php include_once '../app/views/partials/menu.php'; ?>

        <div class="userlist_wrapper">
            <div class="userlist_content">
                <h1>User list</h1>

                <table class="userlist_table">
                    <tr>
                        <th>Fullname</th>
                        <th> Username</th>
                    </tr>
                    <?php //Data from the Ajax will be put into tbody 
                    ?>
                    <tbody id="data"></tbody>

                </table>
            </div>

        </div>

        </div>

    <?php else : ?>



    <?php endif; ?>
</body>



</html>