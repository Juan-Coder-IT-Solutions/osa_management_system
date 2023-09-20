<?php
	include '../core/config.php';

	$id = $_POST['id'];

	foreach ($id as $good_moral_id) {
		$query = $mysqli->query("DELETE FROM tbl_good_moral WHERE good_moral_id = '$good_moral_id' ");
	}
    if($query){
        echo 1;
    }else{
        echo 2;
    }
?>