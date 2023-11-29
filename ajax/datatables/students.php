<?php
	include '../../core/config.php';

	$course_id = $_POST['course_id'];

	$checker = $course_id != ''? "AND course_id = '$course_id'":""; 

	$fetch_user = $mysqli->query("SELECT * FROM tbl_users WHERE category = 'S' $checker ORDER BY user_fname ASC") or die(mysqli_error());

	$response['data'] = array();
	$count = 1;
	while ($row = $fetch_user->fetch_array()) {
		$list = array();

		$list['student_id'] 			= $row['user_id'];
		$list['name'] 					= userFullName($row['user_id']);
		$list['student_gender'] 		= $row['user_gender'];
		$list['course'] 				= course_info("course_name",$row['course_id']);
		$list['student_contact_num'] 	= $row['user_contact_num'];
		$list['date_added'] 			= date("F j, Y h:i A",strtotime($row['date_added']));

		array_push($response['data'], $list);
	}

	echo json_encode($response);
?>