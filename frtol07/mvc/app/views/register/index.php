<?php include '../app/views/partials/menu.php'; ?>
<br>
<br>
<div class="container">
    <label class="label">
        Click here to go back to login page
    </label>
</div>
<br>
<br>

<div class="container">
    <a href="index">
        <button class="bigBtn"> Go back
        </button>
    </a>
</div>
<br><br>


<div class="container">
    <form name="formRegistration" onsubmit="return checkFields()" action="/frtol07/mvc/public/home/registerUserModel"
          method="post">
        <label for="name" class="label">Username:</label>
        <br><br>
        <input type="text" name="registrationUsername" required autofocus id="registrationUsername" class="inputbox"/>
        <br><br>
        <label for="password" class="label">Password</label>
        <br><br>
        <input type="password" name="registrationPassword" required autofocus id="registrationPassword"
               class="inputbox"/>
        <br><br>

        <label for="email" class="label">Email address</label>
        <br><br>
        <input type="text" name="registrationEmail" required autofocus id="registrationEmail" class="inputbox"/>
        <br><br>

        <input type="submit" name="submitUser" id="submitUser" value="Ok" class="bigBtn"/>
    </form>
</div>


<!--Modal for closing all-->
<div class="container">

    <div id="closeModal" onclick="closeOnX()" class="modal">
        <span class="close">&times;</span>
    </div>

    <!-- incorrect name modal -->
    <div id="openRegistrationUsernameModal" onclick="closeOnX()" class="modal" role="dialog">
        <!-- Modal Enter correct name -->
        <div class="modal-content">
            <p> Please enter a valid username</p>
        </div>
    </div>

    <!-- incorrect PW modal -->
    <div id="openRegistrationPasswordModal" onclick="closeOnX()" class="modal" role="dialog">
        <!-- Modal Enter correct name -->
        <div class="modal-content">
            <p> Please enter a valid password</p>
        </div>
    </div>

    <!-- incorrect email modal -->
    <div id="openRegistrationEmailModal" onclick="closeOnX()" class="modal" role="dialog">
        <!-- Modal Enter correct email -->
        <div class="modal-content">
            <p> Please enter a valid email</p>
        </div>
    </div>

</div>

<?php include '../app/views/partials/foot.php'; ?>
