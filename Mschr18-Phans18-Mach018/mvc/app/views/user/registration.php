<?php
  $_SESSION['page_titel'] .= " | Sign up";
  $_SESSION['page_header::before'] = "Sign up to ";
  $_SESSION['page_header::after'] = ".";
  $_SESSION['page_sub_header'] = "Get started today.";

  include_once('../app/views/partials/header.php');
?>


<div class="page container-fluid custom-container">
  <div class="container">
    <form class="signup-form" name="signupForm" id="signupform" onsubmit="return checkform();" action="<?=BASE_URL?>user/createUser" method="post">

       <label for="fullname">Full name*</label>

       <div class="input-group">
         <div class="input-group-prepend">
           <span class="input-group-text"><i class="fas fa-pen-nib"></i></span>
         </div>
         <input type="text" name="fullname" id="fullname" class="rounded-right form-control" placeholder="Full Name" aria-describedby="fullname" required>
         <span class="custom-tooltip" data-toggle="tooltip" data-html="true" data-placement="left"
           title="Should contain.<br>
                  - Between 2 and 4 words,<br>
                  &nbsp&nbsp seberated by space.<br>
                  - Allowed upper, lowercase lettes:<br>
                  &nbsp&nbsp A to Z, Æ, Ø, and Å.">
            <i class="fas fa-question-circle"></i>
         </span>

         <div class="invalid-feedback" id="fullname-invalid-txt">
           Error text
         </div>
       </div>

       <label for="username">Username*</label>

       <div class="input-group">
         <div class="input-group-prepend">
           <span class="input-group-text"><i class="fas fa-user"></i></span>
         </div>
         <input type="text" name="newusername" id="newusername" class="rounded-right form-control" placeholder="Username" aria-describedby="username" required>
         <span class="custom-tooltip" data-toggle="tooltip" data-html="true" data-placement="left"
           title="Must contain 5 t0 10 characters.<br>
                  &nbsp&nbsp Allowed lettes: A to Z and a to z.<br>
                  &nbsp&nbsp Allowed numbers: 0 to 9.">
            <i class="fas fa-question-circle"></i>
         </span>

         <div class="invalid-feedback" id="username-invalid-txt">
           Error text
         </div>
       </div>

       <label for="password">Password*</label>

       <div class="input-group">
         <div class="input-group-prepend">
           <span class="input-group-text"><i class="fas fa-key"></i></span>
         </div>
         <input type="password" name="newpassword" id="newpassword" class=" form-control" placeholder="Password" aria-describedby="password" required>

         <div class="input-group-append">
           <button onclick="toggleviewpassword()" class=" rounded-right btn btn-light toggle-Pasword" type="button"><i id="toggle-fas-eye" class="fas fa-eye-slash"></i></button>
         </div>

         <span class="custom-tooltip" data-toggle="tooltip" data-html="true" data-placement="left"
           title="Must be at least 8 characters.<br>
                  - At least one uppercase letter.<br>
                  - At least one lowercase letter.<br>
                  - At least one number.<br>
                  - At least one special character.<br>
                  &nbsp&nbsp Allowed lettes: A to Z and a to z.<br>
                  &nbsp&nbsp Allowed numbers: 0 to 9.<br>
                  &nbsp&nbsp Allowed special: @ $ ! % * ? & , .<br>">
            <i class="fas fa-question-circle"></i>
         </span>
         <div class="invalid-feedback" id="password-invalid-txt">
           Error text
         </div>
       </div>

       <label for="phone">Phone number*</label>

       <div class="input-group">
         <div class="input-group-prepend">
           <span class="input-group-text"><i class="fas fa-phone"></i></span>
         </div>
         <input type="text" name="phone" id="phone" class="rounded-right form-control" placeholder="phone" aria-describedby="phone" required>
         <span class="custom-tooltip" data-toggle="tooltip" data-html="true" data-placement="left"
           title="Should be between 8-24 digits.<br>
                  - Must begin with +<br>
                  &nbsp&nbsp e.g. +45 12 36 78 09">
            <i class="fas fa-question-circle"></i>
         </span>
         <div class="invalid-feedback" id="phone-invalid-txt">
           Error text
         </div>
       </div>

       <label for="email">Email*</label>

       <div class="input-group">
         <div class="input-group-prepend">
           <span class="input-group-text"><i class="fas fa-at"></i></span>
         </div>
         <input type="text" name="email" id="email" class="rounded-right form-control" placeholder="Email" aria-describedby="email" required>
         <span class="custom-tooltip" data-toggle="tooltip" data-html="true" data-placement="left"
           title="Should contain.<br>
                  - Recipient name.<br>
                  - @ symbol.<br>
                  - Domain name.<br>
                  - Top-level domain.<br>
                  &nbsp&nbsp e.g. user@domaine.com">
            <i class="fas fa-question-circle"></i>
         </span>
         <div class="invalid-feedback" id="email-invalid-txt">
           Error text
         </div>
        </div>

        <div class="text-right">
          <div class="btn-group  ">
            <button type="submit" name="signup" class="btn btn-light ">Sign up <i class="fas fa-user-plus"></i></button>
          </div>
        </div>

    </form>
  </div>
</div>

<script src="/Mschr18-Phans18-Mach018/mvc/public/js/registration.js"></script>
<?php
 include_once('../app/views/partials/footer.php');
?>
