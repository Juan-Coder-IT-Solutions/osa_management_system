<?php 
	include '../core/config.php';
	$sender_id 		= $mysqli -> real_escape_string($_POST['sender_id']);
	$receiver_id 	= $_SESSION['user_id'];

	$mysqli->query("UPDATE tbl_messages SET status = 'R' WHERE sender_id = '$sender_id' AND receiver_id='$receiver_id' ") or die(mysql_error());