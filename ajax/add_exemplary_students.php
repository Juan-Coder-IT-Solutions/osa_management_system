<?php 
	include '../core/config.php';
	$student_id 	= $mysqli -> real_escape_string($_POST['student_id']);
	$es_desc 	= $mysqli -> real_escape_string($_POST['es_desc']);

		$mysqli->query("INSERT INTO tbl_exemplary_students SET student_id = '$student_id', es_desc = '$es_desc'") OR die(mysql_error());
	
		echo 1;
?>