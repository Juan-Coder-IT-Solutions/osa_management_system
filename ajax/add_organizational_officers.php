<?php 
	include '../core/config.php';
	$student_id = $mysqli -> real_escape_string($_POST['student_id']);
	$of_type 	= $mysqli -> real_escape_string($_POST['of_type']);
    $ay_id      = $mysqli -> real_escape_string($_POST['ay_id']);

    $query = $mysqli->query("INSERT INTO tbl_organizational_officers SET student_id = '$student_id', of_type = '$of_type', ay_id = '$ay_id'") OR die(mysql_error());
	
    if($query){
        echo 1;
    }else{
        echo 2;
    }

?>