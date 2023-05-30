<?php
	include '../core/config.php';

	$id = $_POST['id'];

	foreach ($id as $course_id) {
		$query = $mysqli->query("DELETE FROM tbl_courses WHERE course_id = '$course_id' ");
	}
    if($query){
        echo 1;
    }else{
        echo 2;
    }
?>