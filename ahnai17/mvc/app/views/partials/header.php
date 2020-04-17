<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="/ahnai17/mvc/public/css/style.css">
        <link rel="stylesheet" 
        href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
        integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
        crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" 
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
        crossorigin="anonymous"></script>
    </head>
    <body>
        <div class="content">
        
 <?php     
        if (isset($_SESSION['logged_in'])){
 ?> 
            <form method="post" action="/ahnai17/mvc/public/home/logout">
                <input type="submit" name="log out" value="logout" class="btn btn-primary">
                <a href="/ahnai17/mvc/public/home/Home_page" class="btn btn-primary">Home</a>
                <a href="/ahnai17/mvc/public/home/upload_page" class="btn btn-primary">Upload</a>
            </form>
        
                          
<?php
 }
   /* if (isset($_SESSION['logged_in'])){
        echo "logged in" . $_SESSION['logged_in'];
    }*/
?>
    