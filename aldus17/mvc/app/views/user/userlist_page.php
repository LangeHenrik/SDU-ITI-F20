<!DOCTYPE html>

<header>
    <title>Userlist page</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/userlist_page_style.css">
    <html lang="en">
</header>

<body>
    <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']) : ?>

        <?php include_once '../app/views/partials/menu.php'; ?>

        <div class="userlist_wrapper">
            <div class="userlist_content">
                <h1>User list</h1>

                <table class="userlist_table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th> Username</th>
                        </tr>
                    </thead>

                    <!-- <button id="getUserlistbtn">Load/refresh</button> -->
                    <!-- <button class="btn btn-primary" id="getUserlistbtn" type="button">
                        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                        <span class="sr-only">Loading...</span>
                    </button>
                    <button type="button" class="btn btn-default btn-sm">
                        <span class="glyphicon glyphicon-refresh"></span> Refresh
                    </button> -->
                    <!-- <button type="button" id="getUserlistbtn" class="btn btn-primary btn-block normal"><i class="fa fa-repeat"></i>
                        Load/refresh</button> -->
                    <!-- <img src="../images/ajax-loader.gif" id="loading-indicator" style="display:none" /> -->
                    <button type="button" id="getUserlistbtn" class="btn btn-primary">
                        <div class="bs-example">
                            <div class="spinner-border">
                                <span class="sr-only">Loading...</span>
                            </div>
                            <!-- <div class="lds-ring">
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                        </div> -->
                        </div>Load/refresh
                    </button>

                    <?php //Data from the Ajax will be put into tbody 
                    ?>
                    <tbody id="userlistdata" class="userlistdata"></tbody>

                </table>


            </div>

        </div>

        </div>

        <script src="../js/userlistEvents.js"></script>
        <!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script> -->
        <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
    <?php else : ?>
        <?php include_once '../app/views/partials/restricted.php'; ?>


    <?php endif; ?>
</body>



</html>