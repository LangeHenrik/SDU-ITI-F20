<!DOCTYPE html>
<html>
	<head>
        <title>
        <?php 
            switch($_SESSION['actual_page']) {
                case 'frontpage':
                    echo 'Frontpage';
                break;
                case 'registration':
                    echo 'Registration';
                break;
                case 'upload':
                    echo 'Upload';
                break;
                case 'imagefeed':
                    echo 'Image Feed';
                break;
                case 'userlist':
                    echo 'User List';
                break;
                default:
                    echo 'Assignment 2';
            }
        ?>
        </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <base href="http://localhost:8080/almur20/mvc/public/">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="./css/style.css">
	</head>

	<body>	

    <nav>
        <div class="topnav" id="myTopnav">
            <a href="./front" <?php echo ($_SESSION['actual_page'] == 'frontpage' ? 'class="active"' : '' );?>>Frontpage</a>
            <a href="./registration" <?php echo ($_SESSION['actual_page'] == 'registration' ? 'class="active"' : '' );?>>Registration</a>
            <?php if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']) {?>
            <a href="./image/upload" <?php echo ($_SESSION['actual_page'] == 'upload' ? 'class="active"' : '' );?>>Upload</a>
            <a href="./image/feed" <?php echo ($_SESSION['actual_page'] == 'imagefeed' ? 'class="active"' : '' );?>>Image feed</a>
            <a href="./user/list" <?php echo ($_SESSION['actual_page'] == 'userlist' ? 'class="active"' : '' );?>>User list</a>
            <?php }?>
            <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                <i class="fa fa-bars"></i>
            </a>
            <?php if($_SESSION['actual_page'] == 'imagefeed') {?>
                <input type="text" placeholder="Search by username" id="input_filter" name="input_filter" onkeyup="filterResults(this.value,<?php echo ($_SESSION['images_count'] > 0) ? 1:0;?>,<?php echo $_SESSION['images_count'];?>)"></input>
            <?php }?>
        </div>	
    </nav>



