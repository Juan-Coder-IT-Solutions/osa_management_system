<?php
	include '../core/config.php';

	$of_id 	= $_POST['of_id'];
	$fetch = $mysqli->query("SELECT * FROM tbl_organizational_officers WHERE of_id = '$of_id'") or die(mysqli_error());

	$response = array();
	while ($row = $fetch->fetch_array()) {
		$list = array();
		$list['of_id'] = $row['of_id'];
		$list['club_id'] = $row['club_id'];
		$list['student_id'] = $row['student_id'];
		$list['of_type'] = $row['of_type'];
		$list['ay_id'] = $row['ay_id'];
		
		array_push($response, $list);
	}

	echo json_encode($response);