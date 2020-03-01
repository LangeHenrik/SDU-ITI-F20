<head>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div id="main">
        <div id="leftBox"></div>
        <div id="content">
            <h1 >Search the book archive</h1>
            <form action="http://localhost:8080/">
                <input type="text" id="search" name="searchValue" placeholder="Enter search here. . .">
                <input type="submit" id="submit" value="Search">
            </form>
            <br>
            <table id="t01">
                <tr>
                    <th>Author</th>
                    <th>Book</th> 
                    <th>Year</th>
                </tr>
                <?php include 'tableContent.php'; ?>
            </table>
        </div>
        <div id="rightBox"></div>
    </div>

</body>