<?php
	include '../core/config.php';

	if(isset($_POST['update_ay_id'])){
		$ay_id		= $_POST['update_ay_id'];
		$ay_name		= $_POST['update_ay_name'];
		$ay_desc		= $_POST['update_ay_desc'];

			$update_data = "ay_name = '$ay_name',ay_desc = '$ay_desc'";

			
			$mysqli->query("UPDATE tbl_academic_year SET $update_data WHERE ay_id = '$ay_id' ") or die(mysql_error());
			echo 1;
		
	}
?>