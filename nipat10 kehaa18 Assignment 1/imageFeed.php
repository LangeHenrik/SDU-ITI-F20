<?php

//Require the header page.
require 'header.php';

//Checks whether a usser is not logged in and there is no valid user ID.
if (!isset($_SESSION['user_id']) || !isset($_SESSION['logged_in'])) {
    //User not logged in. Redirect them back to the frontpage(Login page).
    header('Location: index.php');
    exit;
}

//Require the database connection file.
include 'config.php';

?>

<div class="main" align="center">
    <div id="gridview">
        <?php
        //Select all from images starting from the first ID and going upwards.
        $sql = "SELECT * FROM images ORDER BY id ASC";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchall();

        //As long as the result of the sql query is not empty populate the view/table with images, their headers, descriptions and user.
        if (!empty($result)) {
            foreach ($result as $key => $value) {
        ?>
                <div class="images">
                    <?php
                    if (file_exists($result[$key]["path"])) {
                    ?> <div class="image">

                            <h2><?php echo $result[$key]["header"] ?></h2><br>

                            <img src="<?php echo $result[$key]["path"]; ?>" /><br>
                            <hr>
                            <h2>Image Description: </h2>
                            <p><?php echo $result[$key]["description"] ?></p><br>
                            <hr>
                            <p>User: <?php echo $result[$key]["username"] ?></p><br>
                        </div>
                    <?php
                    } else {
                    ?>
                        <!--If for some reason file could not be opened, open a default file with examples instead.-->
                        <div class="image">
                            <h1>Header example!</h1>
                            <img src="gallery/default.jpeg" />
                            <p>Description example!</p>
                            <p>Username example!</p>
                        </div>
                    <?php
                    }
                    ?>
                </div>
        <?php
            }
        }
        ?>
    </div>
</div>

<?php
//Include the footer page.
include 'footer.php';
?>