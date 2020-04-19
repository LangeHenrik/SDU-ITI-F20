<?php include '../app/views/partials/menu.php'; ?>

</head>
<body>


<div class="container">
    <label class="label">Press here to get users</label>
</div>
<!--<br>-->
<div class="container">
    <a href="/frtol07/mvc/public/home/showUsersView">
        <button class="bigBtn">Press here to get users</button>
    </a>
</div>


<body>

<div class="container">
    <label class="label">Search for user:</label>
</div>

<div class="container">
    <form>
        <input class="inputbox" type="text" onkeyup="showHint(this.value)">
    </form>

</div>

<p>
    <span id="txtSearch"></span></p>

<?php include '../app/views/partials/foot.php'; ?>