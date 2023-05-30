<?php
	include '../core/config.php';

	$offense_id 	= $_POST['offense_id'];
	$fetch_user = $mysqli->query("SELECT * FROM tbl_offenses WHERE offense_id = '$offense_id'") or die(mysqli_error());

	$response = array();
	while ($row = $fetch_user->fetch_array()) {
		$list = array();
		$list['offense_id'] = $row['offense_id'];
		$list['violation_id'] = $row['violation_id'];
		$list['student_id'] = $row['student_id'];
		$list['sanction_id'] = $row['sanction_id'];
		$list['ay_id'] = $row['ay_id'];
        $list['offense_desc'] = $row['offense_desc'];
		$list['date_added'] = $row['date_added'];

		array_push($response, $list);
	}

	echo json_encode($response);