<?php
	include '../../core/config.php';
	$ay_id = $_POST['ay_id'];
	$fetch = $mysqli->query("SELECT * FROM tbl_activities WHERE ay_id='$ay_id' ORDER BY activity_desc ASC") or die(mysqli_error());

	$response['data'] = array();
	$count = 1;
	while ($row = $fetch->fetch_array()) {
		$list = array();

		$list['activity_id'] 	= $row['activity_id'];
		$list['description'] = $row['activity_desc'];
		$list['activity_date'] = $row['activity_date'];
		$list['academic_year'] = ayName($row['ay_id']);
		$list['date_added'] = date("F j, Y h:i A",strtotime($row['date_added']));

		array_push($response['data'], $list);
	}

	echo json_encode($response);
?>