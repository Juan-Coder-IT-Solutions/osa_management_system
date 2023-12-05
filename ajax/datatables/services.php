<?php
	include '../../core/config.php';

	$fetch = $mysqli->query("SELECT * FROM tbl_services") or die(mysqli_error());

	$response['data'] = array();
	$count = 1;
	while ($row = $fetch->fetch_array()) {
		$list = array();

		$list['services_id'] 			= $row['services_id'];
		$list['services_desc'] 			= $row['services_desc'];
		$list['services_remarks'] 		= $row['services_remarks'];
		$list['date_added'] 			= date("F j, Y h:i A",strtotime($row['date_added']));

		array_push($response['data'], $list);
	}

	echo json_encode($response);
?>