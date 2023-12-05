<?php 
	include '../core/config.php';
	$service_desc 		= $mysqli -> real_escape_string($_POST['service_desc']);
	$service_remarks 	= $mysqli -> real_escape_string($_POST['service_remarks']);

	$mysqli->query("INSERT INTO tbl_services SET services_desc = '$service_desc',services_remarks = '$service_remarks'") OR die(mysql_error());
	
	echo 1;

?>