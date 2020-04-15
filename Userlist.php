<?php
session_start(); 
if($_SESSION['logged_in']) : ?>

<?php

require_once 'db_config.php';

$results;
$conn = new PDO("mysql:host=$servername;dbname=$dbname",$dbusername,$dbpassword,array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    $stmt = $conn->prepare('SELECT userid,
    username,
    email
FROM users;');
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $results = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html>
    <head>
    <title> Leroy jenkins</title>
    <link rel="stylesheet" type="text/css" href="stylesheet.css">
</head>
<body>
    <div class="wrapperReg">
            <h1>Users</h1>
        <div class='content'>
            <table class="usertable">
                <thead>
                    <tr>
                        <th>userid</th>
                        <th>username</th>
                        <th>email</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($results as $result){
                     ?>
                        <tr>
                            <td><?php echo $result['userid']; ?></td>
                            <td><?php echo $result['username']; ?></td>
                            <td><?php echo $result['email']; ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            </div>
    </div>
</body>
</html>
<?php else : ?>
    <h1> Log in please</h1>

<?php endif; 
?>