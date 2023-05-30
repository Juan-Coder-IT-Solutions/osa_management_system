<?php 
	include '../core/config.php';
	$ay_name = $mysqli -> real_escape_string($_POST['ay_name']);

	$mysqli->query("INSERT INTO tbl_academic_year SET ay_name = '$ay_name'") OR die(mysql_error());

	echo 1;
?>