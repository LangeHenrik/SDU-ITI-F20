<?php
    require "header.php";

?>

    <main>
        <?php
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

<?php
    require "footer.php";
?>
