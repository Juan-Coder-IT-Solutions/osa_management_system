<?php 
	include '../core/config.php';
	$student_id 	= $mysqli -> real_escape_string($_POST['student_id']);
	$of_type 	= $mysqli -> real_escape_string($_POST['of_type']);

    $query = $mysqli->query("INSERT INTO tbl_organizational_officers SET student_id = '$student_id', of_type = '$of_type'") OR die(mysql_error());
	
    if($query){
        echo 1;
    }else{
        echo 2;
    }

?>