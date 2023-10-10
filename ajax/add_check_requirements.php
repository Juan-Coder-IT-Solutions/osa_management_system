<?php 
	include '../core/config.php';
	$cr_desc 	= $mysqli -> real_escape_string($_POST['cr_desc']);

    $query = $mysqli->query("INSERT INTO tbl_checklist_requirements SET cr_desc = '$cr_desc'") OR die(mysql_error());
	
    if($query){
        echo 1;
    }else{
        echo 2;
    }

?>