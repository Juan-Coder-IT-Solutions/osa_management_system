<?php
	include '../core/config.php';

	if(isset($_POST['update_of_id'])){
		$update_of_id		= $_POST['update_of_id'];
		$update_club_id	= $_POST['update_club_id'];
        $update_student_id	= $_POST['update_student_id'];
        $update_of_type	    = $_POST['update_of_type'];
		$update_ay_id	    = $_POST['update_ay_id'];
			
			$mysqli->query("UPDATE tbl_organizational_officers SET club_id = '$update_club_id',student_id = '$update_student_id', of_type = '$update_of_type', ay_id = '$update_ay_id' WHERE of_id = '$update_of_id' ") or die(mysql_error());
			echo 1;
		
	}
?>