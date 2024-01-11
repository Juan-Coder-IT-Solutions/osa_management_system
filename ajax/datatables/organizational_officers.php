<?php
	include '../../core/config.php';

	$ay_id = $_POST['ay_id'];

	$filter = ($ay_id == "")?"":"WHERE ay_id='$ay_id' ";

	$fetch = $mysqli->query("SELECT * FROM tbl_organizational_officers $filter") or die(mysqli_error());

	$response['data'] = array();
	while ($row = $fetch->fetch_array()) {
		$list = array();

		$list['of_id'] 	        = $row['of_id'];
		$list['club']        	= clubName($row['club_id']);
		$list['student']        = userFullName($row['student_id']);
        $list['of_type']        = $row['of_type'];
		$list['academic_year']	= ayName($row['ay_id']);
		$list['date_added']     = date("F j, Y h:i A",strtotime($row['date_added']));

		array_push($response['data'], $list);
	}

	echo json_encode($response);
?>