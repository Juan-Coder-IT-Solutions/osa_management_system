<?php
	include '../core/config.php';

	$id = $_POST['id'];
	foreach ($id as $services_id) {
		$query = $mysqli->query("DELETE FROM tbl_services WHERE services_id = '$services_id' ");
	}
    if($query){
        echo 1;
    }else{
        echo 2;
    }
?>