<?php
	include '../core/config.php';

	$activity_id 	= $_POST['activity_id'];
	$fetch = $mysqli->query("SELECT * FROM tbl_activities WHERE activity_id = '$activity_id'") or die(mysqli_error());

	$response = array();
	while ($row = $fetch->fetch_array()) {
		$list = array();
		$list['activity_id'] = $row['activity_id'];
		$list['ay_id'] = $row['ay_id'];
		$list['activity_desc'] = $row['activity_desc'];
		$list['activity_date'] = $row['activity_date'];
		$list['date_added'] = $row['date_added'];

		array_push($response, $list);
	}

	echo json_encode($response);