<?php
include 'config.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // username and password sent from form 

    $Username = mysqli_real_escape_string($db, $_POST['username']);
    $Password = mysqli_real_escape_string($db, $_POST['password']);

    $sql = "SELECT ID FROM logins WHERE username = '$Username' and password = '$Password'";
    $result = mysqli_query($db, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $active = $row['active'];

    $count = mysqli_num_rows($result);

    if ($count == 1) {
        session_register("Username");
        $_SESSION['login_user'] = $Username;

        header("location: index.php");
    } else {
        $error = "Your Login Name or Password is invalid";
    }
}
?>
<html>

<body>

    <div id="formid" class="bg-modal">
        <div class="modal">
            <span onclick="document.getElementById('formid').style.display='none'" class="close" title="Close Modal">&times;</span>
            <form action="#" method="post">
                <div class="grid-container-login">
                    <div class="itemheader">
                        <img src="img/icon.png" alt="Avatar" class="avatar" />
                    </div>
                    <div class="itemmain">
                        <div>
                            <i class="fas fa-user"></i>
                            <label for="username"><b>Username</b></label>
                        </div>
                        <div>
                            <input type="text" placeholder="Enter Username" name="username" required />
                        </div>
                        <div>
                            <i class="fas fa-lock"></i>
                            <label for="password"><b>Password</b></label>
                        </div>
                        <div>
                            <input type="password" placeholder="Enter Password" name="password" required />
                        </div>
                        <div>
                            <span>Not a user? <a href="Registration.php">Sign in</a></span>
                        </div>
                    </div>
                    <div class="itemfooter">
                        <div>
                            <button type="submit" class="btn btnsubmit">Login</button>
                        </div>
                        <div>
                            <button type="button" onclick="document.getElementById('formid').style.display='none'" class="btn btncancel">
                                Cancel
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

</body>
<script>
    // Get the modal
    var modal = document.getElementById('formid');

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = 'none';
        }
    };
</script>

</html>