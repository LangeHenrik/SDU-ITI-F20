<?php

// Database Connection
try
{
    $db = new PDO('mysql:host=localhost;dbname=enbes20_elpoy20_bapio20', 'root', 'root');
}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}
?>
