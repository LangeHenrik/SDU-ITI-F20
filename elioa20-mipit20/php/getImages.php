<?php

require_once ("db_config.php");

try {
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $dbusername, $dbpassword);

    $sql = 'CALL GetImages()';

// prepare for execution of the stored procedure
    $stmt = $pdo->prepare($sql);

// execute the stored procedure
    $stmt->execute();

    $stmt->closeCursor();

    $row = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);

    if ($row) {
        $ok = true;
        foreach ($row as $image) {
            $messages[] = $image;
        }
    }
}catch (PDOException $e) {
    die("Error occurred:" . $e->getMessage());
}

echo json_encode(
    array(
        'ok' => $ok,
        'messages' => $messages
    ));
