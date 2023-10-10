<?php
	include '../core/config.php';

	$services_id 	= $_POST['services_id'];
	$fetch = $mysqli->query("SELECT * FROM tbl_services WHERE services_id = '$services_id'") or die(mysqli_error());

	$response = array();
	while ($row = $fetch->fetch_array()) {
		$list = array();
		$list['services_id'] = $row['services_id'];
		$list['services_desc'] = $row['services_desc'];
		
		array_push($response, $list);
	}

	echo json_encode($response);