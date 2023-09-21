<?php
	include '../core/config.php';

	$good_moral_id 	= $_POST['good_moral_id'];
	$fetch = $mysqli->query("SELECT * FROM tbl_good_moral WHERE good_moral_id = '$good_moral_id'") or die(mysqli_error());

	$response = array();
	while ($row = $fetch->fetch_array()) {
		$list = array();
		$list['good_moral_id'] = $row['good_moral_id'];
		$list['ay_id'] = $row['ay_id'];
		$list['student_id'] = $row['student_id'];
        $list['good_modal_desc'] = $row['good_modal_desc'];
		$list['date_added'] = $row['date_added'];

		array_push($response, $list);
	}

	echo json_encode($response);