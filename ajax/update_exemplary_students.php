<?php
	include '../core/config.php';

	if(isset($_POST['update_es_id'])){
		$es_id		    = $_POST['update_es_id'];
		$es_desc		= $_POST['update_es_desc'];
		$student_id		= $_POST['update_student_id'];	

		$update_data = "student_id = '$student_id', es_desc = '$es_desc'";

		$query = $mysqli->query("UPDATE tbl_exemplary_students SET $update_data WHERE es_id = '$es_id' ") or die(mysql_error());
		
        if($query){
            echo 1;
        }else{
            echo 2;
        }
	}
?>