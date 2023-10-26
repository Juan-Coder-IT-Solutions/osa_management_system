<?php
	include '../core/config.php';

	$id = $_POST['id'];
	foreach ($id as $club_id) {
		$query = $mysqli->query("DELETE FROM tbl_clubs WHERE club_id = '$club_id' ");
	}
    if($query){
        echo 1;
    }else{
        echo 2;
    }
?>