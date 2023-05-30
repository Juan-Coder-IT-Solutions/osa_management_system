<?php
	include '../core/config.php';

	$student_id 	= $_POST['student_id'];
	$fetch = $mysqli->query("SELECT * FROM tbl_students WHERE student_id = '$student_id'") or die(mysqli_error());

	$response = array();
	while ($row = $fetch->fetch_array()) {
		$list = array();
		$list['student_id'] = $row['student_id'];
		$list['student_code'] = $row['student_code'];
		$list['student_fname'] = $row['student_fname'];
		$list['student_mname'] = $row['student_mname'];
		$list['student_lname'] = $row['student_lname'];
		$list['student_birthdate'] = $row['student_birthdate'];
		$list['student_gender'] = $row['student_gender'];
		$list['student_address'] = $row['student_address'];
		$list['student_contact_num'] = $row['student_contact_num'];
		$list['course_id'] = $row['course_id'];

		array_push($response, $list);
	}

	echo json_encode($response);