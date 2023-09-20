<?php
	include '../core/config.php';

	$es_id 	= $_POST['es_id'];
	$fetch = $mysqli->query("SELECT * FROM tbl_exemplary_students WHERE es_id = '$es_id'") or die(mysqli_error());

	$response = array();
	while ($row = $fetch->fetch_array()) {
		$list = array();
		$list['es_id'] = $row['es_id'];
		$list['student_id'] = $row['student_id'];
        $list['es_desc'] = $row['es_desc'];
		$list['date_added'] = $row['date_added'];

		array_push($response, $list);
	}

	echo json_encode($response);