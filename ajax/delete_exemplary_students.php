<?php
	include '../core/config.php';

	$id = $_POST['id'];

	foreach ($id as $es_id) {
		$query = $mysqli->query("DELETE FROM tbl_exemplary_students WHERE es_id = '$es_id' ");
	}
    if($query){
        echo 1;
    }else{
        echo 2;
    }
?>