<?php
	include '../../core/config.php';

	$fetch_user = $mysqli->query("SELECT * FROM tbl_sanctions ORDER BY sanction_name ASC") or die(mysqli_error());

	$response['data'] = array();
	$count = 1;
	while ($row = $fetch_user->fetch_array()) {
		$list = array();

		$list['sanction_id'] 	= $row['sanction_id'];
		$list['sanction_name']  = $row['sanction_name'];
        $list['sanction_desc']  = $row['sanction_desc'];
		$list['date_added'] = date("F j, Y h:i A",strtotime($row['date_added']));

		array_push($response['data'], $list);
	}

	echo json_encode($response);
?>