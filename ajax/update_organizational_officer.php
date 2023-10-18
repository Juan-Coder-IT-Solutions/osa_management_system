<?php
	include '../core/config.php';

	if(isset($_POST['update_of_id'])){
		$update_of_id		= $_POST['update_of_id'];
        $update_student_id	= $_POST['update_student_id'];
        $update_of_type	    = $_POST['update_of_type'];

			
			$mysqli->query("UPDATE tbl_organizational_officers SET student_id = '$update_student_id', of_type = '$update_of_type' WHERE of_id = '$update_of_id' ") or die(mysql_error());
			echo 1;
		
	}
?>