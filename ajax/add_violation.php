<?php 
	include '../core/config.php';
	$violation_name 	= $mysqli -> real_escape_string($_POST['violation_name']);
	$violation_remarks 	= $mysqli -> real_escape_string($_POST['violation_remarks']);
	$violation_desc 	= $mysqli -> real_escape_string($_POST['violation_desc']);

	$mysqli->query("INSERT INTO tbl_violations SET violation_name = '$violation_name', violation_remarks = '$violation_remarks', violation_desc = '$violation_desc'") OR die(mysql_error());
	
	echo 1;
?>