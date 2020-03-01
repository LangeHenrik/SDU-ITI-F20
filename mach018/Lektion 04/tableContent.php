<?php
    $val = $_GET["searchValue"];
    require_once 'db_config.php';
    $result;
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", 
                        $username, 
                        $password,
                        array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

        $stmtString = "SELECT DISTINCT author.name, book.title, book.year FROM author, book, author_book
                        WHERE author.author_id = author_book.author_id AND
                        author_book.book_id = book.book_id";
        if ($val != NULL) {
            $stmtString .= " AND (book.title = '$val' OR author.name = '$val' OR book.year = '$val')";
        }
        $stmtString .= " ORDER BY author.author_id, book.year;";

        $stmt = $conn->prepare($stmtString);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_NUM); // FETCH_NUM -> returnerer array indexeret i colonner angivet i tal.
                                             // Andre return methoder er beskrevet her: https://www.php.net/manual/en/pdostatement.fetch.php
        $result = $stmt->fetchAll();
    }
    catch(PDOException $e)
    {
        echo "<br><p> Connection failed: " . $e->getMessage() . ". code: " . $e->getCode() . "</p>";
    }

    if (!empty($result)) {
        $rows = count($result);
        $cols = count($result[0]);
        $echoString = '';
        for ($i=0; $i < $rows; $i++) { 
            $echoString .= "<tr>";
            for ($j=0; $j < $cols; $j++) { 
                $echoString .= '<td>' . $result[$i][$j] . '</td>';
            }
            $echoString .= "</tr>";
        }
        echo $echoString;
    }
?>