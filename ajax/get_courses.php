<?php
	include '../core/config.php';

	$course_id 	= $_POST['course_id'];
	$fetch_course = $mysqli->query("SELECT * FROM tbl_courses WHERE course_id = '$course_id'") or die(mysqli_error());

	$response = array();
	while ($row = $fetch_course->fetch_array()) {
		$list = array();
		$list['course_id'] = $row['course_id'];
		$list['course_name'] = $row['course_name'];
		$list['course_code'] = $row['course_code'];
		$list['course_grade'] = $row['course_grade'];
		$list['date_added'] = $row['date_added'];
		
		array_push($response, $list);
	}

	echo json_encode($response);