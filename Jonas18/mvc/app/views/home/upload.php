<?php 
include '../app/views/partials/menu.php';
?>

<body>
    <div class=wrapper> 
        <div class= content>
            <h1> Upload your picture here </h1>
        <form class="Upload-form" method="POST" action ="/jonas18/mvc/public/user/upload">
        <label for="Image title"> Image title:</label> <br>
        <input type="text" name="title" placeholder="title"> <br>
        <label for="Description"> Description:</label> <br>
        <input type="text" name="description" placeholder="description"> <br>
        <label for="imageblob"> imageblob:</label> <br>
        <input type="text" name="imageblob" placeholder="imageblob"> <br>
        <button type="submit" name="upload" id="upload"> upload</button>
        </div>        
    </div>


<?php 
include '../app/views/partials/foot.php';
?>
