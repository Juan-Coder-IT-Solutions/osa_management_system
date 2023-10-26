<?php 
	include '../core/config.php';
	$user_id = $_SESSION['user_id'];
	$fetch = $mysqli->query("SELECT * FROM tbl_messages WHERE receiver_id='$user_id' AND status='U'") or die(mysqli_error());
	echo mysqli_num_rows($fetch);