<?php
	include '../core/config.php';

	if(isset($_POST['update_course_id'])){
		$course_id		    = $_POST['update_course_id'];
		$course_name		= $_POST['update_course_name'];
		$course_code		= $_POST['update_course_code'];	
		$course_grade		= $_POST['update_course_grade'];

		$update_data = "course_name = '$course_name', course_code = '$course_code', course_grade = '$course_grade'";

		$query = $mysqli->query("UPDATE tbl_courses SET $update_data WHERE course_id = '$course_id' ") or die(mysql_error());
		
        if($query){
            echo 1;
        }else{
            echo 2;
        }
	}
?>