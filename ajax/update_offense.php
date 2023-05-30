<?php
	include '../core/config.php';

	if(isset($_POST['update_offense_id'])){
		$offense_id		= $_POST['update_offense_id'];
		$violation_id		= $_POST['update_violation_id'];
		$student_id		= $_POST['update_student_id'];	
		$sanction_id		= $_POST['update_sanction_id'];
		$ay_id		= $_POST['update_ay_id'];
		$offense_desc		= $_POST['update_offense_desc'];

				$update_data = "offense_id = '$offense_id', violation_id = '$violation_id', student_id = '$student_id', sanction_id = '$sanction_id', ay_id = '$ay_id', offense_desc = '$offense_desc'";
		
			$mysqli->query("UPDATE tbl_offenses SET $update_data WHERE offense_id = '$offense_id' ") or die(mysql_error());
			echo 1;
		
	}
?>