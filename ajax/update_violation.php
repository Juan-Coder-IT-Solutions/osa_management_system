<?php
	include '../core/config.php';

	if(isset($_POST['update_violation_id'])){
		$violation_id	    = $_POST['update_violation_id'];
		$violation_name		= $_POST['update_violation_name'];
        $violation_remarks	= $_POST['update_violation_remarks'];
		$violation_desc		= $_POST['update_violation_desc'];	

			$update_data = "violation_name = '$violation_name', violation_remarks = '$violation_remarks', violation_desc = '$violation_desc'";
	

			$mysqli->query("UPDATE tbl_violations SET $update_data WHERE violation_id = '$violation_id' ") or die(mysql_error());
			echo 1;
	}
?>