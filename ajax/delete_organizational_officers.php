<?php
	include '../core/config.php';

	$id = $_POST['id'];
	foreach ($id as $of_id) {
		$query = $mysqli->query("DELETE FROM tbl_organizational_officers WHERE of_id = '$of_id' ");
	}
    if($query){
        echo 1;
    }else{
        echo 2;
    }
?>