<?php include '../app/views/partials/menu.php';?>
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
    <form  name="formRegistration"   action="/frtol07/mvc/public/home/registerUserModel" method="post">
        <label for="name" class="label">Username:</label>
        <br><br>
        <input type="text" name="registrationUsername" required autofocus id="name" class="inputbox"/>
        <br><br>
        <label for="password" class="label">Password</label>
        <br><br>
        <input type="password" name="registrationPassword" required autofocus id="password"  class="inputbox"/>
        <br><br>

        <label for="email" class="label">Email address</label>
        <br><br>
        <input type="text" name="registrationEmail" required autofocus id="email"  class="inputbox"/>
        <br><br>

        <input type="submit" name="submitUser" id="submitUser"  value="Ok"  class="bigBtn"  />
    </form>
</div>



<br>
<br>
<br>
<br>
<br>
<!-- Trigger/Open The Modal -->

<!--Modal for closing all-->

<div id="closeModal" onclick="closeOnX()" class="modal" >
    <span class="close">&times;</span>
</div>


<!-- incorrect name modal -->
<div id="openRegistrationUsernameModal" onclick="closeOnX()" class="modal">

    <!-- Modal Enter correct name -->
    <div class="modal-content">
        <p> Please enter correct name</p>
    </div>

</div>

<!-- incorrect PW modal -->
<div id="openRegistrationPasswordModal" onclick="closeOnX()" class="modal">

    <!-- Modal Enter correct name -->
    <div class="modal-content">
        <p> Please enter correct password</p>
    </div>

</div>

<!-- incorrect email modal -->
<div id="openRegistrationEmailModal" onclick="closeOnX()" class="modal">

    <!-- Modal Enter correct email -->
    <div class="modal-content">
        <p> Please enter correct email</p>
    </div>

</div>


<?php include '../app/views/partials/foot.php'; ?>
