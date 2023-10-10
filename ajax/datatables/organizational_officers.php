<?php
	include '../../core/config.php';

	$fetch = $mysqli->query("SELECT * FROM tbl_organizational_officers") or die(mysqli_error());

	$response['data'] = array();
	while ($row = $fetch->fetch_array()) {
		$list = array();

		$list['of_id'] 	        = $row['of_id'];
		$list['student']        = $row['student_id'];
        $list['of_type']        = $row['of_type'];
		$list['date_added']     = date("F j, Y h:i A",strtotime($row['date_added']));

		array_push($response['data'], $list);
	}

	echo json_encode($response);
?>