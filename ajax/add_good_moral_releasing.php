<?php 
	include '../core/config.php';
	$ay_id 	= $mysqli -> real_escape_string($_POST['ay_id']);
	$good_modal_desc 	= $mysqli -> real_escape_string($_POST['good_modal_desc']);
	$student_id 	= $mysqli -> real_escape_string($_POST['student_id']);

	$mysqli->query("INSERT INTO tbl_good_moral SET ay_id = '$ay_id', good_modal_desc = '$good_modal_desc', student_id = '$student_id'") OR die(mysql_error());
	
	echo 1;
?>