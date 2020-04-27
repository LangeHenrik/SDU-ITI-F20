<?php
require_once 'core/init.php';
?>
<script>
function showUser(str) {
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","getuser.php?q="+str,true);
        xmlhttp.send();
    }
}
</script>
<?php
$user = new User();
if($user->isLoggedIn()){
$getUser = DB::getInstance()->query("SELECT * FROM users");
$num = 1;
?>
<head>
<link rel="stylesheet" href="style.css">
</head>
<form>
    <select name="users" onchange="showUser(this.value)">
    <option value="">Select a person...</option>
<?php
if(!$getUser->count()) {
    echo 'No users';
} else {
    foreach($getUser->results() as $getUser) {
        echo '<option value="'.$num.'">'.$getUser->username.'</option>';
        $num++;
    }
}
?>
    </select>
<br>
<div id="txtHint"><b>Select a person to show their info...</b></div>
</form>
<?php
} else {
    Redirect::to('index.php');
}