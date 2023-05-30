<?php
	include '../../core/config.php';

	$fetch_user = $mysqli->query("SELECT * FROM tbl_violations ORDER BY violation_name ASC") or die(mysqli_error());

	$response['data'] = array();
	$count = 1;
	while ($row = $fetch_user->fetch_array()) {
		$list = array();

		$list['violation_id'] 	= $row['violation_id'];
		$list['violation_name'] = $row['violation_name'];
        $list['violation_desc'] = $row['violation_desc'];
        $list['violation_remarks'] = $row['violation_remarks'];
		$list['date_added'] = date("F j, Y h:i A",strtotime($row['date_added']));

		array_push($response['data'], $list);
	}

	echo json_encode($response);
?>