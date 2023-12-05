<?php 
	include '../core/config.php';
	$ay_name = $mysqli -> real_escape_string($_POST['ay_name']);
	$ay_desc = $mysqli -> real_escape_string($_POST['ay_desc']);

	$mysqli->query("INSERT INTO tbl_academic_year SET ay_name = '$ay_name',ay_desc = '$ay_desc'") OR die(mysql_error());

	echo 1;
?>