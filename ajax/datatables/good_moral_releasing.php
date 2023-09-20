<?php
	include '../../core/config.php';
	$ay_id = $_POST['ay_id'];
	$fetch = $mysqli->query("SELECT * FROM tbl_good_moral WHERE ay_id='$ay_id' ORDER BY good_modal_desc ASC") or die(mysqli_error());

	$response['data'] = array();
	$count = 1;
	while ($row = $fetch->fetch_array()) {
		$list = array();

		$list['good_moral_id'] 	= $row['good_moral_id'];
		$list['description'] = $row['good_modal_desc'];
		$list['student'] = studentFullName($row['student_id']);
		$list['date_added'] = date("F j, Y h:i A",strtotime($row['date_added']));

		array_push($response['data'], $list);
	}

	echo json_encode($response);
?>