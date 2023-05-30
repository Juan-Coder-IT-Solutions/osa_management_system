<?php
	include '../core/config.php';

	if(isset($_POST['update_student_id'])){
		$student_id				= $_POST['update_student_id'];
		$student_fname			= $_POST['update_student_fname'];
		$student_mname			= $_POST['update_student_mname'];	
		$student_lname			= $_POST['update_student_lname'];
		$student_code			= $_POST['update_student_code'];
		$student_birthdate		= $_POST['update_student_birthdate'];
		$student_gender			= $_POST['update_student_gender'];	
		$student_address		= $_POST['update_student_address'];
		$student_contact_num	= $_POST['update_student_contact_num'];
		$course_id				= $_POST['update_course_id'];


		$update_data = "student_id = '$student_id', student_fname = '$student_fname', student_mname = '$student_mname', student_lname = '$student_lname', student_code = '$student_code', student_birthdate = '$student_birthdate', student_gender = '$student_gender', student_address = '$student_address', student_contact_num = '$student_contact_num', course_id = '$course_id'";

		$mysqli->query("UPDATE tbl_students SET $update_data WHERE student_id = '$student_id' ") or die(mysql_error());
			echo 1;
	}
?>