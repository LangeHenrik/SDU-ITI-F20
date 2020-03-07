<?php
    //1.获取上传文件信息
    $upfile=$_FILES["pic"];
    //定义允许的类型
    $typelist=array("image/jpeg","image/jpg","image/png","image/gif");
    $path="./images/";//定义一个上传后的目录
    //2.过滤上传文件的错误号
    if($upfile["error"]>0){
        switch($upfile['error']){//获取错误信息
            case 1:
                $info="too big";
                break;
            case 2:
                $info="too big";
                break;
            case 3:
                $info="error";
                break;
            case 4:
                $info="no file is update.";
                break;
            case 5:
                $info="can't find it.";
                break;
            case 6:
                $info="error！";break;
        }die("there is something wrong:".$info);
    }
    //3.本次上传文件大小的过滤（自己选择）
    if($upfile['size']>10000000){
        die("too big");
    }
    //4.类型过滤
    if(!in_array($upfile["type"],$typelist)){
        die("wrong file!".$upfile["type"]);
    }
    //5.上传后的文件名定义(随机获取一个文件名)
    $fileinfo=pathinfo($upfile["name"]);//解析上传文件名字
    do{ 
        $newfile=date("YmdHis").rand(1000,9999).".".$fileinfo["extension"];
    }while(file_exists($path.$newfile));
    //6.执行文件上传
    //判断是否是一个上传的文件
    if(is_uploaded_file($upfile["tmp_name"])){
            //执行文件上传(移动上传文件)
            if(move_uploaded_file($upfile["tmp_name"],$path.$newfile)){
                echo "success!";
                ?>
                <script>
        window.location.href="image feed.php";
        </script>
        <?php

                //将文件名和路径存储到数据库
                include("config.php");
                $data = addslashes(fread(fopen($pic,"r"),filesize($pic)));
                //将图片的名称和路径存入数据库
                $query = "INSERT INTO image(name,path)VALUES('$newfile','$path$newfile')";
                $result = $dbh -> query($query);

                if($result){
                    echo"the file is saved in the database";
                }
                else{
                    echo"try it again";
                }
            }else{
            die("error");
        }
    }else{
    die("is not a file");
  }
?>
