<?php
	include '../core/config.php';

	$club_id 	= $_POST['primary_id'];
	$fetch_course = $mysqli->query("SELECT * FROM tbl_clubs WHERE club_id = '$club_id'") or die(mysqli_error());

	$response = array();
	while ($row = $fetch_course->fetch_array()) {
		$list = array();
		$list['club_id'] = $row['club_id'];
		$list['club_name'] = $row['club_name'];
		$list['club_type'] = $row['club_type'];
		
		array_push($response, $list);
	}

	echo json_encode($response);