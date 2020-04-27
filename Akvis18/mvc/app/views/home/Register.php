<?php
$title = "Create new user";
require_once '../app/views/partials/Navbar.php';
?>
<div class="center container">
    <form onsubmit="return CheckForm();" method="post" enctype="multipart/form-data">
        <fieldset>
            <legend>Create new Facewall user: </legend>
            <label for="username">Username</label> <br/>
            <input type="text" name="username" id="username" required/> <br/>
            <p class="info" id="username-availability"></p>
            <p class="info" id="username-info"></p>

            <label for="avatar">Upload profile picture</label> <br/>
            <input name="avatar" id="avatar" type="file" accept="image/*" onchange="loadFile(event)"><br/>
            <img id="preview"/>
            <script>
                let loadFile = function(event) {
                    let output = document.getElementById('preview');
                    output.src = URL.createObjectURL(event.target.files[0]);
                };
            </script><br/>

            <label for="email">Email</label> <br/>
            <input type="email" name="email" id="email" required/> <br/>
            <p class="info" id="email-availability"></p>
            <p class="info" id="email-info"></p>

            <label for="password">Password</label> <br/>
            <input type="password" name="password" id="password" required/> <br/>
            <p class="info" id="password-info"></p>

            <label for="password">Please repeat the password</label> <br/>
            <input type="password" name="second-password" id="second-password" required/> <br/>
            <p class="info" id="second-password-info"></p>
            <input type="checkbox" onclick="ShowPass()">Show Passwords<br/>

            <button type="submit" name="submit" id="submit">Create new user</button> <hr/>
            <a href="/akvis18/mvc/public/home/Login">Already have a user?</a>
        </fieldset>
    </form>
    <?php
    if (isset($viewbag['errors'])){
        print '<br/>';
        foreach ($viewbag['errors'] as $error){
            print $error . '<br/>';
        }
    }
    ?>
</div>
<script src="/akvis18/mvc/public/js/UsernameAvailable.js"></script>
<script src="/akvis18/mvc/public/js/EmailAvailable.js"></script>
<script src="/akvis18/mvc/public/js/RegisterValidation.js"></script>
<?php include_once '../app/views/partials/foot.php';