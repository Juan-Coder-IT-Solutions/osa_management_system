<?php
	include '../core/config.php';

	$ay_id 	= $_POST['ay_id'];
	$fetch = $mysqli->query("SELECT * FROM tbl_academic_year WHERE ay_id = '$ay_id'") or die(mysqli_error());

	$response = array();
	while ($row = $fetch->fetch_array()) {
		$list = array();
		$list['ay_id'] = $row['ay_id'];
		$list['ay_name'] = $row['ay_name'];
		$list['date_added'] = $row['date_added'];

		array_push($response, $list);
	}

	echo json_encode($response);