<?php
	include '../../core/config.php';
    $club_id = $_POST['club_id'];
	$fetch = $mysqli->query("SELECT * FROM tbl_clubs_requirements WHERE club_id = '$club_id'") or die(mysqli_error());

	$response['data'] = array();
	$count = 1;
	while ($row = $fetch->fetch_array()) {
		$list = array();

		$list['id'] 			= $row['id'];
        $list['cr_id'] 		    = checklistRequirementsName($row['cr_id']);
		$list['date_added'] 	= date("F j, Y h:i A",strtotime($row['date_added']));

		array_push($response['data'], $list);
	}

	echo json_encode($response);
?>