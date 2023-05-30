<?php
	include '../../core/config.php';

	$fetch_user = $mysqli->query("SELECT * FROM tbl_courses ORDER BY course_name ASC") or die(mysqli_error());

	$response['data'] = array();
	$count = 1;
	while ($row = $fetch_user->fetch_array()) {
		$list = array();

		$list['course_id'] 	= $row['course_id'];
		$list['course_name'] = $row['course_name'];
        $list['course_code'] = $row['course_code'];
		$list['course_grade'] = $row['course_grade'];
		$list['date_added'] = date("F j, Y h:i A",strtotime($row['date_added']));

		array_push($response['data'], $list);
	}

	echo json_encode($response);
?>