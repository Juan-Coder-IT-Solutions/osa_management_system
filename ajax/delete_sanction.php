<?php
	include '../core/config.php';

	$id = $_POST['id'];
	foreach ($id as $sanction_id) {
		$query = $mysqli->query("DELETE FROM tbl_sanctions WHERE sanction_id = '$sanction_id' ");
	}
    if($query){
        echo 1;
    }else{
        echo 2;
    }
?>