<?php
	include '../core/config.php';

	$id = $_POST['id'];

	foreach ($id as $activity_id) {
		$query = $mysqli->query("DELETE FROM tbl_activities WHERE activity_id = '$activity_id' ");
	}
    if($query){
        echo 1;
    }else{
        echo 2;
    }
?>