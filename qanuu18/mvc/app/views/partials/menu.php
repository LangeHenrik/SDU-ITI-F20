
<!DOCTYPE html>
<html>
    <head>
    <script src="../js/js.js"></script>
    <link rel="stylesheet" href="<?php echo DOC_ROOT; ?>/css/styling.css">
    </head>
    <body>

<div style="background-color: lightblue;">Menu partial view</div>

<?php if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']) : ?>

<a href="/qanuu18/mvc/public/user/logout">log out</a>


<?php endif; ?>




<body>
       

    <div id="userlistbtn">
    </div>
    
    <form class="viewimage" name="viewimage" method="POST" action="/qanuu18/mvc/public/image/getImages">
        <p>
        <input type="submit" name="Viewimage" id="viewimagebtn" value="View Images">
        </p>
    </form>

    <form class="viewimages" name="viewimages" method="POST" action="/qanuu18/mvc/public/image/getImagefromuser">
        <p>
        <input type="submit" name="Viewimages" id="viewimagebtns" value="View user Images">
        </p>
    </form>



    <form class="uploadImage" name="uploadImage" method="GET" action="/qanuu18/mvc/public/image/postImages">
        <p>
        <input type="submit" name="uploadImage" id="uloadbtn" value="Upload Picture">
        </p>
    </form>

    <p>
        <button onclick="loadDoc()" name="userlist" id="ulbtn"  >Userlist</button>
        <pre class="ulbtn" id="display"></pre>
        </p>

    <script src="<?php echo DOC_ROOT; ?>/js/userlist.js"></script>



