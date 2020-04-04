<?php
  include_once('header.php');
?>
    <section id="content">
      <h1 id="title">Sign up to </h1> <?php include_once('Include/phpUtils/chalkbord.php') ?>

      <div class="registration" id="registration">
        <div class="wrapper">
          <form name="signupForm" id="signupform" onsubmit="return checkform();" action="Mschr18-Phans18-Mach018/mvc/public/home/createUser" method="post">

            <label for="fullname" >Full name*<p class="valid" id="fullnamevalid"></p></label> <br>
            <input type="text" name="fullname" id="fullname" tabindex="1" required/>
            <p class="info" id="fullnameinfo"></p><br>

            <label for="newusername" >Username*<p class="valid" id="newusernamevalid"></p></label> <br>
            <input type="text" name="newusername" id="newusername" tabindex="2" required/>
            <p class="info" id="newusernameinfo"></p><br>

            <label for="newpassword">Password*<p class="valid" id="newpasswordvalid"></p></label><br>
            <input type="password" name="newpassword" id="newpassword" tabindex="3" required/>
            <p class="info" id="newpasswordinfo"></p><br>

            <label for="phone">Phone number*<p class="valid" id="phonevalid"></p></label><br>
            <input type="text" name="phone" id="phone" tabindex="4" required/>
            <p class="info" id="phoneinfo"></p><br>

            <label for="email">Email adress*<p class="valid" id="emailvalid"></p></label><br>
            <input type="text" name="email" id="email" tabindex="5" required/>
            <p class="info" id="emailinfo"></p><br>

            <i class="fas fa-user-plus"></i><input type="submit" name="submit" id="signup"  value="Sign up" tabindex="6"/>
          </form>
        </div>

        <script src="Include/JS/registration.js"></script>
      </div>
    </section>

<?php
 include_once('footer.php');
?>
