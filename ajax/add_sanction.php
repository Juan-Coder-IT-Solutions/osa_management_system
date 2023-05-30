<?php 
	include '../core/config.php';
	$sanction_name 	= $mysqli -> real_escape_string($_POST['sanction_name']);
	$sanction_desc 	= $mysqli -> real_escape_string($_POST['sanction_desc']);

    $query = $mysqli->query("INSERT INTO tbl_sanctions SET sanction_name = '$sanction_name', sanction_desc = '$sanction_desc'") OR die(mysql_error());
	
    if($query){
        echo 1;
    }else{
        echo 2;
    }

?>