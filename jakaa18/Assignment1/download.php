<?php
echo "*******************";
$title = "download";
if(isset($_GET["grab"])){
    if(true){

        /*
         * Grab image data from database
         */

        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
		require_once 'db_connect.php';

        //Grab image content from database
        $grab = $conn->query("SELECT header, description, user, picture FROM pictures ORDER BY pic_id DESC");
        /*if($grab){
            echo "File grabbed successfully.";
			foreach($grab as $value){
				echo "stuff: $value";
			}
			/*<text head> header </text>
			<img> picture </img>
			<text description> description </text>
			<text user> "By: " + user </text>
        }else{
            echo "File grab failed, please try again.";
        }*/
	}
		<?php
		foreach ($grab as $pictures){
			print '<img class="images" src="data:image/png;base64,' . base64_encode( $pictures['picture'] ) . '" >';
			print '<div class="post container">';
			print $post['user'].'</br><h2>'. $post['header'] .'</h2></br>';
			print '<img class="images" src="data:image/png;base64,' . base64_encode( $pictures['picture'] ) . '" >';
			print '</br>'.$post['description'].'</br>';
			print '</div>';
		}
>
		
    /*}else{
        echo "Something went wrong. This error shouldn't be displayed.";
		console.log("Hello world!");
    }*/
}
