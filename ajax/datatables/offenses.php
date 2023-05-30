<?php
	include '../../core/config.php';

	$fetch_user = $mysqli->query("SELECT * FROM tbl_offenses ORDER BY date_added DESC") or die(mysqli_error());

	$response['data'] = array();
	$count = 1;
	while ($row = $fetch_user->fetch_array()) {
		$list = array();
        $list['offense_id'] = $row['offense_id'];
		$list['violation_id'] = violationName($row['violation_id']);
		$list['student_id'] = studentFullName($row['student_id']);
        $list['sanction_id'] = sanctionName($row['sanction_id']);
        $list['ay_id'] = ayName($row['ay_id']);
        $list['offense_desc'] = $row['offense_desc'];
		$list['date_added'] = date("F j, Y h:i A",strtotime($row['date_added']));

		array_push($response['data'], $list);
	}

	echo json_encode($response);
?>