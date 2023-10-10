<?php
	include '../core/config.php';

	$cr_id 	= $_POST['cr_id'];
	$fetch = $mysqli->query("SELECT * FROM tbl_checklist_requirements WHERE cr_id = '$cr_id'") or die(mysqli_error());

	$response = array();
	while ($row = $fetch->fetch_array()) {
		$list = array();
		$list['cr_id'] = $row['cr_id'];
		$list['cr_desc'] = $row['cr_desc'];
		
		array_push($response, $list);
	}

	echo json_encode($response);