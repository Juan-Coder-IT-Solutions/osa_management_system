<?php
	include '../core/config.php';

	$violation_id 	= $_POST['violation_id'];
	$fetch = $mysqli->query("SELECT * FROM tbl_violations WHERE violation_id = '$violation_id'") or die(mysqli_error());

	$response = array();
	while ($row = $fetch->fetch_array()) {
		$list = array();
		$list['violation_id'] = $row['violation_id'];
		$list['violation_name'] = $row['violation_name'];
		$list['violation_remarks'] = $row['violation_remarks'];
        $list['violation_desc'] = $row['violation_desc'];

		array_push($response, $list);
	}

	echo json_encode($response);