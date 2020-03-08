<?php

//$hash = password_hash('asdfASDF1!', PASSWORD_DEFAULT);
$hash = '$2y$10$GHd3hVj0MOPpqVNwAVhPSu1JXMRcGwnMXVirjfWQmhQtcC5sUc6rC';

if (password_verify('asdfASDF1!', $hash)) {
    echo 'Password is valid!';
} else {
    echo 'Invalid password.';
}

echo $hash;