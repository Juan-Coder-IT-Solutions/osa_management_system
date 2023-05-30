<?php
	include '../core/config.php';

	$sanction_id 	= $_POST['sanction_id'];
	$fetch_course = $mysqli->query("SELECT * FROM tbl_sanctions WHERE sanction_id = '$sanction_id'") or die(mysqli_error());

	$response = array();
	while ($row = $fetch_course->fetch_array()) {
		$list = array();
		$list['sanction_id'] = $row['sanction_id'];
		$list['sanction_name'] = $row['sanction_name'];
		$list['sanction_desc'] = $row['sanction_desc'];
		
		array_push($response, $list);
	}

	echo json_encode($response);