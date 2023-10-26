<?php 
	include '../core/config.php';
	$sender_id 		= $mysqli -> real_escape_string($_POST['sender_id']);
	$receiver_id 	= $_SESSION['user_id'];

	$sender 		= $sender_id=="All"?"":"AND sender_id = '$sender_id'";

	$mysqli->query("UPDATE tbl_messages SET status = 'R' WHERE   receiver_id='$receiver_id' $sender") or die(mysql_error());