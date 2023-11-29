<?php
	include '../../core/config.php';
	$club_id = $_POST['club_id'];

	$fetch_cr = $mysqli->query("SELECT cr_id FROM tbl_clubs_requirements WHERE club_id = '$club_id'") or die(mysqli_error());
	
	if($fetch_cr->num_rows > 0){
		$cr_checker = array();
		while($cr_row = $fetch_cr->fetch_array()){
			$cr_checker[] = $cr_row['cr_id'];
			$get_cr_checker = implode(",", $cr_checker);
		}

		$condition = "WHERE cr_id NOT IN($get_cr_checker)";
	}else{
		$condition = "";
	}
	
	$fetch_user = $mysqli->query("SELECT * FROM tbl_checklist_requirements $condition") or die(mysqli_error());

	$response['data'] = array();
	$count = 1;
	while ($row = $fetch_user->fetch_array()) {
		$list = array();

		$list['cr_id'] 			= $row['cr_id'];
        $list['cr_desc'] 		= $row['cr_desc'];
		$list['date_added'] 	= date("F j, Y h:i A",strtotime($row['date_added']));

		array_push($response['data'], $list);
	}

	echo json_encode($response);
?>