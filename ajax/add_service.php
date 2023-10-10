<?php 
	include '../core/config.php';
	$service_desc 			= $mysqli -> real_escape_string($_POST['service_desc']);

	$mysqli->query("INSERT INTO tbl_services SET services_desc = '$service_desc'") OR die(mysql_error());
	
	echo 1;

?>