<?php 
	include '../core/config.php';
	$violation_id 	= $mysqli -> real_escape_string($_POST['violation_id']);
	$student_id 	= $mysqli -> real_escape_string($_POST['student_id']);
	$sanction_id 	= $mysqli -> real_escape_string($_POST['sanction_id']);
	$ay_id 		    = $mysqli -> real_escape_string($_POST['ay_id']);
	$offense_desc 	= $mysqli -> real_escape_string($_POST['offense_desc']);

		$mysqli->query("INSERT INTO tbl_offenses SET violation_id = '$violation_id', student_id = '$student_id', sanction_id = '$sanction_id', ay_id = '$ay_id', offense_desc = '$offense_desc'") OR die(mysql_error());
	
		echo 1;
?>