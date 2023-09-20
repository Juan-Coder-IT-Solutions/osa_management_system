<?php 
	include '../core/config.php';
	$ay_id 			= $mysqli -> real_escape_string($_POST['ay_id']);
	$activity_desc 	= $mysqli -> real_escape_string($_POST['activity_desc']);
	$activity_date 	= $mysqli -> real_escape_string($_POST['activity_date']);

	$mysqli->query("INSERT INTO tbl_activities SET ay_id = '$ay_id', activity_desc = '$activity_desc', activity_date = '$activity_date'") OR die(mysql_error());
	
	echo 1;
?>