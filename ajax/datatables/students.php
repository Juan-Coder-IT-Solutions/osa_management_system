<?php
	include '../../core/config.php';

	$fetch_user = $mysqli->query("SELECT * FROM tbl_students ORDER BY student_fname ASC") or die(mysqli_error());

	$response['data'] = array();
	$count = 1;
	while ($row = $fetch_user->fetch_array()) {
		$list = array();

		$list['student_id'] 			= $row['student_id'];
		$list['name'] 					= studentFullName($row['student_id']);
		$list['student_code'] 			= $row['student_code'];
		$list['student_gender'] 		= $row['student_gender'];
		$list['course'] 				= course_info("course_name",$row['course_id']);
		$list['student_contact_num'] 	= $row['student_contact_num'];
		$list['date_added'] 			= date("F j, Y h:i A",strtotime($row['date_added']));

		array_push($response['data'], $list);
	}

	echo json_encode($response);
?>