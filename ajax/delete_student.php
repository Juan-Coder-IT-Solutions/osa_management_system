<?php
	include '../core/config.php';

	$id = $_POST['id'];

	foreach ($id as $student_id) {
		$mysqli->query("DELETE FROM tbl_students WHERE student_id = '$student_id' ");
	}

	echo 1;
?>