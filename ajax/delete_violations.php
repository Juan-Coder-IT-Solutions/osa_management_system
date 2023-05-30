<?php
	include '../core/config.php';

	$id = $_POST['id'];

	foreach ($id as $violation_id) {
		$mysqli->query("DELETE FROM tbl_violations WHERE violation_id = '$violation_id' ");
	}

	echo 1;
?>