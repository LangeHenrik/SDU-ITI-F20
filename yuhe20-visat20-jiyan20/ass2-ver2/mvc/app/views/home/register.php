<?php include '../partials/header.php'; ?>

  <script src="/mvc/public/js/regex.js"></script>
  <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
  <script src="/mvc/public/js/passwd_str.js"></script>

  <div class="content" id="registration">
      <div>
        <br></br>
          <main>
            <div class="wrapper-main">
              <div id="formContent">
                <h1>Sign-up</h1>
                <form onKeyUp="return validateFields()" class="form-signup" method="post" action="">
                  <input type="text" name="username" id="username" placeholder="Username" autofocus require>
                  <input type="text" name="email-register" id="email-register" placeholder="E-mail" require>
                  <input type="password" name="pwd-register" id="pwd-register"  onKeyUp="checkPasswordStrength();" placeholder="Password" require>
                  <div id="password-strength-status"></div>
                  <input type="password" name="pwd-repeat" id="pwd-repeat" placeholder="Repeat Password" require>
                  <button type="submit" name="signup-submit">Sign-up</button>
                </form>
              </div>
            </div>
          </main>
              <?php if(isset($viewbag['succes'])) 
              {
                  ?>
                  <div class="alert alert-success alert-dismissible" fade show role="alert">
                      <?= $viewbag['succes'] ?>
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <?php
              } elseif(isset($viewbag['danger'])) 
              { ?>
                  <div class="alert alert-danger alert-dismissible" fade show role="alert">
                      <?= $viewbag['danger'] ?>
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <?php
              }?>
      </div>
  </div>
  </br>
<?php include '../partials/foot.php'; ?>