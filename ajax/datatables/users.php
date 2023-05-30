<?php
	include '../../core/config.php';

	$fetch_user = $mysqli->query("SELECT * FROM tbl_users ORDER BY user_fname ASC") or die(mysqli_error());

	$response['data'] = array();
	$count = 1;
	while ($row = $fetch_user->fetch_array()) {
		$list = array();

		$list['user_id'] 	= $row['user_id'];
		$list['name'] 		= userFullName($row['user_id']);
		$list['username'] 	= $row['username'];
		$list['date_added'] = date("F j, Y h:i A",strtotime($row['date_added']));

		array_push($response['data'], $list);
	}

	echo json_encode($response);
?>