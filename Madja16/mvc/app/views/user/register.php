
<?php include '../app/views/partials/menu.php'; ?>

            <body>
                <div class="wrapper-main">
                        <h1>Signup</h1>
                        <?php

                        // Giving feedback to the user about what mistake they made when signing up
                        if (isset($_GET['error'])) {
                            if ($_GET['error'] == "emptyfields") {
                                echo '<p>Fill in all fields</p>';
                            }
                            else if ($_GET['error'] == "passwordcheck") {
                                echo '<p>Your passwords do not match</p>';
                            }
                        }
                        ?>
                        <!--
                        <form action="signup.inc.php" onsubmit="return checkform()" method="POST">
                            <input type="text" id="username" name="username" placeholder="Username" onkeyup="checkname_ajax(this.value)">
                            <input type="password" id="pwd" name="pwd" placeholder="Password">
                            <input type="password" id="pwd-confirm" name="pwd-confirm" placeholder="Confirm Password">
                            <button type="submit" name="signup-submit">Signup</button>
                        </form>
                        
                        <span id="check_username"></span>
                    -->
                </div>

                <div class="container">
                    <form class="form-horizontal" role="form" action="" method="POST" onsubmit="return checkform()" name="registerForm" id="registerForm">
                        <h2>Signup</h2>
                        <div class="form-group">
                            <label for="username" class="col-sm-3 control-label">Username</label>
                            <div class="col-sm-9">
                                <input type="text" name="username" id="username" placeholder="Username" class="form-control" autofocus>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password" class="col-sm-3 control-label">Password</label>
                            <div class="col-sm-9">
                                <input type="password" name="password" id="password" placeholder="Password" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password" class="col-sm-3 control-label">Confirm Password</label>
                            <div class="col-sm-9">
                                <input type="password" name="password-confirm" id="password-confirm" placeholder="Password" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-9">
                                <button class="btn btn-primary" type="submit">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>



                <script src="check_username_ajax.js"></script>
                <script src="validate.js"></script>
            

<?php include '../app/views/partials/foot.php'; ?>