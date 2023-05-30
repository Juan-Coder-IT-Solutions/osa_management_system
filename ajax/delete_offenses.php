<?php
	include '../core/config.php';

	$id = $_POST['id'];

	foreach ($id as $offense_id) {
		$mysqli->query("DELETE FROM tbl_offenses WHERE offense_id = '$offense_id' ");
	}

	echo 1;
?>