<?php
require_once 'core/init.php';

$user = new User();
if($user->isLoggedIn()){
?>  
<head>
    <link rel="stylesheet" href="style.css">
</head>

<p>Welcome <a><?php echo escape($user->data()->name); ?></a>!</p>

<form>
    <ul>
        <div>
            <input type="button" class="item" onclick="window.location.href = 'upload.php';" value="Upload image">
        </div>
        <div>
            <input type="button" class="item" onclick="window.location.href = 'imagefeed.php';" value="Image feed">
        </div>
        <div>
            <input type="button" class="item" onclick="window.location.href = 'userlist.php';" value="User list">
        </div>
        <div>
            <a class="sign" href="logout.php">Log out</a>
        </div>
    </ul>
</form>
<?php
} else {
    echo '<head>
            <link rel="stylesheet" href="style.css">
        </head>
        <p>You need to <a class="sign" href="login.php">log in</a> or <a class="sign" href="register.php">register</a></p>';
}