<?php
if (isset($_POST['submit'])) {

    session_start();
    require_once "dbh.inc.php";

    // Sanitize user input
    $header = filter_var($_POST['header'], FILTER_SANITIZE_STRING);
    $description = filter_var($_POST['description'], FILTER_SANITIZE_STRING);

    if (empty($header) || empty($description)) {
        header("Location: upload_image.php?error=emptyfields=");
        exit();
    }

    $file = $_FILES['file'];

    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg', 'jpeg', 'png');


    // testing reading base64 <<<test start>>>

    // $path = 'what.jpg';
    // $type = pathinfo($path, PATHINFO_EXTENSION);
    // $data = file_get_contents($path);
    // $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);

    // more test

    // $myTempPath = $fileTmpName;
    // $myData = file_get_contents($myTempPath);
    // $myBase64 = 'data:image/' . $fileActualExt . ';base64,' . base64_encode($myData);
    // echo '<br>'.$fileActualExt.'<br>';
    // echo $myTempPath.'<br>';

    // echo $fileName.'<br>';
    // echo $fileTmpName.'<br>';
    // echo $fileSize.'<br>';
    // echo $fileError.'<br>';
    // echo $fileType.'<br>';

    // test end <<<test end>>>

    $useblob = false;

    if (in_array($fileActualExt, $allowed)) {
        if ($fileError === 0) {
            if ($fileSize < 10000000) {

                // Blob is currently broken. Can't properly get the data out. Probably a small mistake somewhere
                // Think it's because of the file extension is .tmp instead of e.g. .jpg so when we get
                // data from file_get_contents($path) it can't get the data properly
                // It works if it is NOT done through a form and just a direct path to the image
                if ($useblob) {
                    
                    try {
                        $conn = new PDO("mysql:host=$servername;dbname=$dBName", $dBUsername, $dBPassword);
                        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        
                        // testing variables
                        $description = "this is my description";
                        $myheader = "this is my header";
                        $owner = $_SESSION['session_username'];
    
                        // this is incredibly ugly
                        $stmt = $conn->prepare("INSERT INTO user_images (
                                                            image_blob, 
                                                            image_description, 
                                                            image_header,
                                                            image_owner) 
                                                            VALUES (
                                                                :base64_data, 
                                                                :image_description,
                                                                :image_header,
                                                                :image_owner_uhm
                                                            )");
                        $stmt->bindParam(':base64_data', $myBase64);
                        $stmt->bindParam(':image_description', $description, PDO::PARAM_STR);
                        $stmt->bindParam(':image_header', $myheader, PDO::PARAM_STR);
                        $stmt->bindParam(':image_owner_uhm', $owner, PDO::PARAM_STR);
    
                        $stmt->execute();
                        
                    } catch (PDOException $e) {
                        echo "Connection failed: " . $e->getMessage();
                    } finally {
                        $conn = null;
                    }
                }
                else {

                    $fileNameNew = uniqid('', true).".".$fileActualExt;
                    $fileDestination = 'images/'.$fileNameNew;
                    move_uploaded_file($fileTmpName, $fileDestination);

                    // echo $fileNameNew."<br>";
                    // echo $fileDestination."<br>";

                    try {
                        $conn = new PDO("mysql:host=$servername;dbname=$dBName", $dBUsername, $dBPassword);
                        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        
                        $owner = $_SESSION['session_username'];
    
                        // this is incredibly ugly
                        $stmt = $conn->prepare("INSERT INTO user_images (
                                                            image_URI, 
                                                            image_description, 
                                                            image_header,
                                                            image_owner) 
                                                            VALUES (
                                                                :image_URI, 
                                                                :image_description,
                                                                :image_header,
                                                                :image_owner_uhm
                                                            )");
                        $stmt->bindParam(':image_URI', $fileNameNew);
                        $stmt->bindParam(':image_description', $description, PDO::PARAM_STR);
                        $stmt->bindParam(':image_header', $header, PDO::PARAM_STR);
                        $stmt->bindParam(':image_owner_uhm', $owner, PDO::PARAM_STR);
    
                        $stmt->execute();
                        
                    } catch (PDOException $e) {
                        echo "Connection failed: " . $e->getMessage();
                    } finally {
                        $conn = null;
                    }
                    // Feedback to user
                    header("Location: index.php?uploadsuccess");
                }
            }
            else {
                echo "Your file is too large";
            }
        }
        else {
            echo "Error when uploading your file";
        }
    }
    else {
        echo "Invalid file type. Only .jpg, .jpeg and .png";
    }

}
else {
    header("Location: index.php");
    exit();
}
?>

