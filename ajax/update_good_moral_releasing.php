<?php
	include '../core/config.php';

	if(isset($_POST['update_good_moral_id'])){
		$good_moral_id		= $_POST['update_good_moral_id'];
		$ay_id				= $_POST['update_ay_id'];
		$good_modal_desc	= $_POST['update_good_modal_desc'];
		$student_id			= $_POST['update_student_id'];	


		$update_data = "ay_id = '$ay_id', good_modal_desc = '$good_modal_desc', student_id = '$student_id'";

		$query = $mysqli->query("UPDATE tbl_good_moral SET $update_data WHERE good_moral_id = '$good_moral_id' ") or die(mysql_error());
		
        if($query){
            echo 1;
        }else{
            echo 2;
        }
	}
?>