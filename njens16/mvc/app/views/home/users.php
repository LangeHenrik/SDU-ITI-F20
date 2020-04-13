<?php 
include "../app/views/partials/head.php"; 
include "../app/views/partials/menu.php";
?>
<div class="container">
    <div class ="row">
        <div class ="col-4">
        <br>
        <table class="table">
        <caption>List of users</caption>
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Username</th>
            </tr>
        </thead>
        <tbody>
        <?php
        for ($i = 0; $i < sizeof($viewbag["users"]); $i++)
        {   
            echo "<tr><th scope='row'>". ($i+1). "</th> <td>". $viewbag["users"][$i][0]. "</td></tr>";
        } 
?>
        </tbody>
        </table>
        </div>
    </div>
</div>


<?php include '../app/views/partials/foot.php'; ?>
