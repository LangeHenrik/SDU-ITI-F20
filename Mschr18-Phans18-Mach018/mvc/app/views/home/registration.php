<?php
  $_SESSION['page_titel'] .= " | Sign up";
  $_SESSION['page_header::before'] = "Sign up to ";
  $_SESSION['page_header::after'] = ".";
  $_SESSION['page_sub_header'] = "Get started today.";

  include_once('../app/views/partials/header.php');
?>


<div class="page container-fluid custom-container">
  <div class="container">
    <form name="signupForm" id="signupform" onsubmit="return checkform();" action="<?=BASE_URL?>home/createUser" method="post">

       <label for="fullname">Full name*</label>

       <div class="input-group">
         <div class="input-group-prepend">
           <span class="input-group-text"><i class="fas fa-pen-nib"></i></span>
         </div>
         <input type="text" name="fullname" id="fullname" class="rounded-right form-control" placeholder="Full Name" aria-describedby="fullname" required>
         <span class="custom-tooltip" data-toggle="tooltip" data-html="true" data-placement="left"
           title="Should contain.<br>
                  - Between 2 and 4 words.<br>
                  - Seberated by space.<br>
                  - Big and Small letters.">
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
         <input type="text" name="username" id="newusername" class="rounded-right form-control" placeholder="Username" aria-describedby="username" required>
         <span class="custom-tooltip" data-toggle="tooltip" data-html="true" data-placement="left"
           title="Should contain.<br>
                  - Between 2 and 4 words.<br>
                  - Seberated by space.<br>
                  - Big and Small letters.">
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
         <input type="password" name="password" id="newpassword" class=" form-control" placeholder="Password" aria-describedby="password" required>

         <div class="input-group-append">
           <button onclick="toggleviewpassword()" class=" rounded-right btn btn-light toggle-Pasword" type="button"><i id="toggle-fas-eye" class="fas fa-eye-slash"></i></button>
         </div>

         <span class="custom-tooltip" data-toggle="tooltip" data-html="true" data-placement="left"
           title="Should contain.<br>
                  - Between 2 and 4 words.<br>
                  - Seberated by space.<br>
                  - Big and Small letters.">
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
           title="Should contain.<br>
                  - Between 2 and 4 words.<br>
                  - Seberated by space.<br>
                  - Big and Small letters.">
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
                  - Between 2 and 4 words.<br>
                  - Seberated by space.<br>
                  - Big and Small letters.">
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
