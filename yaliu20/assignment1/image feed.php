<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>userlist</title>
<link rel="stylesheet" href="getimage.css">
</head>

<body>
<h3>image feed</h3>
<input type="button" class="btn btn-primary" name="link" value="upload" onclick="javascript:location.href='upload.php'">
<input type="button" class="btn btn-primary" name="link" value="userlist" onclick="javascript:location.href='userlist.php'">
<input type="button" class="btn btn-primary" name="logout" value="log out" onclick="javascript:location.href='frontpage.php'">
<form>
<?php
try{
    include("config.php");
    $rst=$dbh->query("select path from image");
    //$rst->execute();
    ?>

    <table width="100%" border="1" class="table" cellpadding="0" cellspacing="0">

    <?php
    while($path=$rst->fetch()){        
     
           
           ?>
           
           <img src="<?php echo $path["path"]; ?>"  height="256" />
           
        
 <?php
  //$info = getimagesize($path);//获取图片信息
  // $geshi = $info['mime'];//获取类型
   //$im = file_get_contents($path); //获取图片的内容
  //Http::header("Content-type: {$geshi}");//输出类型，直接取图片'mime'
   //echo($im);


   //$str.="</tr>"; 
 //  $str.="</table>"; 
   //echo $str;        
    }
}
        catch(Exception $e){

            die("Error!:".$e->getMessage().'<br>');
        }
?>
</form>
  
</table>
</body>
</html>
