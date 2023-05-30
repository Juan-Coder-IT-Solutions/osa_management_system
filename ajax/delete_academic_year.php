<?php
	include '../core/config.php';

	$id = $_POST['id'];

	foreach ($id as $ay_id) {
		$mysqli->query("DELETE FROM tbl_academic_year WHERE ay_id = '$ay_id' ");
	}

	echo 1;
?>