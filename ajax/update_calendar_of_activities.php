<?php
	include '../core/config.php';

	if(isset($_POST['update_activity_id'])){

		$activity_id	= $_POST['update_activity_id'];
		$ay_id			= $_POST['update_ay_id'];
		$activity_desc	= $_POST['update_activity_desc'];	
		$activity_date	= $_POST['update_activity_date'];

		$update_data = "ay_id = '$ay_id', activity_desc = '$activity_desc', activity_date = '$activity_date'";
		
		$mysqli->query("UPDATE tbl_activities SET $update_data WHERE activity_id = '$activity_id' ") or die(mysql_error());
		
		echo 1;
	}
?>