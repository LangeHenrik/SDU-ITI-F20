<!doctype html>

<html lang="en">

<head>

  <meta charset="utf-8">

  <title>ITI website</title>

  <meta name="description" content="ITI course project website">
  <meta name="author" content="Martin Androvich">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="css/main.css">
  <link rel="stylesheet" href="css/nav.css">
  <link rel="stylesheet" href="css/entry.css">
  <link rel="stylesheet" href="css/feed.css">
  <link rel="stylesheet" href="css/upload.css">
  <link rel="stylesheet" href="css/users.css">

  <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">

  <script type="text/javascript" src="js/script.js" defer></script>
  
</head>

<body>

  <!-- navigation bar -->
  <nav>
    <a href="#home">Home</a>
    <a href="#feed">Feed</a>
    <a href="#users">Users</a>
    <a href="#login">Login / Register</a>
  </nav>

  <!-- entry (login / register) form -->
  <?php include "./components/entry.htm" ?>

  <!-- upload form -->
  <?php include "./components/upload.htm" ?>

  <!-- content -->
  <section id="content"></section>

</body>

</html>