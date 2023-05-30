<?php 
	include '../core/config.php';
	$course_name 	= $mysqli -> real_escape_string($_POST['course_name']);
	$course_code 	= $mysqli -> real_escape_string($_POST['course_code']);
	$grade 	        = $mysqli -> real_escape_string($_POST['grade']);

    $query = $mysqli->query("INSERT INTO tbl_courses SET course_name = '$course_name', course_code = '$course_code', course_grade = '$grade'") OR die(mysql_error());
	
    if($query){
        echo 1;
    }else{
        echo 2;
    }

?>