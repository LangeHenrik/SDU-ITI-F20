<html>
<head>
    <script src="/js/js.js"></script>
</head>
<body>

<?php if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']) : ?>

<a href="/Assignment1/mvc/public/user/logout">log out</a>

<?php endif; ?>

