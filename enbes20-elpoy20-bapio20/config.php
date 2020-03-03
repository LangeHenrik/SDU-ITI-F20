<?php

// Connexion à la base de données
try
{
    $db = new PDO('mysql:host=localhost;port=8080;dbname=enbes20_elpoy20_bapio20', 'root', 'root');
}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}
?>
