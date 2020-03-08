<?php

$dir_path = "uploads/";
$extensions_array = array('jpg','png','jpeg');
if(is_dir($dir_path))
{
    $files = scandir($dir_path);
    for($i = 0; $i < count($files); $i++)
    {
        if($files[$i] !='.' && $files[$i] !='..')
        {
            echo "File Name -> $files[$i]<br>";
            $file = pathinfo($files[$i]);
            $extension = $file['extension'];
            echo "File Extension-> $extension<br>";
            if(in_array($extension, $extensions_array))
            {
            // show image
            echo "<img src='$dir_path$files[$i]' style='width:100px;height:100px;'><br>";
            }
        }
    }
}