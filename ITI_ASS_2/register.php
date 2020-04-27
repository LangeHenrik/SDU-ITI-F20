<?php
require_once 'core/init.php';

//var_dump(Token::check(Input::get('token')));

if(Session::exists('success')) {
    echo Session::flash('success');
}

if(Input::exists()) {
    if(Token::check(Input::get('token'))) {
    
    //echo 'Submitted';
    $validate = new Validate();

    //setup validation rules
    $validation = $validate->check($_POST, array(
        'username' => array(
            'required' => true,
            'min' => 2,
            'max' => 20,
            'unique' => 'users'
        ),
        'password' => array(
            'required' => true,
            'min' => 6,
        ),
        'password_again' => array(
            'required' => true,
            'matches' => 'password'
        ),
        'name' => array(
            'required' => true,
            'min' => 2,
            'max' => 50
        ),
    ));

    if($validation->passed()) {
        //echo 'Successful!';
        //Session::flash('Success', 'You have been registered!');
        //header('Location: index.php');
        
        $user = new User();
        
        $salt = Hash::salt(32);

        try {
            $user->create(array(
                'username' => Input::get('username'),
                'password' => Hash::make(Input::get('password'), $salt),
                'salt' => $salt,
                'name' => Input::get('name'),
                'joined' => date('Y-m-d H:i:s'),
                'group' => 1
            ));

            Session::flash('success', '<p>Congratulations! Your account has been succesfully registered. Click <a class="sign" href="login.php">here</a> to log in.</p>');
            Redirect::to('register.php');

        } catch(Exception $e) {
            die($e->getMessage());
        }
    } else {
        //print_r($validation->errors());
        foreach($validation->errors() as $error) {
            echo $error, '<br>';
        }
    }
}
}
?>

<head>
    <link rel="stylesheet" href="style.css">
</head>
<form action="" method="POST">
    <div class="field">
        <label for="username">Username</label>
        <input type="text" name="username" id="username" value="<?php echo escape(Input::get('username')); ?>" autocomplete="off" pattern="[A-Za-z0-9ÆØÅæøå]{2,20}" title="Username must be a minimum of 2 characters. Special characters are not allowed.">
    </div>

    <div class="field">
        <label for="password">Choose a password</lavel>
        <input type="password" name="password" id="password" pattern=".{6,}" title="Must consist of at least 7 characters.">
    </div>

    <div class="field">
        <label for="password_again">Confirm password</lavel>
        <input type="password" name="password_again" id="password_again" pattern=".{6,}" title="Must consist of at least 7 characters.">
    </div>

    <div class="field">
        <label for="name">Enter your name</lavel>
        <input type="text" name="name" value="<?php echo escape(Input::get('name')); ?>" id="name" pattern="[A-Za-zÆØÅæøå]{2,50}" title="Name must be a minimum of 2 characters. Numbers or special characters are not allowed.">
    </div>

    <input type="hidden" name="token" value="<?php echo Token::generate()?>">
    <input class="button" type="submit" value="Register">
    <a class="sign" href="login.php">Already a user? Sign in</a>
</form>
