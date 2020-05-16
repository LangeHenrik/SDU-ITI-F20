<?php

$username = "myusername";
$password = "mypassword";

//authorization header: "Authorization: Basic *myusername:mypassword*
// ** base64encoded

$basicAuthBase64 = base64_encode($username . ':' . $password);

$opts = array(
    'http'=>array(
        'header'=>"Authorization: Basic $basicAuthBase64"
    )
);

$context = stream_context_create($opts);

echo file_get_contents('http://localhost:8085/Exercises/mvc/public/api/secret/apikey/myapikey', true, $context);


