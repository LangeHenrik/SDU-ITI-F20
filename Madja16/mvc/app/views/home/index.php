<?php include '../app/views/partials/menu.php'; ?>

Hello there, <?=$viewbag['username']?>

    <main>
        <?php

        echo "this works";

        if (isset($_SESSION['session_id'])) {
            echo '<p> You are logged in </p>
            <a href="userlist.php">User list</a>
            <a href="imagefeed.php">Image feed</a>
            <a href="upload_image.php">Upload image</a>';
        }
        else {
            echo '<p> You are logged out </p>';

            // Giving feedback to the user if they succeed at signing up
            if (isset($_GET['signup'])) {   
                if ($_GET['signup'] == "success") {
                    echo '<p>Thank you for signing up</p>';
                }
            }
        }
        ?>
    </main>
    
    <img src="data:image/jpeg;base64,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" alt="Mr. Bean" title="Beanscription"/>

<?php include '../app/views/partials/foot.php'; ?>