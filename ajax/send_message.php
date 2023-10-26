<?php 
	include '../core/config.php';
	$session_user_id 	= $_SESSION['user_id'];
	$receiver_id 		= $mysqli -> real_escape_string($_POST['receiver_id']);
	$new_message 		= $mysqli -> real_escape_string($_POST['new_message']);

    $query = $mysqli->query("INSERT INTO tbl_messages SET sender_id = '$session_user_id', receiver_id = '$receiver_id', message = '$new_message' , status='U'") OR die(mysql_error());
	
    if($query){
        echo 1;
    }else{
        echo 2;
    }

?>